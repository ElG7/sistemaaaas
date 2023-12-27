<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel Administrativo</title>

    <!-- Custom fonts for this template-->
    <link href="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Assets/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>" rel="stylesheet">
    <script src="<?php echo BASE_URL; ?>Assets/js/sweetalert2.all.min"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo BASE_URL . 'admin/home'; ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Panel Administrativo</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL . 'admin/home'; ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Estadisticas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interfaz
            </div>

            <!-- Nav Item - Usuarios Collapse Menu -->
            <li class="nav-item">
                <a href="<?php echo BASE_URL . 'usuarios'; ?>">
                    <div class="nav-link collapsed"><i class="fas fa-fw fa-users"></i>Usuarios</div>
                </a>
            </li>

            <!-- Nav Item - Productos Collapse Menu -->
            <li class="nav-item">
                <a href="<?php echo BASE_URL . 'productos'; ?>">
                    <div class="nav-link collapsed"><i class="fas fa-fw fa-list"></i>Productos</div>
                </a>
            </li>

            <!-- Nav Item - Ingredientes Collapse Menu -->
            <li class="nav-item">
                <a href="<?php echo BASE_URL . 'ingredientes'; ?>">
                    <div class="nav-link collapsed"><i class="fas fa-fw fa-list"></i>Ingredientes</div>
                </a>
            </li>

            <!-- Nav Item - Ofertas Collapse Menu -->
            <li class="nav-item">
                <a href="<?php echo BASE_URL . 'ofertas'; ?>">
                    <div class="nav-link collapsed"><i class="fas fa-fw fa-tags"></i>Ofertas</div>
                </a>
            </li>
            <!-- Nav Item - Pedidos Collapse Menu -->
            <li class="nav-item">
                <a href="<?php echo BASE_URL . 'pedidos'; ?>">
                    <div class="nav-link collapsed"><i class="fas fa-fw fa-bell"></i>Pedidos</div>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php print_r($_SESSION['email']) ?></span>
                                <img class="img-profile rounded-circle" src="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Assets\css\perfil.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->