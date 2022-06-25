<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="/">
    <title><?= $title?></title>

    <!-- Custom fonts for this template-->
    <link href="dashboardAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dashboardAdmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-2">W-CLASSROOM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                INFO
            </div>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/account" data-toggle="collapse"
                    data-target="#collapseAccount" aria-expanded="true" aria-controls="collapsePages">

                    <span>Account</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/roomguru" data-toggle="collapse"
                    data-target="#collapseAccount" aria-expanded="true" aria-controls="collapsePages">

                    <span>Room Guru</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/roomsiswa" data-toggle="collapse"
                    data-target="#collapseAccount" aria-expanded="true" aria-controls="collapsePages">

                    <span>Room Siswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/roomcomment" data-toggle="collapse"
                    data-target="#collapseAccount" aria-expanded="true" aria-controls="collapsePages">

                    <span>Comment room</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/dataroomguru" data-toggle="collapse"
                    data-target="#collapseAccount" aria-expanded="true" aria-controls="collapsePages">

                    <span>Data Room Guru</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/dataroomsiswa" data-toggle="collapse"
                    data-target="#collapseAccount" aria-expanded="true" aria-controls="collapsePages">

                    <span>Data Room Siswa</span>
                </a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
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

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">