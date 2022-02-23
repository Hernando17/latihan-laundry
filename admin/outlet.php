<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Outlet</h4>
        </div>
        <div class="panel-body">

            <a href="outletadd" class="btn btn-sm btn-info pull-right">Tambah Outlet</a>

            <br />
            <br />
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="table-datatable">

                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th width="15%">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // koneksi database
                        include '../koneksi.php';
                        // mengambil data user dari database
                        $data = mysqli_query($koneksi, "select * from

tb_outlet");

                        $no = 1;
                        // mengubah data ke array dan menampilkannya
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nama_outlet'];

                                    ?></td>
                                <td><?php echo

                                    $d['alamat']; ?></td>

                                <td><?php echo $d['telp'];

                                    ?></td>

                                <td>
                                    <a href="outletedit.php?id=<?php echo $d['id_outlet']; ?>" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" onClick="confirm_modal('outletdelete.php?id=<?php echo $d['id_outlet']; ?>');" class="btn btn-sm btn-danger">Hapus</a>

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