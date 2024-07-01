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
        <?php 
            $total = $distribusiA['tim_muat']*($distribusiA['harga']);
            $ppn = 11/100;
            $pph = 2/100;
            $total_ppn = $ppn*$total; 
            $total_pph = $pph*$total; 
            $total_tagihan = ($total+$total_ppn)-$total_pph;
            $total_tagihan_terbilang = ucwords(terbilang($total_tagihan)); // Mengonversi angka menjadi teks dan mengubah huruf pertama menjadi kapital
            ?>
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
                        <h4>KWITANSI</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 float-left">
                        <p style="margin-top: 15px;font-size: 12pt;">No. Pembayaran <span
                                style="margin-left: 18px;">:</span>
                            <?= $distribusiA['no_pemesanan'] ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Sudah Terima Dari <span
                                style="margin-left: 5px;">:</span>
                            <?= $distribusiA['no_pemesanan'] ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Untuk Pembayaran <span
                                style="margin-left: 0px;">:</span>
                            Pembayaran Pelunasan Tagihan
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Total Penagihan <span
                                style="margin-left: 22px;">:</span>
                            Rp. <?= number_format($total_tagihan) ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Terbilang <span
                                style="margin-left: 69px;">:</span>
                            <?= $total_tagihan_terbilang ?> Rupiah
                        </p>
                        <p style="margin-top: 10px;font-size: 12pt;">CATATAN <span style="margin-left: 0px;">:</span>
                        </p>
                        <p style="margin-top: -15px;font-size: 12pt;margin-left: 20px;">
                            Jatuh tempo null hari setelah tanggal kwitansi dan cantumkan nomor invoice pada bukti
                            transfer. Setelah melakukan pembayaran,
                            bukti transfer dan rincian pembayaran harap di fax ke Hp: 08562675039, 085296559963.
                            Demikian permohonan ini kami ajukan,
                            mohon untuk ditindaklanjuti. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4 text-center">
                        <p id="tanggal" style="margin-top: 30px;font-size: 12pt;">Pekanbaru, <span id="tanggal-hari-ini"><?= date('d F Y') ?></span></p>
                        <script>
                        var now = new Date();
                        var options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        document.getElementById('tanggal-hari-ini').textContent = now.toLocaleDateString('id-ID',
                            options);
                        </script>
                        <p style="margin-top: -20px;font-size: 12pt;">Mengetahui,</p>
                        <p style="margin-top: 80px;font-size: 12pt;">ANDRE VARI ANTONI</p>
                        <p style="margin-top: -30px;font-size: 12pt;">--------------------------------------</p>
                        <p style="margin-top: -30px;font-size: 12pt;">Manager Keuangan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>