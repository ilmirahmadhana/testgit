<?php
require("../koneksi.php");

$id = $_POST['Id'];
$nama = $_POST['nmProduk'];
$hargabeli = $_POST['hargabeliProduk'];
$hargajual = $_POST['hargajualProduk'];
$jenis = $_POST['jenisProduk'];

$query2 = mysqli_query($koneksi,"UPDATE produk SET id_brg='$id', nama_brg='$nama', harga_beli='$hargabeli', harga_jual='$hargajual', jenis_brg='$jenis' WHERE id_brg='$id'");
//show modal success
$message = "Data telah diubah.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=produk'</script>";
?>