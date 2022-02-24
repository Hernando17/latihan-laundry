<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi LyJo</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>

<body>
    <!-- cek apakah sudah login -->
    <?php
    session_start();
    if ($_SESSION['status'] != "admin_login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?>
    <?php
    // koneksi database
    include '../koneksi.php';
    ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <?php
            // menangkap id yang dikirim melalui url
            $id = $_GET['id'];
            // megambil data transaksi yang ber id di atas dari tabel transaksi
            $transaksi = mysqli_query($koneksi, "select * from tb_transaksi where id_transaksi='$id' and id_pelanggan=id_pelanggan and id_outlet=id_outlet
and id_paket=id_paket");

            while ($t = mysqli_fetch_array($transaksi)) {
            ?>
                <center>
                    <h2>LyJo " Laundry Jogja "</h2>
                </center>
                <h3></h3>

                <!-- membuat tombol print invoice memanggil function dalam javascript -->
                <a href="#" onclick="printPage()" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i> CETAK</a>
                <br />
                <br />

                <table class="table">
                    <tr>
                        <th width="20%">No. Invoice</th>
                        <th>:</th>
                        <td>INVOICE-<?php echo $t['id_transaksi']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Outlet</th>
                        <th>:</th>
                        <td><?php echo $t['id_outlet']; ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Tgl. Laundry</th>
                        <th>:</th>
                        <td><?php echo $t['tgl_masuk']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>:</th>
                        <td><?php echo $t['id_pelanggan']; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Cucian (Kg)</th>
                        <th>:</th>
                        <td><?php echo $t['berat']; ?></td>
                    </tr>
                    <tr>
                        <th>Tgl. Selesai</th>
                        <th>:</th>
                        <td><?php echo $t['tgl_selesai']; ?></td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <th>:</th>
                        <td><?php echo "Rp." . number_format($t['total_bayar']) . " ,-"; ?></td>
                    </tr>
                    <tr>
                        <th>Status Bayar</th>
                        <th>:</th>
                        <td>
                            <?php
                            if ($t['status_bayar'] == "belum") {

                                echo "<div class='label label-danger'>belum bayar</div>";
                            } else

                            if ($t['status_bayar'] == "lunas") {
                                echo "<div class='label label-success'>sudah lunas</div>";
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>

                        <th>Status Jasa</th>
                        <th>:</th>
                        <td>
                            <?php
                            if ($t['status_transaksi'] == "proses") {

                                echo "<div class='label label-warning'>PROSES</div>";
                            } else

                            if ($t['status_transaksi'] == "selesai") {
                                echo "<div class='label label-info'>SELESAI</div>";
                            } else

                            if ($t['status_transaksi'] == "diambil") {

                                echo "<div class='label label-success'>DIAMBIL</div>";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <br />
                <h4 class="text-center">Daftar Cucian</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th width="20%">Jumlah</th>
                    </tr>
                    <?php
                    // menyimpan id transaksi ke variabel id_transaksi
                    $id = $t['id_transaksi'];
                    // menampilkan pakaian-pakaian dari transaksi yang ber
                    $pakaian = mysqli_query($koneksi, "select * from tb_pakaian where id_transaksi='$id'");

                    while ($p = mysqli_fetch_array($pakaian)) {
                    ?>
                        <tr>
                            <td><?php echo $p['jenis_pakaian']; ?></td>
                            <td width="5%"><?php echo $p['jumlah']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <br />
                <p>
                    <center><i>" Terima kasih telah mempercayakan cucian anda pada kami ".</i></center>
                </p>
            <?php
            }
            ?>
        </div>

    </div>

    <!-- membuat fitur print page instant -->
    <script type="text/javascript">
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>