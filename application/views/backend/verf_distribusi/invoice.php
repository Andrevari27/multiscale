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
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-title-box" id="print" style="overflow:hidden;">
                <div class="row">
                    <div class="col-12 text-center justify-content-between">
                        <div>
                            <h4>PT RIAU MAS BERSAUDARA</h4>
                            <p style="margin-top: -10px;font-size: 12pt;">
                                Jalan : Soekarno Hatta No. 11 A, Telp/Fax : (0761) 61128, Hp: 0811-765-089 PEKANBARU -
                                RIAU,
                            </p>
                            <p style="margin-top: -20px;font-size: 12pt;">
                                Hp : 08562675039, 085296559963
                            </p>
                            <p style="margin-top: -20px;font-size: 12pt;">
                                E-mail : rmb@gmail.com
                            </p>
                        </div>
                        <hr style="z-index: 999; margin-top: 0;border:2px solid black;background-color: black; ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center justify-content-between">
                        <h4>INVOICE</h4>
                    </div>
                    <div class="col-8 float-left">
                        <!-- <p style="font-size: 12pt;"><?= $distribusiA['no_pemesanan'] ?></p> -->
                        <!-- <p style="margin-top: -20px;font-size: 12pt;">KONSUMEN</p> -->
                        <p style="margin-top: -20px;font-size: 12pt;">Attn <span style="margin-left: 18px;">:</span>
                            </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Telp <span style="margin-left: 19px;">:</span>
                            
                        </p>
                    </div>
                    <div class="col-4 float-right">
                        <p style="font-size: 12pt;">Tanggal <span style="margin-left: 50px;">:</span>
                            <?= date_indo($distribusiA['tgl_berangkat']) ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">No. Invoice <span
                                style="margin-left: 25px;">:</span> <?= $distribusiA['no_pemesanan'] ?></p>
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
                                        <th>No. Polisi</th>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Timb Muat</th>
                                        <th>Timb Bongkar</th>
                                        <th>T. Muat + T. Bongkar</th>
                                        <th>Volume</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
						$no = 1;
						foreach ($distribusi as $val): ?>
                                    <tr class="text-center">
                                        <td><?= $no ?></td>
                                        <td><?= date_indo($val['tgl_berangkat']) ?></td>
                                        <td><?= $val['jam_berangkat'] ?></td>
                                        <td><?= $val['no_kendaraan'] ?></td>
                                        <td><?= $val['kode_brng'] ?></td>
                                        <td><?= number_format($val['harga']) ?></td>
                                        <td><?= number_format($val['tim_muat'])." ".$val['satuan'] ?></td>
                                        <td><?= number_format( $val['tim_bongkar'])." ".$val['satuan']  ?></td>
                                        <td><?= number_format( $val['volume'])." ".$val['satuan']  ?></td>
                                        <td><?= number_format( $val['volume'])." ".$val['satuan']  ?></td>
                                    </tr>
                                    <?php
							$no++;
							 endforeach ?>
                                    <tr class="text-center">
                                        <td colspan="6">Total</td>
                                        <td><?= number_format($distribusiA['tim_muat'])." ".$val['satuan']  ?></td>
                                        <td><?= number_format( $distribusiA['tim_bongkar'])." ".$val['satuan']  ?></td>
                                        <td><?= number_format( $distribusiA['volume'])." ".$val['satuan']  ?></td>
                                        <td><?= number_format( $distribusiA['volume'])." ".$val['satuan']  ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php 
                        $total = $distribusiA['tim_muat']*($distribusiA['harga']);
                        $ppn = $distribusiPpn/100;
                        $pph = $distribusiPph/100;
                        $total_ppn = $ppn*$total; 
                        $total_pph = $pph*$total; 
                        $total_tagihan = ($total+$total_ppn)-$total_pph;
                        $total_tagihan_terbilang = ucwords(terbilang($total_tagihan)); // Mengonversi angka menjadi teks dan mengubah huruf pertama menjadi kapital

                        
                        ?>
                <div class="row">
                    <div class="col-9 float-left">
                        <p>Total Timbangan Muat : <?= number_format($distribusiA['tim_muat']) ?>  *
                            <?= number_format($distribusiA['harga']) ?></p>
                        <p>Terbilang : <b><i><?= $total_tagihan_terbilang ?> Rupiah</i></b></p>
                    </div>
                    <div class="col-3 float-right text-right">
                        <b>
                            <p>Total : Rp. <?= number_format($total) ?></p>
                            <p style="margin-top: -20px;font-size: 12pt;">PPN 11% : Rp. <?= number_format($total_ppn) ?>
                            </p>
                            <p style="margin-top: -20px;font-size: 12pt;">PPH <?=$pph?>% : Rp. <?= number_format($total_pph) ?>
                            </p>
                            <p style="margin-top: -10px;font-size: 12pt;">
                                <hr style="border:2px solid black;background-color: black;position: right; ">
                            </p>
                            <p style="margin-top: -10px;font-size: 12pt;">Total Tagihan : Rp.
                                <?= number_format($total_tagihan) ?></p>
                        </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center float-left">
                        <p style="margin-top: 30px;font-size: 12pt;">Dengan Hormat,</p>
                        <p style="margin-top: 80px;font-size: 12pt;">ANDRE VARI ANTONI</p>
                        <p style="margin-top: -20px;font-size: 12pt;">---------------------------------------</p>
                        <p style="margin-top: -20px;font-size: 12pt;">Bagian Penagihan</p>
                    </div>
                    <div class="col-6 text-center float-right">
                        <p style="margin-top: 30px;font-size: 12pt;">Kepala Bagian Keuangan</p>
                        <p style="margin-top: 80px;font-size: 12pt;">ANDRE VARI ANTONI</p>
                        <p style="margin-top: -20px;font-size: 12pt;">---------------------------------------</p>
                        <p style="margin-top: -20px;font-size: 12pt;">Wakil Keu & Akuntansi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>