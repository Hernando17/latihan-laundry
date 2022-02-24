<?php include 'header.php'; ?>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Transaksi</h4>

                <a href="transaksi" class="btn btn-warning btn-sm pull-right"><i class="fa
fa-reply"></i> &nbsp
                    Kembali</a>

            </div>
            <div class="panel-body">

                <?php

                // koneksi database
                include '../koneksi.php';
                ?>

                <form action="transaksiupdate" method="post" enctype="multipart/form-
data">

                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from tb_transaksi where id_transaksi='$id'");
                    $outlet = mysqli_query($koneksi, "select * from tb_outlet");
                    $pelanggan = mysqli_query($koneksi, "select * from tb_pelanggan");
                    $paket = mysqli_query($koneksi, "select * from tb_paket");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <!-- menyimpan id transaksi yang di edit dalam form hidden berikut -->
                        <input type="hidden" name="id" value="<?php echo $d['id_transaksi']; ?>">
                        <div class="form-group">
                            <label>Nama Outlet</label>
                            <select class="form-control" name="outlet" required="required">
                                <?php while ($l = mysqli_fetch_array($outlet)) { ?>
                                    <option <?php if ($d['id_outlet'] == $l['id_outlet']) {
                                                echo
                                                "selected='selected'";
                                            } ?> value="<?php echo $l['id_outlet'] ?>"><?php echo
                                                                                        $l['nama_outlet'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <select class="form-control" name="pelanggan" required="required">
                                <?php while ($l = mysqli_fetch_array($pelanggan)) { ?>
                                    <option <?php if (
                                                $d['id_pelanggan'] ==
                                                $l['id_pelanggan']
                                            ) {
                                                echo "selected='selected'";
                                            } ?> value="<?php echo $l['id_pelanggan'] ?>"><?php echo
                                                                                            $l['nama_pelanggan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Paket</label>
                            <select class="form-control" name="paket" required="required">
                                <?php while ($l = mysqli_fetch_array($paket)) { ?>
                                    <option <?php if ($d['id_paket'] == $l['id_paket']) {
                                                echo
                                                "selected='selected'";
                                            } ?> value="<?php echo $l['id_paket'] ?>"><?php echo
                                                                                        $l['jenis'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Berat</label>
                            <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required" value="<?php echo
                                                                                                                                                        $d['berat']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tgl. Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" required="required" value="<?php echo $d['tgl_selesai']; ?>">
                        </div>
                        <br />

                        <table class="table table-bordered table-striped" id="dinamis">
                            <tr>
                                <th>Jenis Pakaian</th>
                                <th width="20%">Jumlah</th>
                            </tr>
                            <?php
                            // menyimpan id transaksi ke variabel id_transaksi
                            $id_transaksi = $d['id_transaksi'];
                            // menampilkan pakaian-pakaian dari transaksi yang ber id di atas
                            $pakaian = mysqli_query($koneksi, "select * from tb_pakaian where id_transaksi='$id_transaksi'");
                            while ($p = mysqli_fetch_array($pakaian)) {
                            ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $p['jenis_pakaian']; ?>"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $p['jumlah']; ?>"></td>
                                    <td>
                                        <button type="button" class="btn btn-blue add-row">+</button>
                                        <button type="button" class="btn btn-danger delete-row">-</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <div class="form-group alert alert-warning">
                            <label>Bayar</label>

                            <select class="form-control" name="bayar" required="required">
                                <option <?php if ($d['status_bayar'] == "belum") {
                                            echo
                                            "selected='selected'";
                                        } ?> value="belum">belum
                                </option>
                                <option <?php if ($d['status_bayar'] == "lunas") {
                                            echo
                                            "selected='selected'";
                                        } ?> value="lunas">lunas
                                </option>

                            </select>
                        </div>
                        <div class="form-group alert alert-info">
                            <label>Status</label>

                            <select class="form-control" name="status" required="required">
                                <option <?php if ($d['status_transaksi'] == "proses") {
                                            echo
                                            "selected='selected'";
                                        } ?> value="proses">proses</option>

                                <option <?php if ($d['status_transaksi'] == "selesai") {
                                            echo
                                            "selected='selected'";
                                        } ?> value="selesai">selesai</option>

                                <option <?php if ($d['status_transaksi'] == "diambil") {
                                            echo
                                            "selected='selected'";
                                        } ?> value="diambil">diambil</option>

                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            <?php
                    }
            ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>