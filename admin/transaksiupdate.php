<?php
// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form edit
$id = $_POST['id'];
$outlet = $_POST['outlet'];
$pelanggan = $_POST['pelanggan'];
$paket = $_POST['paket'];
$berat = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];
$bayar = $_POST['bayar'];
$status = $_POST['status'];
//membuat perhitungan total bayar
$harga = mysqli_query($koneksi, "select * from tb_paket where id_paket='$paket'");
while ($d = mysqli_fetch_array($harga)) {
    $totalbayar = $berat * $d['harga'];
}
// update data transaksi
$update_transaksi = "update tb_transaksi set
id_pelanggan='$pelanggan',id_outlet='$outlet',id_paket='$paket',
total_bayar='$totalbayar', berat='$berat', tgl_selesai='$tgl_selesai',
status_bayar='$bayar', status_transaksi='$status' where id_transaksi='$id'";
mysqli_query($koneksi, $update_transaksi);
mysqli_query($koneksi, "update tb_transaksi set
id_pelanggan='$pelanggan',id_outlet='$outlet', id_paket='$paket',
total_bayar='$totalbayar', berat='$berat', tgl_selesai='$tgl_selesai',
status_bayar='$bayar', status_transaksi='$status' where id_transaksi='$id'");

// menangkap data form input array (jenis pakaian dan jumlah pakaian)
$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];

// menghapus semua pakaian dalam transaksi ini
mysqli_query($koneksi, "delete from tb_pakaian where id_transaksi='$id'");
// input ulang data cucian berdasarkan id transaksi (invoice) ke table pakaian
for ($x = 0; $x < count($jenis_pakaian); $x++) {
    if ($jenis_pakaian[$x] != "") {
        mysqli_query($koneksi, "insert into tb_pakaian

values(NULL, '$id', '$jenis_pakaian[$x]','$jumlah_pakaian[$x]')");
    }
}
// echo "$update_transaksi";
header("location:transaksi?alert=update");
