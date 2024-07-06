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
        let inputs = document.querySelectorAll('input[name="harga"], input[name="uang_JP"], input[name="jumlah"]');
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
                <form
                    action="<?= base_url() ?>verf_distribusi/distribusiKosong/<?= $distribusikosong['no_distribusi'] ?>"
                    method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <?php 
                                $pilihKonsumen = $this->Konsumen->getKonsumen();
                                ?>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Konsumen</label>
                                    <select name="kode_konsumen" id="kode_konsumen" class="form-control" >
                                        <option value="">Pilih Konsumen</option>
                                        <?php foreach ($pilihKonsumen as $a): ?>
                                        <option value="<?= $a['kode_konsumen'] ?>">
                                            <?= $a['nama_konsumen']." - ".$a['lokasi_bongkar'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?php
								$pilihPemesanan = $this->Permintaan->getPermintaan();
								?>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">No Pemesanan</label>
                                    <select name="no_pemesanan" id="no_pemesanan" class="form-control" >
                                        <option value="">Pilih Pemesanan</option>
                                        <?php foreach ($pilihPemesanan as $a): ?>
                                        <option value="<?= $a['no_pemesanan'] ?>">
                                            <?= $a['no_pemesanan']." - ".$a['no_pemesanan']." - ".$a['no_pemesanan']." ".$a['no_pemesanan'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
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
                                <input class="form-control" type="hidden" name="no_distribusi"
                                    value="<?= $distribusikosong['no_distribusi'] ?>" readonly>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Departemen</label>
                                    <input class="form-control" type="text" placeholder="" name="dep_asal"
                                        value="<?= $this->session->userdata('session_dep') ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Barang</label>
                                    <input type="text" name="kode_brng" class="form-control"
                                        value="<?= $permintaan['nama_brng'] ?>" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Timbangan Muat</label>
                                    <input class="form-control" type="text" placeholder="Tim Muat" id="tim_muat"
                                        name="tim_muat" oninput="formatCurrency(this)" >
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Sisa Permintaan</label>
                                    <input class="form-control" type="text" placeholder="Sisa Permintaan" name="jumlah"
                                        oninput="formatCurrency(this)" value="<?= $permintaan['jumlah'] ?>" readonly>
                                </div>
                                <div class="col-sm-1">
                                    <label for="" class="col-form-label">Satuan</label>
                                    <input class="form-control" type="text" placeholder="Satuan" name="satuan"
                                        value="<?= $permintaan['satuan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Kendaraan</label>
                                    <input type="text" name="no_kendaraan" class="form-control"
                                        value="<?= $distribusikosong['no_kendaraan'] ?>" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Supir</label>
                                    <input type="text" name="supir" class="form-control"
                                        value="<?= $distribusikosong['supir'] ?>" >
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Asal</label>
                                    <input type="text" name="asal_distribusi" class="form-control"
                                        value="<?= $distribusikosong['dep_asal'] ?>" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Tujuan</label>
                                    <input type="text" name="tujuan_distribusi" class="form-control"
                                        value="<?= $distribusikosong['dep_tujuan'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Jam Berangkat</label>
                                    <input class="form-control" type="time" placeholder="Jam Berangkat"
                                        name="jam_berangkat" id="jam_berangkat"
                                        value="<?= $distribusikosong['jam_berangkat'] ?>" >
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Tanggal Berangkat</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Berangkat"
                                        name="tgl_berangkat" id="tgl_berangkat"
                                        value="<?= $distribusikosong['tgl_berangkat'] ?>" >
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
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Uang Jalan Pokok</label>
                                    <input class="form-control" type="text" placeholder="Uang Jalan Pokok"
                                        name="uang_JP" value="<?= $distribusikosong['uang_JP'] ?>"
                                        oninput="formatCurrency(this)" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Uang Jalan Tambahan</label>
                                    <input class="form-control" type="text" placeholder="Uang Jalan Tambahan"
                                        name="uang_JT" id="uang_JT" oninput="formatCurrency(this)" >
                                </div>
                                <script>
                                function formatCurrency(input) {
                                    // Fungsi formatCurrency dapat diteruskan di sini
                                }

                                function validateForm() {
                                    var uangJTInput = document.getElementById('uang_JT');
                                    var timMuatInput = document.getElementById('tim_muat');
                                    var jamBerangkatInput = document.getElementById('jam_berangkat');
                                    var tglBerangkatInput = document.getElementById('tgl_berangkat');
                                    var noPemesananInput = document.getElementById('no_pemesanan');


                                    var uangJTValue = uangJTInput.value
                                    var timMuatValue = timMuatInput.value
                                    var jamBerangkatValue = jamBerangkatInput.value
                                    var tglBerangkatValue = tglBerangkatInput.value
                                    var noPemesananValue = noPemesananInput.value
                                .trim(); // Mengambil nilai input dan menghilangkan spasi

                                    if (uangJTValue === '') {
                                        alert('Mohon diisi, data uang jalan tambahan tidak boleh kosong');
                                        return false; // Mengembalikan false agar form tidak disubmit
                                    }

                                    if (timMuatValue === '') {
                                        alert('Mohon diisi, data timbangan muat tidak boleh kosong');
                                        return false; // Mengembalikan false agar form tidak disubmit
                                    }

                                    if (noPemesananValue === '') {
                                        alert('Mohon diisi, data nomor pemesanan tidak boleh kosong');
                                        return false; // Mengembalikan false agar form tidak disubmit
                                    }

                                    if (jamBerangkatValue === '') {
                                        alert('Mohon diisi, data jam berangkat tidak boleh kosong');
                                        return false; // Mengembalikan false agar form tidak disubmit
                                    }

                                    if (tglBerangkatValue === '') {
                                        alert('Mohon diisi, data tanggal berangkat tidak boleh kosong');
                                        return false; // Mengembalikan false agar form tidak disubmit
                                    }

                                    // Validasi tambahan dapat ditambahkan di sini jika diperlukan

                                    return true; // Form disubmit jika tidak ada error
                                }
                                </script>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Keterangan</label>
                                    <textarea class="form-control" type="text" placeholder="Keterangan"
                                        name="Keterangan"></textarea>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-md-4">
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
<script>
// Fungsi untuk mengambil data permintaan berdasarkan no pemesanan yang dipilih
function getDataByNoPemesanan() {
    // Ambil nilai no_pemesanan yang dipilih dari dropdown
    var noPemesanan = document.getElementById('no_pemesanan').value;

    // Lakukan AJAX request
    $.ajax({
        url: '<?= base_url('verf_distribusi/getDataByNoPemesanan') ?>', // Ganti dengan URL yang sesuai di backend Anda
        type: 'POST',
        dataType: 'json',
        data: {
            no_pemesanan: noPemesanan
        },
        success: function(response) {

            var jumlah = response.jumlah;
            var formattedJumlah = new Intl.NumberFormat('en-US').format(jumlah);
            // Isi nilai inputan dengan data yang diterima
            document.getElementsByName('kode_brng')[0].value = response.nama_brng;
            document.getElementsByName('kode_konsumen')[0].value = response.nama_konsumen + ' - ' + response
                .lokasi_bongkar;
            document.getElementsByName('satuan')[0].value = response.satuan;
            document.getElementsByName('jumlah')[0].value = formattedJumlah;
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan dalam mengambil data: ' + error);
            // Handle error jika diperlukan
        }
    });
}

// Event listener untuk dropdown no_pemesanan
document.getElementById('no_pemesanan').addEventListener('change', function() {
    console.log('Dropdown changed'); // Tambahkan ini untuk memastikan event listener berfungsi
    getDataByNoPemesanan(); // Panggil fungsi untuk mengambil data saat dropdown berubah
});
</script>