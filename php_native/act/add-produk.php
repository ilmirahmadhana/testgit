<?php
require("../koneksi.php");

$query1 = mysqli_query($koneksi,"SELECT id_brg FROM produk ORDER BY id_brg DESC");

$id = $_POST['idProduk'];
$nama = $_POST['nmProduk'];
$hargabeli = $_POST['hargabeliProduk'];
$hargajual = $_POST['hargajualProduk'];
$jenis = $_POST['jenisProduk'];
$stok = $_POST['stokProduk'];

$query2 = mysqli_query($koneksi,"INSERT INTO produk VALUES('$id', '$nama', '$hargabeli', '$hargajual', '$jenis', '$stok')");

//show modal success
$message = "Produk sukses diinputkan.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=produk'</script>";
?>