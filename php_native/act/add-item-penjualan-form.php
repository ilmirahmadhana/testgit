<?php
require("../koneksi.php");

$idpj = $_POST['idtransPJ2'];
$tgl = $_POST['tglPenjualan2'];
$idbrg = $_POST['idbrg_trpj2'];
$jml = $_POST['jmlPenjualan2'];
$total = $_POST['totalPenjualan2'];
$stok = $_POST['stokPenjualan2'];
$kurangi = $stok - $jml;

$query3 = mysqli_query($koneksi,"SELECT id_dt_pj FROM transaksi_pj ORDER BY id_pj DESC");

$query4 = mysqli_query($koneksi,"INSERT INTO dt_penjualan VALUES( NULL, '$idpj', '$idbrg', '$jml', '$total')");

$query5 = mysqli_query($koneksi,"UPDATE produk set stok='$kurangi' WHERE id_brg='$idbrg'");

//show modal success
$message = "Item berhasil ditambahkan.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=transaksi-penjualan-form&id=$idpj'</script>";
?>