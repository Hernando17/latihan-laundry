<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi LyJo</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>

</head>

<body style="background: #f0f0f0">

    <!-- menu navigasi -->
    <nav class="navbar navbar-inverse" style="border-radius: 0px">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">LyJo</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-user"></i> User</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-tower"></i> Outlet</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-folder-close"></i> Paket</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-sunglasses"></i> Pelanggan</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-shopping-cart"></i> Transaksi</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-usd"></i> Laporan</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-eye-open"></i> Ganti Password</a></li>
                    <li><a href="../logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text">Halo, Kasir !</p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir menu navigasi -->

    <div class="container">
        <div class="alert alert-info text-center">
            <h4 style="margin-bottom: 0px"><b>Selamat datang!</b> di aplikasi Laundry LyJo. Anda login Sebagai Kasir!</h4>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <h4>Dashboard</h4>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span class="pull-right">


                                    </span>
                                </h1>
                                Jumlah Pelanggan
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-retweet"></i>
                                    <span class="pull-right">


                                    </span>
                                </h1>
                                Jumlah Cucian Di Proses
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-info-sign"></i>
                                    <span class="pull-right">


                                    </span>
                                </h1>
                                Jumlah Cucian Siap Ambil
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h1>
                                    <i class="glyphicon glyphicon-ok-circle"></i>
                                    <span class="pull-right">


                                    </span>
                                </h1>
                                Jumlah Cucian Selesai
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <h4>Riwayat Transaksi Terakhir</h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (Kg)</th>
                        <th>Tgl. Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</body>

</html>