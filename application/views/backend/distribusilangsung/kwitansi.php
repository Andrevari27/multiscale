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
                                Cetak</button>
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
                        <h4>KWITANSI</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 float-left">
                        <p style="margin-top: 45px;font-size: 12pt;">No. Pembayaran <span
                                style="margin-left: 18px;">:</span>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Sudah Terima Dari <span
                                style="margin-left: 5px;">:</span>
                                <?= $this->session->userdata('session_nama') ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Nomor Kendaraan <span
                                style="margin-left: 4px;">:</span>
                                 <?= $distribusi['no_kendaraan'] ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Untuk Pembayaran <span
                                style="margin-left: 0px;">:</span>
                             Uang Jalan 
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Dari <span
                                style="margin-left: 104px;">:</span>
                                 <?= $distribusi['asal_distribusi'] ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Tujuan <span
                                style="margin-left: 85px;">:</span>
                                 <?= $distribusi['tujuan_distribusi'] ?>
                        </p>
                        <p style="margin-top: -20px;font-size: 12pt;">Total Uang Jalan <span
                                style="margin-left: 17px;">:</span>
                                 Rp. <?= number_format($distribusi['uang_JP']) ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-6 text-center">
                        <p style="font-size: 12pt;overflow:hidden;">        </p>
                    <p style="margin-top: -20px;font-size: 12pt;">Menyetujui,</p>
                        <p style="margin-top: 100px;font-size: 12pt;"> <?= $distribusi['supir'] ?></p>
                        <p style="margin-top: -30px;font-size: 12pt;">--------------------------------------</p>
                        <p style="margin-top: -30px;font-size: 12pt;">Supir</p>
                    </div>
                    <div class="col-6 text-center">
                        <p id="tanggal" style="font-size: 12pt;margin-top:-24px">Pekanbaru, <span id="tanggal-hari-ini"><?= date('d F Y') ?></span></p>
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
                        <p style="margin-top: 10px;font-size: 12pt;"><img height="100px" src="<?= base_url('upload/'.$this->session->userdata('session_foto')) ?>" alt=""></p>
                        <p style="margin-top: -40px;font-size: 12pt;"><?= $this->session->userdata('session_nama') ?></p>
                        <p style="margin-top: -30px;font-size: 12pt;">--------------------------------------</p>
                        <p style="margin-top: -30px;font-size: 12pt;">Kasir</p>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
</div>