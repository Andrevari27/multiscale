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
                <form action="<?= base_url() ?>distribusikosong/create" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <?php
								$distribusiK = $this->Kendaraan->getKendaraan();
								?>
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Kendaraan</label>
                                    <select name="no_kendaraan" id="no_kendaraan" class="form-control" required>
                                        <option>Pilih Kendaraan</option>
                                        <?php foreach ($distribusiK as $a): ?>
                                        <option value="<?= $a['no_kendaraan'] ?>"><?= $a['no_kendaraan'].' - '.$a['jenis'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Supir</label>
                                    <input type="text" id="nama_supir" name="supir" class="form-control" required>
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Nama Pegawai</label>
                                    <input class="form-control" type="text" placeholder="" name="nip_penginputan"
                                        value="<?= $this->session->userdata('session_nama') ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Asal Distribusi</label>
                                    <select name="dep_asal" id="dep_asal" class="form-control select2-single" required>
                                        <option>Pilih Asal Distribusi</option>
                                        <option value="Duri">Duri</option>
                                        <option value="Arengka">Arengka</option>
                                        <option value="Rimbo Panjang">Rimbo Panjang</option>
                                        <option value="Kerinci">Kerinci</option>
                                        <option value="Muara Takus">Muara Takus</option>
                                        <option value="Jake">Jake</option>
                                        <option value="Pangkalan">Pangkalan</option>
                                        <option value="Batu Bersurat">Batu Bersurat</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Tujuan Distribusi</label>
                                    <select name="dep_tujuan" id="dep_tujuan" class="form-control select2" required>
                                        <option>Pilih Tujuan Distribusi</option>
                                        <option value="Duri">Duri</option>
                                        <option value="Arengka">Arengka</option>
                                        <option value="Rimbo Panjang">Rimbo Panjang</option>
                                        <option value="Kerinci">Kerinci</option>
                                        <option value="Muara Takus">Muara Takus</option>
                                        <option value="Jake">Jake</option>
                                        <option value="Pangkalan">Pangkalan</option>
                                        <option value="Batu Bersurat">Batu Bersurat</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Tanggal Berangkat</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Berangkat"
                                        name="tgl_berangkat" id="tgl_berangkat" required>
                                </div>
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('no_kendaraan').addEventListener('change',
                                        function() {
                                            var no_kendaraan = this.value;
                                            if (no_kendaraan) {
                                                var xhr = new XMLHttpRequest();
                                                var url =
                                                    '<?= site_url('kendaraan/getSupirByKendaraan?no_kendaraan=') ?>' +
                                                    encodeURIComponent(no_kendaraan);
                                                console.log(url); // Debug URL
                                                xhr.open('GET', url, true);
                                                xhr.onload = function() {
                                                    if (xhr.status === 200) {
                                                        console.log(xhr.responseText); // Debug response
                                                        var supir = JSON.parse(xhr.responseText);
                                                        document.getElementById('nama_supir').value =
                                                            supir.supir;
                                                    } else {
                                                        console.error('Request failed. Status: ' + xhr
                                                            .status);
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
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Jam Berangkat</label>
                                    <input class="form-control" type="time" placeholder="Jam Berangkat"
                                        name="jam_berangkat" id="jam_berangkat" required>
                                </div>
                                <div class="col-sm-4">
                                    <label for="" class="col-form-label">Uang Jalan Pokok</label>
                                    <input class="form-control" type="text" placeholder="Uang Jalan Pokok"
                                        name="uang_JP" id="uang_JP" oninput="formatCurrency(this)" readonly>
                                </div>
                                <script>
                                // Event listener untuk memantau perubahan pada dropdown "Asal Distribusi" dan "Tujuan Distribusi"
                                document.getElementById('dep_asal').addEventListener('change', updateUangJalanPokok);
                                document.getElementById('dep_tujuan').addEventListener('change', updateUangJalanPokok);

                                // Fungsi untuk mengupdate nilai Uang Jalan Pokok berdasarkan pilihan Asal dan Tujuan Distribusi
                                function updateUangJalanPokok() {
                                    var dep_asal = document.getElementById('dep_asal').value;
                                    var dep_tujuan = document.getElementById('dep_tujuan').value;

                                    // Lakukan perhitungan atau aturan bisnis untuk menentukan nilai Uang Jalan Pokok
                                    var uangJalanPokok = calculateUangJalanPokok(dep_asal, dep_tujuan);

                                    // Set nilai Uang Jalan Pokok ke input dengan id="uang_JP"
                                    document.getElementById('uang_JP').value = uangJalanPokok;
                                }

                                // Contoh fungsi perhitungan (sesuaikan dengan aturan bisnis atau perhitungan Anda)
                                function calculateUangJalanPokok(asal, tujuan) {
                                    // Contoh aturan bisnis: Jika Asal = Duri dan Tujuan = Arengka, maka Uang Jalan Pokok = 50000
                                    if (asal === 'Duri' && tujuan === 'Arengka' || asal === 'Arengka' && tujuan ===
                                        'Duri') {
                                        return "300,000";
                                    } else if (asal === 'Duri' && tujuan === 'Rimbo Panjang' || asal ===
                                        'Rimbo Panjang' && tujuan === 'Duri') {
                                        return "400,000";
                                    } else if (asal === 'Duri' && tujuan === 'Kerinci' || asal === 'Kerinci' &&
                                        tujuan === 'Duri') {
                                        return "150,000";
                                    } else if (asal === 'Duri' && tujuan === 'Muara Takus' || asal === 'Muara Takus' &&
                                        tujuan === 'Duri') {
                                        return "250,000";
                                    } else if (asal === 'Duri' && tujuan === 'Jake' || asal === 'Jake' && tujuan ===
                                        'Duri') {
                                        return "350,000";
                                    } else if (asal === 'Duri' && tujuan === 'Pangkalan' || asal === 'Pangkalan' &&
                                        tujuan === 'Duri') {
                                        return "650,000";
                                    } else if (asal === 'Duri' && tujuan === 'Batu Bersurat' || asal ===
                                        'Batu Bersurat' && tujuan === 'Duri') {
                                        return "550,000";
                                    } else if (asal === 'Arengka' && tujuan === 'Rimbo Panjang' || asal ===
                                        'Rimbo Panjang' && tujuan === 'Arengka') {
                                        return "700,000";
                                    } else if (asal === 'Arengka' && tujuan === 'Kerinci' || asal === 'Kerinci' &&
                                        tujuan === 'Arengka') {
                                        return "1,050,000";
                                    } else if (asal === 'Arengka' && tujuan === 'Muara Takus' || asal ===
                                        'Muara Takus' && tujuan === 'Arengka') {
                                        return "550,000";
                                    } else if (asal === 'Arengka' && tujuan === 'Jake' || asal === 'Jake' && tujuan ===
                                        'Arengka') {
                                        return "700,000";
                                    } else if (asal === 'Arengka' && tujuan === 'Pangkalan' || asal === 'Pangkalan' &&
                                        tujuan === 'Arengka') {
                                        return "650,000";
                                    } else if (asal === 'Arengka' && tujuan === 'Batu Bersurat' || asal ===
                                        'Batu Bersurat' && tujuan === 'Arengka') {
                                        return "1,050,000";
                                    } else if (asal === 'Rimbo Panjang' && tujuan === 'Kerinci' || asal === 'Kerinci' &&
                                        tujuan === 'Rimbo Panjang') {
                                        return "150,000";
                                    } else if (asal === 'Rimbo Panjang' && tujuan === 'Muara Takus' || asal ===
                                        'Muara Takus' && tujuan === 'Rimbo Panjang') {
                                        return "1,500,000";
                                    } else if (asal === 'Rimbo Panjang' && tujuan === 'Jake' || asal === 'Jake' &&
                                        tujuan === 'Rimbo Panjang') {
                                        return "1,050,000";
                                    } else if (asal === 'Rimbo Panjang' && tujuan === 'Pangkalan' || asal ===
                                        'Pangkalan' && tujuan === 'Rimbo Panjang') {
                                        return "350,000";
                                    } else if (asal === 'Rimbo Panjang' && tujuan === 'Batu Bersurat' || asal ===
                                        'Batu Bersurat' && tujuan === 'Rimbo Panjang') {
                                        return "550,000";
                                    } else if (asal === 'Kerinci' && tujuan === 'Muara Takus' || asal ===
                                        'Muara Takus' && tujuan === 'Kerinci') {
                                        return "650,000";
                                    } else if (asal === 'Kerinci' && tujuan === 'Jake' || asal === 'Jake' && tujuan ===
                                        'Kerinci') {
                                        return "450,000";
                                    } else if (asal === 'Kerinci' && tujuan === 'Pangkalan' || asal === 'Pangkalan' &&
                                        tujuan === 'Kerinci') {
                                        return "350,000";
                                    } else if (asal === 'Kerinci' && tujuan === 'Batu Bersurat' || asal ===
                                        'Batu Bersurat' && tujuan === 'Kerinci') {
                                        return "850,000";
                                    } else if (asal === 'Muara Takus' && tujuan === 'Jake' || asal === 'Jake' &&
                                        tujuan === 'Muara Takus') {
                                        return "950,000";
                                    } else if (asal === 'Muara Takus' && tujuan === 'Pangkalan' || asal ===
                                        'Pangkalan' && tujuan === 'Muara Takus') {
                                        return "550,000";
                                    } else if (asal === 'Muara Takus' && tujuan === 'Batu Bersurat' || asal ===
                                        'Batu Bersurat' && tujuan === 'Muara Takus') {
                                        return "350,000";
                                    } else if (asal === 'Jake' && tujuan === 'Pangkalan' || asal === 'Pangkalan' &&
                                        tujuan === 'Jake') {
                                        return "250,000";
                                    } else if (asal === 'Jake' && tujuan === 'Batu Bersurat' || asal ===
                                        'Batu Bersurat' && tujuan === 'Jake') {
                                        return "650,000";
                                    } else {
                                        return 0; // Default jika tidak ada aturan khusus
                                    }
                                }

                                // Fungsi untuk memformat input menjadi format mata uang (opsional, jika diperlukan)
                                function formatCurrency(input) {
                                    var value = input.value.replace(/\D/g, '');
                                    input.value = formatNumber(value);
                                }

                                function formatNumber(num) {
                                    return num.toLocaleString('en-US');
                                }

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
                                setJamSekarang();
                                </script>
                            </div>
                        </div>
                    </div>
            </div> <!-- end col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <button name="simpan" type="submit" class="btn btn-info float-right ml-2">Simpan</button>
                <a onclick="history.back()" class="btn btn-light float-right">Cancel</a>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>