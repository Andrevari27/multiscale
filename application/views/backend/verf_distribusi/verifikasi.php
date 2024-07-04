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
        let inputs = document.querySelectorAll(
            'input[name="harga"],input[name="tim_muat"],input[name="uang_JP"],input[name="tim_bongkar"],input[name="uang_JT"]'
            );
        inputs.forEach(input => {
            let value = input.value.replace(/,/g, '');
            if (!isNaN(value) && value !== '') {
                input.value = new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(value);
            }
        });
    }

    window.onload = loadFormattedValue;
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
                <form action="<?= base_url() ?>verf_distribusi/verifikasi/<?= $distribusi['no_kendaraan'] ?>"
                    method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">No Pemesanan</label>
                                    <input class="form-control" type="text" placeholder="No Pemesanan"
                                        name="no_pemesanan" value="<?= $distribusi['no_pemesanan'] ?>" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Pegawai</label>
                                    <input class="form-control" type="text" placeholder="NIP Closing" name="nip_closing"
                                        value="<?= $this->session->userdata('session_nama') ?>" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Departemen Asal</label>
                                    <input class="form-control" type="text" placeholder=""
                                        value="<?= $distribusi['dep_asal'] ?>" name="dep_asal" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Konsumen</label>
                                    <input class="form-control" type="text" placeholder=""
                                        value="<?= $distribusi['nama_konsumen'] ?>" name="nama_konsumen" readonly>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Barang</label>
                                    <input class="form-control" type="text" placeholder=""
                                        value="<?= $distribusi['kode_brng'] ?>" name="kode_brng" readonly>
                                </div>
                                <div class="col-sm-1">
                                    <label for="" class="col-form-label">Satuan</label>
                                    <input class="form-control" type="text" placeholder=""
                                        value="<?= $distribusi['satuan'] ?>" name="satuan"
                                        oninput="formatCurrency(this)" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Timbangan Muat</label>
                                    <input class="form-control" type="text" placeholder="Tim Muat" name="tim_muat"
                                        oninput="formatCurrency(this)" value="<?= $distribusi['tim_muat'] ?>" required>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Timbangan Bongkar</label>
                                    <input class="form-control" type="text" placeholder="Tim Bongkar" name="tim_bongkar"
                                        oninput="formatCurrency(this)" value="<?= $distribusi['tim_bongkar'] ?>"
                                        required>
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Keterangan</label>
                                    <textarea class="form-control" type="text" placeholder="Keterangan" name="Keterangan"
                                        value="<?= $distribusi['Keterangan'] ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php
								$permintaan_f = $this->Kendaraan->getKendaraan();
								?>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Kendaraan</label>
                                    <input type="text" id="" name="no_kendaraan" class="form-control"
                                        value="<?= $distribusi['no_kendaraan'] ?>" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Supir</label>
                                    <input type="text" id="nama_supir" name="supir" class="form-control"
                                        value="<?= $distribusi['supir'] ?>" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Uang Jalan Pokok</label>
                                    <input class="form-control" type="text" placeholder="Uang Jalan Pokok"
                                        name="uang_JP" oninput="formatCurrency(this)"
                                        value="<?= $distribusi['uang_JP'] ?>" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Uang Jalan Tambahan</label>
                                    <input class="form-control" type="text" placeholder="Uang Jalan Tambahan"
                                        name="uang_JT" oninput="formatCurrency(this)"
                                        value="<?= $distribusi['uang_JT'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tanggal Berangkat</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Berangkat"
                                        name="tgl_berangkat" value="<?= $distribusi['tgl_berangkat'] ?>" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Jam Berangkat</label>
                                    <input class="form-control" type="time" placeholder="Jam Berangkat"
                                        name="jam_berangkat" value="<?= $distribusi['jam_berangkat'] ?>" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tanggal Sampai</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Sampai"
                                        name="tgl_sampai" id="tgl_sampai" value="<?= $distribusi['tgl_sampai'] ?>"
                                        required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Jam Sampai</label>
                                    <input class="form-control" type="time" placeholder="Jam Sampai" id="jam_sampai"
                                        name="jam_sampai" value="<?= $distribusi['jam_sampai'] ?>" required>
                                </div>
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

                                    document.getElementById('tgl_sampai').value = dateString;
                                });
                                // Ambil elemen input time
                                var jamBerangkatInput = document.getElementById('jam_sampai');

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
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Upload Bon Timbangan Bongkar</label>
                                    <input class="form-control" type="file" placeholder="" name="photo_bon"
                                        >
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button name="simpan" type="submit" class="btn btn-info float-right ml-2">Verifikasi
                                Distribusi</button>
                            <a onclick="history.back()" class="btn btn-light float-right">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>