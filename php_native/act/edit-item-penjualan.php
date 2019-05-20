<?php
require("../koneksi.php");

$id = $_POST['idDTPJ'];
$idpj = $_POST['idPJ'];
$idpro = $_POST['idProduk'];
$jml = $_POST['jmlPenjualan'];
$jml2 = $_POST['jmlPenjualan2'];
$jml3 = $_POST['jmlPenjualan3'];
$total = $_POST['totalPenjualan'];
$stok = $_POST['stokPJ'];
$tambahi = $stok + $jml3;

$query2 = mysqli_query($koneksi,"UPDATE dt_penjualan SET jml_brg='$jml2', harga_total='$total' WHERE id_dt_pj='$id'");

$query3 = mysqli_query($koneksi,"UPDATE produk SET stok='$tambahi' WHERE id_brg='$idpro'");

//show modal success creating account
$message = "Jumlah item telah diubah.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=transaksi-penjualan-form&id=$idpj'</script>";
?>