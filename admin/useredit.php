<?php include 'header.php'; ?>
<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit User</h4>

                <a href="user" class="btn btn-warning btn-sm pull-right"><i class="fa fa-
reply"></i> &nbsp

                    Kembali</a>

            </div>
            <div class="panel-body">

                <?php

                // koneksi database
                include '../koneksi.php';
                ?>

                <form action="userupdate.php" method="post">
                    <?php
                    // mengambil data user dari database
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from tb_user where id_user='$id'");
                    $outlet = mysqli_query($koneksi, "select * from tb_outlet");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <div class="form-group">
                            <label>Nama User</label>

                            <input type="text" class="form-control" name="nama" value="<?php echo $d['nama_user'] ?>" required="required">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $d['id_user'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Username</label>

                            <input type="text" class="form-control" name="username" value="<?php echo $d['username'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" min="5" placeholder="Kosong Jika tidak ingin di ganti">
                            <p>Kosong Jika tidak ingin di ganti</p>
                        </div>
                        <!-- Membuat inputan menggunakan option inputan sesuai data pada
database -->
                        <div class="form-group">
                            <label>Outlet</label>

                            <select class="form-control" name="outlet" required="required">
                                <?php while ($l = mysqli_fetch_array($outlet)) { ?>
                                    <option <?php if (
                                                $d['id_outlet'] ==
                                                $l['id_outlet']
                                            ) {
                                                echo "selected='selected'";
                                            } ?> value="<?php echo $l['id_outlet'] ?>"><?php
                                                                                        echo $l['nama_outlet'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Membuat inputan menggunakan option inputan -->
                        <div class="form-group">
                            <label>Level</label>

                            <select class="form-control" name="level" required="required">
                                <option value="<?php echo $d['level'] ?>"><?php
                                                                            echo $d['level'] ?></option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                                <option value="owner">Owner</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                        </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>