<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data User</h4>
        </div>
        <div class="panel-body">
            <br />
            <br />
            <table class="table table-bordered table-striped table-hover" id="table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Outlet</th>

                        <th width="15%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // koneksi database
                    include '../koneksi.php';
                    // mengambil data user dari database
                    $data = mysqli_query($koneksi, "select * from tb_user");
                    $no = 1;
                    // mengubah data ke array dan menampilkannya dengan perulangan

                    while ($d = mysqli_fetch_array($data)) {
                    ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama_user']; ?></td>
                            <td><?php echo $d['username']; ?></td>
                            <td><?php echo $d['level']; ?></td>
                            <td><?php echo $d['id_outlet']; ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Hapus</a>
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
<?php include 'footer.php'; ?>