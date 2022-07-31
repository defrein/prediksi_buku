<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prediksi Buku</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_umum.css">
    <style>
    tr td a {
        margin: 0 10px;
    }

    .fa-trash-alt {
        color: red;
    }

    .fa-search-plus {
        color: green;
    }

    .fa-pencil-alt {
        color: orange;
    }

    .tab {
        display: inline-block;
        margin-left: 40px;
    }

    .judul {
        margin-bottom: 20px;
    }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url('admin'); ?>" class="nav-link">Home</a>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class=" main-sidebar sidebar-dark-primary elevation-4 ">
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>admin" class="brand-link">
                <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/icon_videf.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <?php
                        $menu_master1 = array('buku', 'buku_tambah', 'buku_edit');
                        $menu_master2 = array('produksi', 'produksi_tambah', 'produksi_edit');
                        $menu_master3 = array('prediksi', 'prediksi_tambah', 'prediksi_edit', 'prediksi_detil');
                        ?>
                        <li class="nav-item  
                <?php
                if (in_array($page, $menu_master1) || in_array($page, $menu_master2))
                    echo "menu-open";
                ?>
                ">
                            <a href="#" class="nav-link 
                    <?php
                    if (in_array($page, $menu_master1) || in_array($page, $menu_master2))
                        echo "active";
                    ?>
                ">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Data Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/buku'); ?>" class="nav-link
                    <?php
                    if (in_array($page, $menu_master1))
                        echo "active";
                    ?>
                  ">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>Data Buku</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/produksi'); ?>" class="nav-link
                    <?php
                    if (in_array($page, $menu_master2))
                        echo "active";
                    ?>                  
                  ">
                                        <i class="nav-icon fas fa-chart-bar"></i>
                                        <p>Data Produksi</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("admin/prediksi"); ?>" class="nav-link
                            <?php
                            if (in_array($page, $menu_master3))
                                echo "active";
                            ?>
                            ">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Prediksi
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url("login/logout"); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>