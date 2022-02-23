<?php
include '../koneksi.php';
//mengambil data dari form user
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$outlet = $_POST['outlet'];

//membuat eksekusi sql untuk memasukan data kedalam database
$adduser = "insert into tb_user (id_user, nama_user, username, password, id_outlet, level) values (NULL,'$nama','$username', '$password', '$outlet','$level')";
mysqli_query($koneksi, $adduser);
//mengarahkan halaman setelah melakukan perintah sql
header("location:user?alert=create");
