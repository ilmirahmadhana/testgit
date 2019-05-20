<?php
require("../koneksi.php");

$idpj = $_POST['idtransPJ'];
$tgl = $_POST['tglPenjualan'];
$idbrg = $_POST['idbrg_trpj'];
$jml = $_POST['jmlPenjualan'];
$total = $_POST['totalPenjualan'];
$stok = $_POST['stokPenjualan'];
$kurangi = $stok - $jml;

$query3 = mysqli_query($koneksi,"SELECT id_dt_pj FROM transaksi_pj ORDER BY id_pj DESC");

$query4 = mysqli_query($koneksi,"INSERT INTO dt_penjualan VALUES( NULL, '$idpj', '$idbrg', '$jml', '$total')");

$query5 = mysqli_query($koneksi,"UPDATE produk set stok='$kurangi' WHERE id_brg='$idbrg'");

//show modal success
$message = "Item berhasil ditambahkan.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=transaksi-penjualan-form&id=$idpj'</script>";
?>