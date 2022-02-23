<?php
include '../koneksi.php';
//mengambil data dari form edit
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$outlet = $_POST['outlet'];
//membuat proses variabel sql update data tanpa rubah password
$update_pass = "update tb_user set nama_user='$nama', username='$username', id_outlet='$outlet', level='$level' where id_user='$id'";
//membuat variabel sql update seluruh data
$update = "update tb_user set nama_user='$nama', username='$username',
user_password='$password', id_outlet='$outlet', level='$level' where id_user='$id'";
//membuat kondisi untuk update sesuai inputan
if ($pwd == "") {
    mysqli_query($koneksi, $update_pass);
    header("location:user?alert=update");
} else {
    mysqli_query($koneksi, $update);
    header("location:user?alert=update");
}
