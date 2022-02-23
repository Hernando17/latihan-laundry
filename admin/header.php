<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi LyJo</title>

    <!-- Menambahkan library DataTables -->

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../assets/DataTables/datatables.js"></script>
    <script type="text/javascript" src="../assets/DataTables/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.css">
    <!-- Menambahkan session pada dashboard admin -->

    <?php
    include '../koneksi.php';
    session_start();
    if ($_SESSION['status'] != "admin_login") {
        header("location:../index?alert=belum_login");
    }
    ?>
</head>

<body style="background: #f0f0f0">
    <!-- menu navigasi -->
    <nav class="navbar navbar-inverse" style="border-radius: 0px">
        <div class="container-fluid">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data- toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">LyJo</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-
1">

                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>

                    <li><a href=""><i class="glyphicon glyphicon-
user"></i> User</a></li>

                    <li><a href=""><i class="glyphicon glyphicon-tower"></i>
                            Outlet</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-folder-close"></i>
                            Paket</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-sunglasses"></i>
                            Pelanggan</a></li>

                    <li><a href=""><i class="glyphicon glyphicon-shopping-
cart"></i> Transaksi</a></li>

                    <li><a href=""><i class="glyphicon glyphicon-usd"></i>

                            Laporan</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-eye-open"></i> Ganti
                            Password</a></li>

                    <li><a href="../logout.php"><i class="glyphicon glyphicon-
log-out"></i> Log Out</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text">Halo, Admin !</p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>