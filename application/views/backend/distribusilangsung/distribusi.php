<div class="content-page">
    <script>
    function formatCurrency(input) {
        // Menghilangkan semua karakter selain angka
        var num = input.value.replace(/\D/g, '');

        // Memformat angka menjadi format uang dengan pemisah ribuan
        var formattedNum = new Intl.NumberFormat('en-US').format(num);

        // Memasukkan kembali nilai yang diformat ke dalam input
        input.value = formattedNum;
    }

    function loadFormattedValue() {
        let input = document.querySelector('input[name="harga"]');
        let value = input.value.replace(/,/g, '');
        if (!isNaN(value) && value !== '') {
            input.value = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(value);
        }
    }

    window.onload = loadFormattedValue;
    </script>
    <script>
    $(document).ready(function() {
        $('#no_kendaraan').select2();

        // Menangani event change dari select2
        $('#no_kendaraan').on('change', function() {
            var no_kendaraan = $(this).val();
            if (no_kendaraan) {
                var xhr = new XMLHttpRequest();
                var url = '<?= site_url('kendaraan/getSupirByKendaraan?no_kendaraan=') ?>' +
                    encodeURIComponent(no_kendaraan);
                console.log(url); // Debug URL
                xhr.open('GET', url, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText); // Debug response
                        var supir = JSON.parse(xhr.responseText);
                        document.getElementById('nama_supir').value = supir.supir;
                    } else {
                        console.error('Request failed. Status: ' + xhr.status);
                    }
                };
                xhr.onerror = function() {
                    console.error('Request failed. Network error.');
                };
                xhr.send();
            } else {
                document.getElementById('nama_supir').value = '';
            }
        });
    });
    </script>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?= $judul ?></h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Sistem Informasi PT Riau Mas Bersaudara</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-title-box">
                <form action="<?= base_url() ?>distribusilangsung/distribusi/<?= $permintaan['no_pemesanan'] ?>"
                    method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">No Pemesanan</label>
                                    <input class="form-control" type="text" placeholder="No Pemesanan"
                                        name="no_pemesanan" value="<?= $permintaan['no_pemesanan'] ?>" readonly>
                                </div>
                                <?php
								$distribusi = $this->Pegawai->getPegawai();
								?>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Pegawai</label>
                                    <input class="form-control" type="text" placeholder="NIP Penginputan"
                                        name="nip_penginputan" value="<?= $this->session->userdata('session_nama') ?>"
                                        readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Departemen</label>
                                    <input class="form-control" type="text" placeholder="" name="dep_asal"
                                        value="<?= $this->session->userdata('session_dep') ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Konsumen</label>
                                    <input type="text" name="nama_konsumen" class="form-control"
                                        value="<?= $permintaan['nama_konsumen']." - ".$permintaan['lokasi_bongkar'] ?>"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Barang</label>
                                    <select class="form-control" name="kode_brng" id="kode_brng" required>
                                        <option value="">Pilih Barang</option>
                                        <?php foreach ($barang as $a): ?>
                                        <?php if ($a['no_pemesanan'] == $permintaan['no_pemesanan']): ?>
                                        <option value="<?= $a['kode_brng'] ?>" data-jumlah="<?= $a['jumlah'] ?>"
                                            data-satuan="<?= $a['kode_sat'] ?>"><?= $a['nama_brng'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Jumlah Permintaan</label>
                                    <input class="form-control" type="text" placeholder="Jumlah Permintaan"
                                        id="jumlah_permintaan" name="jumlah_permintaan" readonly>
                                </div>
                                <div class="col-sm-1">
                                    <label for="" class="col-form-label">Satuan</label>
                                    <input class="form-control" type="text" placeholder="Satuan" id="satuan"
                                        name="satuan" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Timbangan Muat</label>
                                    <input class="form-control" type="text" placeholder="Tim Muat" name="tim_muat"
                                        oninput="formatCurrency(this)" required>
                                </div>
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Mendapatkan elemen select kode_brng
                                    var kodeBrngSelect = document.getElementById('kode_brng');
                                    var jumlahPermintaanInput = document.getElementById('jumlah_permintaan');
                                    var satuanInput = document.getElementById('satuan');

                                    // Event listener untuk perubahan nilai pada select kode_brng
                                    kodeBrngSelect.addEventListener('change', function() {
                                        // Ambil data jumlah dan satuan dari option yang dipilih
                                        var selectedOption = this.options[this.selectedIndex];
                                        var jumlah = selectedOption.getAttribute('data-jumlah');
                                        var satuan = selectedOption.getAttribute('data-satuan');

                                        // Set nilai jumlah_permintaan dan satuan
                                        jumlahPermintaanInput.value = jumlah;
                                        satuanInput.value = satuan;
                                    });
                                });
                                </script>
                            </div>
                            <div class="form-group row">
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Mendapatkan elemen input tim_muat
                                    var timMuatInput = document.querySelector('input[name="tim_muat"]');
                                    var sisaPermintaanInput = document.querySelector(
                                        'input[name="sisa_permintaan"]');
                                    var jumlahPermintaan =
                                        <?= $permintaan['jumlah'] ?>; // Ambil jumlah permintaan dari PHP

                                    // Event listener untuk perubahan nilai pada input tim_muat
                                    timMuatInput.addEventListener('input', function() {
                                        // Ambil nilai tim_muat yang diinput pengguna
                                        var timMuatValue = parseFloat(this.value.replace(/\D/g, ''));

                                        // Validasi jika input bukan angka atau kosong, set nilai sisa_permintaan menjadi jumlah permintaan awal
                                        if (isNaN(timMuatValue) || timMuatValue === 0) {
                                            sisaPermintaanInput.value = jumlahPermintaan;
                                        } else {
                                            // Hitung sisa permintaan
                                            var sisaPermintaan = jumlahPermintaan - timMuatValue;

                                            // Pastikan sisa permintaan tidak kurang dari 0
                                            if (sisaPermintaan < 0) {
                                                sisaPermintaan = 0;
                                            }

                                            // Set nilai sisa_permintaan
                                            sisaPermintaanInput.value = sisaPermintaan;
                                        }
                                    });
                                });
                                </script>

                                <?php
                                $permintaan_f = $this->Kendaraan->getKendaraan();
                                ?>

                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Kendaraan</label>
                                    <select name="no_kendaraan" id="no_kendaraan" class="form-control" required>
                                        <option value="">Pilih Kendaraan</option>
                                        <?php foreach ($permintaan_f as $a): ?>
                                        <option value="<?= $a['no_kendaraan'] ?>">
                                            <?= $a['no_kendaraan'].' - '.$a['jenis'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Supir</label>
                                    <input type="text" id="nama_supir" name="supir" class="form-control" required>
                                </div>

                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Tanggal Berangkat</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Berangkat"
                                        name="tgl_berangkat" id="tgl_berangkat" required>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Jam Berangkat</label>
                                    <input class="form-control" type="time" placeholder="Jam Berangkat"
                                        name="jam_berangkat" id="jam_berangkat" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <script>
                                // JavaScript to set the default date to today
                                document.addEventListener('DOMContentLoaded', (event) => {
                                    const today = new Date();
                                    const year = today.getFullYear();
                                    const month = String(today.getMonth() + 1).padStart(2,
                                        '0'); // Add leading zero if needed
                                    const day = String(today.getDate()).padStart(2,
                                        '0'); // Add leading zero if needed
                                    const dateString = `${year}-${month}-${day}`;

                                    document.getElementById('tgl_berangkat').value = dateString;
                                });
                                // Ambil elemen input time
                                var jamBerangkatInput = document.getElementById('jam_berangkat');

                                // Fungsi untuk mendapatkan waktu saat ini dalam format HH:mm
                                function setJamSekarang() {
                                    var now = new Date();
                                    var hours = now.getHours().toString().padStart(2,
                                        '0'); // Ambil jam dengan format 2 digit
                                    var minutes = now.getMinutes().toString().padStart(2,
                                        '0'); // Ambil menit dengan format 2 digit
                                    var currentTime = hours + ':' + minutes;

                                    // Set nilai input time dengan waktu saat ini
                                    jamBerangkatInput.value = currentTime;
                                }

                                // Panggil fungsi setJamSekarang untuk mengatur waktu saat halaman dimuat
                                setJamSekarang();
                                </script>

                                </script>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Uang Jalan</label>
                                    <input class="form-control" type="text" placeholder="Uang Jalan" name="uang_JP"
                                        oninput="formatCurrency(this)" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Keterangan</label>
                                    <textarea class="form-control" type="text" placeholder="Keterangan"
                                        name="Keterangan"></textarea>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <button name="simpan" type="submit"
                                class="btn btn-info float-right ml-2">Distribusi</button>
                            <a onclick="history.back()" class="btn btn-light float-right">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>