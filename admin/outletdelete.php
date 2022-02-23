<?php
include '../koneksi.php';
//mengambil data outlet_id yang akan dihapus
$id = $_GET['id'];
//melakukan perintah sql untuk menghapus data
mysqli_query($koneksi, "delete from tb_outlet where id_outlet='$id'");
//mengarahkan kembali ke halaman outlet
header("location:outlet?alert=delete");
