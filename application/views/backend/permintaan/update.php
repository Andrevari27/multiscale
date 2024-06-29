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
            'input[name="subtotal"],input[name="total"],input[name="ppn"],input[name="pph"],input[name="tagihan"]');
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
                <form action="<?= base_url() ?>permintaan/update/<?= $permintaan['no_pemesanan'] ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">No Pemesanan</label>
                                    <input class="form-control" type="text" placeholder="No Pemesanan"
                                        name="no_pemesanan" value="<?= $permintaan['no_pemesanan'] ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tanggal Pemesanan</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Pemesanan"
                                        name="tanggal" value="<?= $permintaan['tanggal'] ?>" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tanggal Deadline</label>
                                    <input class="form-control" type="date" placeholder="Tanggal Deadline"
                                        name="tgl_deadline" value="<?= $permintaan['tgl_deadline'] ?>" required>
                                </div>
                                <?php
								$permintaan_e = $this->Konsumen->getKonsumen();
								?>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Konsumen</label>
                                    <select name="kode_konsumen" id="" class="form-control" required>
                                        <?php foreach ($permintaan_e as $a): ?>
                                        <option value="<?= $a['kode_konsumen'] ?>"><?= $a['nama_konsumen'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Nama Pegawai</label>
                                    <input class="form-control" type="text" placeholder="NIP" name="nip"
                                        value="<?= $this->session->userdata('session_nama') ?>" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Cabang Permintaan</label>
                                    <input class="form-control" type="text" placeholder="Cabang Permintaan"
                                        name="cabang_permintaan" value="<?= $permintaan['cabang_permintaan'] ?>" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Cabang Approval</label>
                                    <input class="form-control" type="text" placeholder="Cabang Approval"
                                        name="cabang_approval" value="<?= $this->session->userdata('session_dep') ?>" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Cabang Distribusi</label>
                                    <input class="form-control" type="text" placeholder="Cabang Distribusi"
                                        name="cabang_distribusi" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Subtotal</label>
                                    <input class="form-control" type="text" placeholder="Subtotal" name="subtotal"
                                        value="<?= $permintaan['subtotal'] ?>" oninput="formatCurrency(this)">
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Potongan</label>
                                    <input class="form-control" type="text" placeholder="Potongan" name="potongan"
                                        value="<?= $permintaan['potongan'] ?>" oninput="formatCurrency(this)">
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Total</label>
                                    <input class="form-control" type="text" placeholder="Total" name="total"
                                        value="<?= $permintaan['total'] ?>" oninput="formatCurrency(this)">
                                </div>
                                <div class="col-sm-1">
                                    <label for="" class="col-form-label">Ppn (%)</label>
                                    <input class="form-control" type="text" placeholder="Ppn" name="ppn"
                                        value="<?= $permintaan['ppn'] ?>" oninput="formatCurrency(this)">
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Total PPN</label>
                                    <input class="form-control" type="text" placeholder="Ppn"
                                        value="<?= number_format(($permintaan['ppn']/100)*$permintaan['total']) ?>"
                                        oninput="formatCurrency(this)" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1">
                                    <label for="" class="col-form-label">Pph (%)</label>
                                    <input class="form-control" type="text" placeholder="%" name="pph"
                                        value="<?= $permintaan['pph'] ?>" oninput="formatCurrency(this)">
                                </div>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Total PPH</label>
                                    <input class="form-control" type="text" placeholder="%" 
                                        value="<?= number_format(($permintaan['pph']/100)*$permintaan['total']) ?>"
                                        oninput="formatCurrency(this)" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tagihan</label>
                                    <input class="form-control" type="text" placeholder="Tagihan" name="tagihan"
                                        value="<?= $permintaan['tagihan'] ?>" oninput="formatCurrency(this)">
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Jenis Harga</label>
                                    <select name="jenis_harga" id="" class="form-control" required>
                                        <option value="<?= $permintaan['jenis_harga'] ?>">
                                            <?= $permintaan['jenis_harga'] ?></option>
                                        <option value="T Muat">T Muat</option>
                                        <option value="T Bongkar">T Bongkar</option>
                                        <option value="T Muat + Bongkar">T Muat + Bongkar</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button name="simpan" type="submit" class="btn btn-info float-right ml-2">Approval</button>
                            <a onclick="history.back()" class="btn btn-light float-right">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>