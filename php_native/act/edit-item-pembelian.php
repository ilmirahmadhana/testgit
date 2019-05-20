<?php
require("../koneksi.php");

$id = $_POST['idDTPB'];
$idpj = $_POST['idPB'];
$idpro = $_POST['idProduk'];
$jml = $_POST['jmlPembelian'];
$jml2 = $_POST['jmlPembelian2'];
$jml3 = $_POST['jmlPembelian3'];
$total = $_POST['totalPembelian'];
$stok = $_POST['stokPB'];
$tambahi = $stok + $jml3;

$query2 = mysqli_query($koneksi,"UPDATE dt_pembelian SET jml_brg='$jml2', harga_total='$total' WHERE id_dt_pb='$id'");

$query3 = mysqli_query($koneksi,"UPDATE produk SET stok='$tambahi' WHERE id_brg='$idpro'");

//show modal success creating account
$message = "Jumlah item telah diubah.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=transaksi-pembelian-form&id=$idpj'</script>";
?>