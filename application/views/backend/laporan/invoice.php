<div class="content-page">
    <script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
    </script>
    <style>
    @media print {

        body,
        html {
            width: 100%;
            overflow: visible;
        }

        .no-print {
            display: none;
        }

        .content-page {
            margin: 0;
            padding: 0;
        }

        .content {
            width: 100%;
        }

        .page-title-box {
            page-break-before: always;
            page-break-after: avoid;
        }

        .page-title-box:last-child {
            page-break-after: auto;
        }

        .table {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .row {
            display: flex;
            flex-wrap: nowrap;
        }

        @page {
            size: auto;
            margin: 10mm;
        }
    }
    </style>

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">

                            <?php
                                $permintaan = $this->Permintaan->getPermintaan();
                            ?>
                            <div class="col-sm-2">
                                <label for="">Nomor Pemesanan</label>
                                <select name="no_pemesanan" id="no_pemesanan" class="form-control">
                                    <option value="">Pilih Nomor Pemesanan</option>
                                    <?php foreach ($permintaan as $a): ?>
                                    <option value="<?= $a['no_pemesanan'] ?>"><?= $a['no_pemesanan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php
                            if (isset($_POST['no_pemesanan'])) {
                                $no_pemesanan = $_POST['no_pemesanan'];
                                // Ambil data barang berdasarkan no_pemesanan
                                $barang = $this->Barang->getBarangByNoPemesanan($no_pemesanan);
                                echo json_encode($barang);
                            }
                            ?>
                            <div class="col-sm-2">
                                <label for="">Barang</label>
                                <select name="kode_brng" id="kode_brng" class="form-control">
                                    <option value="">Pilih Barang</option>
                                    <!-- Opsi akan diperbarui oleh AJAX -->
                                </select>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                            $(document).ready(function() {
                                $('#no_pemesanan').change(function() {
                                    var noPemesanan = $(this).val();
                                    if (noPemesanan) {
                                        $.ajax({
                                            url: 'invoice', // Ganti dengan path yang sesuai
                                            type: 'POST',
                                            data: {
                                                no_pemesanan: noPemesanan
                                            },
                                            success: function(response) {
                                                var data = JSON.parse(response);
                                                var $barangSelect = $('#kode_brng');
                                                $barangSelect.empty();
                                                $barangSelect.append(
                                                    '<option value="">Pilih Barang</option>'
                                                    );
                                                $.each(data, function(key, value) {
                                                    $barangSelect.append(
                                                        '<option value="' +
                                                        value.kode_brng + '">' +
                                                        value.nama_brng +
                                                        '</option>');
                                                });
                                            }
                                        });
                                    } else {
                                        $('#kode_brng').empty().append(
                                            '<option value="">Pilih Barang</option>');
                                    }
                                });
                            });
                            </script>

                            <div class="col-sm-2">
                                <label for="">Dari</label>
                                <input type="date" class="form-control" name="tgl_dari">
                            </div>
                            <div class="col-sm-2">
                                <label for="">Sampai</label>
                                <input type="date" class="form-control" name="tgl_sampai">

                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="page-title-box" id="print" style="overflow:hidden;">
                <div class="row">
                    <div class="col-12 text-center justify-content-between">
                        <div>
                            <img src="<?= base_url('assets/images/kop.jpg') ?>" alt="" style="width: 100%;">
                        </div>
                        <hr style="z-index: 999; margin-top: 0;border:2px solid black;background-color: black; ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center justify-content-between">
                        <h4>INVOICE</h4>
                    </div>
                    <div class="col-8 float-left">
                        <p style="font-size: 12pt;"></p>
                        <p style="margin-top: -20px;font-size: 12pt;"></p>
                        <p style="margin-top: -20px;font-size: 12pt;">Attn <span style="margin-left: 18px;">:</span>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Telp <span style="margin-left: 19px;">:</span>

                        </p>
                    </div>
                    <div class="col-4 float-right">
                        <p style="font-size: 12pt;">Tanggal <span style="margin-left: 50px;">:</span>
                            <?= date_indo($tanggal_hari_ini) ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">No. Invoice <span
                                style="margin-left: 25px;">:</span> </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Jatuh Tempo <span
                                style="margin-left: 14px;">:</span> </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Tempo Bayar <span
                                style="margin-left: 12px;">:</span> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="justify-content-center">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Jam Berangkat</th>
                                        <th>Nomor Kendaraan</th>
                                        <th>Barang</th>
                                        <th>Timbangan Muat</th>
                                        <th>Timbangan Bongkar</th>
                                        <th>T. Muat + T. Bongkar</th>
                                        <th>Volume</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9 float-left">
                        <p>Total Timbangan Muat : </p>
                        <p>Terbilang : <b><i> Rupiah</i></b></p>
                    </div>
                    <div class="col-3 float-right text-right">
                        <b>
                            <p>Total : Rp. </p>
                            <p style="margin-top: -20px;font-size: 12pt;">PPN 11% : Rp.
                            </p>
                            <p style="margin-top: -20px;font-size: 12pt;">PPH % : Rp.

                            </p>
                            <p style="margin-top: -10px;font-size: 12pt;">
                                <hr style="border:2px solid black;background-color: black;position: right; ">
                            </p>
                            <p style="margin-top: -10px;font-size: 12pt;">Total Tagihan : Rp.

                        </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9 float-left">
                        <p>Transfer : </p>
                        <p style="margin-top: -25px;font-size: 12pt;">MANDIRI</p>
                        <p style="margin-top: -25px;font-size: 12pt;">PT. RIAU MAS BERSAUDARA</p>
                        <p style="margin-top: -25px;font-size: 12pt;">No. Rek. 108 000 245454 5</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center float-left">
                        <p style="margin-top: 30px;font-size: 12pt;">Dengan Hormat,</p>
                        <p style="margin-top: 80px;font-size: 12pt;"><?= $this->session->userdata('session_nama') ?></p>
                        <p style="margin-top: -20px;font-size: 12pt;">---------------------------------------</p>
                        <p style="margin-top: -20px;font-size: 12pt;">Bagian Penagihan</p>
                    </div>
                    <div class="col-6 text-center float-right">
                        <p style="margin-top: 75px;font-size: 12pt;">Konsumen</p>
                        <p style="margin-top: 80px;font-size: 12pt;"></p>
                        <p style="margin-top: -20px;font-size: 12pt;">---------------------------------------</p>
                        <p style="margin-top: -20px;font-size: 12pt;">Bagian Keuangan</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <button onclick="printContent('print')" class="btn btn-info"><i class="fa fa-print"></i>
                        Cetak
                        dengan Kop</button>
                    <button style="margin-left: 10px;" onclick="printContent('print')" class="btn btn-info"><i
                            class="fa fa-print"></i>
                        Cetak
                        tanpa Kop</button>
                </ol>
            </div>
        </div>
    </div>
</div>