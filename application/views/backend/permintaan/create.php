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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#kode_konsumen').select2();
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
                <form action="<?= base_url() ?>permintaan/create" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">No Pemesanan</label>
                                    <input class="form-control" type="text" placeholder="No Pemesanan"
                                        name="no_pemesanan" value="<?= generate_spm_number() ?>" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Tanggal Pemesanan</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Pemesanan"
                                        name="tanggal" id="tanggalPemesanan" required>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Tanggal Deadline</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Deadline"
                                        name="tgl_deadline">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Nama Pegawai</label>
                                    <input class="form-control" type="text" value="<?= $this->session->userdata('session_nama') ?>" placeholder="Nama Pegawai" name="nip" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Departemen</label>
                                    <input class="form-control" type="text" value="<?= $this->session->userdata('session_dep') ?>" placeholder="Departemen" name="cabang_permintaan " readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php
								$permintaan = $this->Konsumen->getKonsumen();
								?>
                                <div class="col-sm-2">
                                    <label for="kode_konsumen" class="col-form-label">Konsumen</label>
                                    <select name="kode_konsumen" id="kode_konsumen" class="form-control" required>
                                        <option value="">Pilih Konsumen</option>
                                        <?php foreach ($permintaan as $a): ?>
                                        <option value="<?= $a['kode_konsumen'] ?>"><?= $a['nama_konsumen'] ?> -
                                            <?= $a['lokasi_bongkar'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div id="repeater">
                                <div class="repeater-item">
                                    <div class="form-group row">
                                        <?php
                                            $permintaan_b = $this->Barang->getBarang();
                                            ?>
                                        <div class="col-sm-2">
                                            <label for="" class="col-form-label">Barang</label>
                                            <select name="kode_brng[]" class="form-control kode-brng" required>
                                                <option value="">Pilih Barang</option>
                                                <?php foreach ($permintaan_b as $a): ?>
                                                <option value="<?= $a['kode_brng'] ?>"><?= $a['nama_brng'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <label for="" class="col-form-label">Volume</label>
                                            <input class="form-control" id="jumlah" type="text" placeholder="Volume"
                                                name="jumlah[]" oninput="formatCurrency(this)" required>
                                        </div>

                                        <div class="col-sm-1">
                                            <label for="" class="col-form-label">Satuan</label>
                                            <select name="kode_satuan[]" id="satuan" class="form-control" required>
                                                <option value="pcs">pcs</option>
                                                <option value="m³">m³</option>
                                                <option value="m²">m²</option>
                                                <option value="m">m</option>
                                                <option value="ton">ton</option>
                                                <option value="kg">kg</option>
                                                <option value="liter">liter</option>
                                                <option value="Ls">Ls</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="" class="col-form-label">Harga Satuan</label>
                                            <input class="form-control" type="text" placeholder="Harga Satuan"
                                                name="harga[]" id="harga" oninput="formatCurrency(this)" >
                                        </div>
                                        <div class="col-sm-2" style="margin-top: 37px;">
                                            <button type="button" class="btn btn-primary btn-sm add-row"><i
                                                    class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm remove-row"><i
                                                    class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
                            </script>

                            <script>
                            $(document).ready(function() {
                                // Add row
                                $(".add-row").click(function() {
                                    var html = $(".repeater-item").first().clone(); // Clone first item
                                    html.find('input, select').val(''); // Clear input values
                                    $("#repeater").append(html); // Append cloned item

                                    // Initialize select2 for the newly added row
                                    html.find('.kode-brng')
                                        .select2(); // Assuming you use select2 for select elements
                                });

                                // Remove row
                                $("#repeater").on('click', '.remove-row', function() {
                                    if ($("#repeater .repeater-item").length > 1) {
                                        $(this).closest('.repeater-item')
                                            .remove(); // Remove closest item
                                    } else {
                                        alert("You cannot remove the last row.");
                                    }
                                });

                                // Initialize select2 for the initial row
                                $('.kode-brng').select2();
                            });
                            </script>
                            <div class="form-group row">
                                <div class="col-sm-1">
                                    <label for="" class="col-form-label">Ppn (%)</label>
                                    <input class="form-control" type="text" placeholder="%" name="ppn">
                                </div>
                                <div class="col-sm-1">
                                    <label for="" class="col-form-label">Pph (%)</label>
                                    <input class="form-control" type="text" placeholder="%" name="pph">
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Diskon (Rp.)</label>
                                    <input class="form-control" type="text" placeholder="Potongan" name="potongan"
                                        oninput="formatCurrency(this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="" class="col-form-label">Upload Foto PO</label>
                                    <input class="form-control" type="file" name="foto_po_konsumen">
                                </div>
                            </div>
                            <input class="form-control" type="hidden" placeholder="Cabang Permintaan"
                                name="cabang_permintaan" value="<?= $this->session->userdata('session_dep') ?>">
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button name="simpan" type="submit" class="btn btn-info float-right ml-2">Simpan</button>
                            <a onclick="history.back()" class="btn btn-light float-right">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

    document.getElementById('tanggalPemesanan').value = dateString;
});
document.addEventListener('DOMContentLoaded', (event) => {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2,
        '0'); // Add leading zero if needed
    const day = String(today.getDate()).padStart(2,
        '0'); // Add leading zero if needed
    const dateString = `${year}-${month}-${day}`;

    document.getElementById('tanggalDeadline').value = dateString;
});
</script>