<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Transaksi</h4>
        </div>
        <div class="panel-body">

            <a href="transaksiadd" class="btn btn-sm btn-info pull-right">Tambah Transaksi</a>
            <br />
            <br />
            <div class="table-responsive">

                <table class="table table-bordered table-striped" id="table-
datatable">

                    <thead>
                        <tr>
                            <th width="1%">NO</th>
                            <th>Nama Outlet</th>
                            <!-- <th>Nama User</th> -->
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Selesai</th>
                            <th>Berat (KG)</th>
                            <th>Total Harga</th>
                            <th>Status Bayar</th>
                            <th>Status Transaksi</th>
                            <th width="20%">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi, tb_user,
tb_outlet, tb_paket, tb_pelanggan where tb_outlet.id_outlet=tb_transaksi.id_outlet &&
tb_paket.id_paket=tb_transaksi.id_paket &&
tb_pelanggan.id_pelanggan=tb_transaksi.id_pelanggan &&
tb_user.id_user=tb_transaksi.id_user");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nama_outlet']; ?></td>
                                <!-- <td><?php echo $d['nama_user']; ?></td> -->
                                <td><?php echo $d['nama_pelanggan']; ?></td>
                                <td><?php echo $d['jenis']; ?></td>
                                <td><?php echo $d['tgl_masuk']; ?></td>
                                <td><?php echo $d['tgl_selesai']; ?></td>
                                <td><?php echo $d['berat']; ?></td>
                                <td><?php echo "Rp." . number_format($d['total_bayar']) . ""; ?></td>
                                <td>
                                    <?php

                                    if ($d['status_bayar'] == "belum") {

                                        echo "<div class='label label-danger'>BELUM</div>";
                                    } else if ($d['status_bayar'] == "lunas") {

                                        echo "<div class='label label-success'>LUNAS</div>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($d['status_transaksi'] == "proses") {

                                        echo "<div class='label label-warning'>PROSES</div>";
                                    } else if ($d['status_transaksi'] == "selesai") {

                                        echo "<div class='label label-info'>SELESAI</div>";
                                    } else if ($d['status_transaksi'] == "diambil") {

                                        echo "<div class='label label-success'>DIAMBIL</div>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="transaksiinvoice.php?id=<?php echo $d['id_transaksi']; ?>" target="_blank" class="btn btn-sm btn-success">Invoice</a>
                                    <a href="transaksiedit.php?id=<?php echo
                                                                    $d['id_transaksi']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" onClick="confirm_modal('transaksidelete.php?id=<?php echo
                                                                                                $d['id_transaksi']; ?>');" class="btn btn-sm btn-danger">Batal</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>