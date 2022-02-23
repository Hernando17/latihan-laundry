<?php
session_start();
// menghubungkan dengan koneksi
include 'koneksi.php';
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']); //melakukan enkripsi menjadi format MD5
// mencari data pada tabel user sesuai data inputan form
$sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
// membuat variabel mengkonfirmasi data antara aplikasi dengan database
$login = mysqli_query($koneksi, $sql);
//membuat value untuk membaca kondisi data, jika ditemukan value 1 jika tidak 0
$cek = mysqli_num_rows($login);
//membuat algoritma decision menggunakan value kondisi data
if ($cek > 0) {
    //memecah data menjadi perkolom dari tabel
    $data = mysqli_fetch_assoc($login);
    //membuat algoritma untuk membedakan data level user sebagai bahan penentuan login
    if ($data['level'] == "admin") {
        $_SESSION['status'] = "admin_login";
        header("location:admin/");
    } else if ($data['level'] == "kasir") {
        header("location:kasir/");
    } else if ($data['level'] == "owner") {
        header("location:owner/");
    } else {
        header("location:index?alert=gagal");
    }
} else {
    header("location:index?alert=gagal");
}
