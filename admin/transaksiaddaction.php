<?php
include '../koneksi.php';
//mengambil data dari form tansaksi add
$outlet = $_POST['outlet'];
$user = $_POST['user'];
$pelanggan = $_POST['pelanggan'];
$paket = $_POST['paket'];
$tgl_masuk = date('Y-m-d');
$tgl_selesai = $_POST['tgl_selesai'];
$berat = $_POST['berat'];
$status_bayar = 'belum';
$status_transaksi = 'proses';
$jenis_pakaian = $_POST['jenis_pakaian'];
$jumlah_pakaian = $_POST['jumlah_pakaian'];

//membuat perhitungan total bayar
$harga = mysqli_query($koneksi, "select * from tb_paket where id_paket='$paket'");
while ($d = mysqli_fetch_array($harga)) {
    $totalbayar = $berat * $d['harga'];
}
//melakukan perintah sql input data transasi pada tabel transaksi
$input_transaksi = "insert into tb_transaksi values (NULL,
'$user','$outlet','$pelanggan','$paket','$tgl_masuk',
'$tgl_selesai','$berat','$totalbayar','$status_bayar','$status_transaksi')";
mysqli_query($koneksi, $input_transaksi);
//mengarahkan kembali ke halaman transaksi dengan pesan berhasil menambahkan data

//membuat aksi input pada data detail pakaian
//membaca id transaksi sesuai record input terakhir
$id_terakhir = mysqli_insert_id($koneksi);
//mengambil data dari form detail transaksi pakaian
// input data cucian berdasarkan id transaksi ke table pakaian
for ($x = 0; $x < count($jenis_pakaian); $x++) {
    if ($jenis_pakaian[$x] != "") {
        mysqli_query($koneksi, "insert into tb_pakaian values(NULL,'$id_terakhir', '$jenis_pakaian[$x]','$jumlah_pakaian[$x]')");
    }
}

header("location:transaksi?alert=create");
