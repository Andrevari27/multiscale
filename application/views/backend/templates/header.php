<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>PT. Riau Mas Bersaudara</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/">

    <!--Chartist Chart CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/chartist/css/chartist.min.css">
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>
<!-- <style>
/* CSS untuk sidebar dan konten responsif */
@media (max-width: 992px) {
    #wrapper {
        padding-left: 0;
    }

    .button-menu-mobile {
        display: block;
        cursor: pointer;
    }

    .button-menu-mobile i {
        font-size: 24px;
    }

    .button-menu-mobile.active+.side-menu {
        left: 0;
    }

    .button-menu-mobile.active+.content-page {
        margin-left: 250px;
    }

    .content-page {
        transition: margin-left 0.3s;
    }

    .topbar {
        padding-left: 0;
    }

    .side-menu {
        display: none;
        position: fixed;
        top: 0;
        left: -250px;
        /* Sembunyikan sidebar di luar layar */
        width: 250px;
        height: 100%;
        overflow-y: auto;
        transition: all 0.3s;
        background-color: #F0F8FF;
        z-index: 999;
    }

    .sidebar-enable .side-menu {
        left: 0;
        /* Tampilkan sidebar saat menu mobile diklik */
    }
}
</style> -->

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left" style="background-color:#F0F8FF;">
                <a href="#" class="logo">
                    <img src="<?= base_url() ?>assets/images/aa.png" alt="" width="70px" height="70px"
                        style="margin-top:10px">
                </a>
            </div>

            <nav class="navbar-custom" style="background-color:#F0F8FF;">
                <ul class="navbar-right list-inline float-right mb-0">
                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </a>
                    </li>

                    <!-- notification -->
                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span style="margin-right: 15px;"
                                    class="dt-avatar-name text-primary"><?= $this->session->userdata('session_nama') ?></span>


                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <a class="dropdown-item text-info" href="<?= base_url() ?>"><i
                                        class="mdi mdi-power text-danger"></i>
                                    Logout</a>
                            </div>
                        </div>
                    </li>

                </ul>
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect" style="background-color:#F0F8FF;">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>
            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu" style="background-color:#F0F8FF;">
            <div class="slimscroll-menu" id="remove-scroll">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu" style="margin-top:50px;">
                        <li class="menu-title">Menu</li>

                        <!-- <li>
                            <a href="<?= base_url() ?>jenisbarang" class="waves-effect"><i
                                    class="ti-package"></i><span>Jenis Barang</span></a>
                        </li> -->
                        <li>
                            <a href="<?= base_url() ?>kendaraan" class="waves-effect"><i
                                    class="ti-car"></i><span>Kendaraan</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>konsumen" class="waves-effect"><i
                                    class="ti-agenda"></i><span>Konsumen</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>pegawai" class="waves-effect"><i
                                    class="ti-user"></i><span>Pegawai</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>barang" class="waves-effect"><i
                                    class="ti-package"></i><span>Barang</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>permintaan" class="waves-effect"><i
                                    class="ti-agenda"></i><span>Permintaan</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="ti-agenda"></i><span>Distribusi</span><span class="menu-arrow"></span></a>
                            <ul class="submenu">
                                <li><a href="<?= base_url() ?>verf_distribusi">Distribusi</a></li>
                                <li><a href="<?= base_url() ?>distribusikosong">Distribusi Kosong</a></li>
                                <li><a href="<?= base_url() ?>distribusilangsung">Distribusi Langsung</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>laporan" class="waves-effect"><i
                                    class="ti-file"></i><span>Laporan</span></a>
                        </li>
                    </ul>

                </div>
                <!-- Sidebar -->

            </div>
            <!-- Sidebar -left -->

        </div>


        <footer class="footer">
            © 2024 <span class="d-none d-sm-inline-block"> <i class=""></i> </span>
        </footer>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <!--==============================================================-->
        <!-- End Right content here -->
        <!-- ============================================================== -->


        <!-- END wrapper -->