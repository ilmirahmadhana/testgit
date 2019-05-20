<?php
require("../koneksi.php");

$idpb = $_POST['idtransPB2'];
$tgl = $_POST['tglPembelian2'];
$idbrg = $_POST['idbrg_trpb2'];
$jml = $_POST['jmlPembelian2'];
$total = $_POST['totalPembelian2'];
$stok = $_POST['stokPembelian2'];
$tambah = $stok + $jml;

$query3 = mysqli_query($koneksi,"SELECT id_dt_pb FROM transaksi_pb ORDER BY id_pb DESC");

$query4 = mysqli_query($koneksi,"INSERT INTO dt_pembelian VALUES( NULL, '$idpb', '$idbrg', '$jml', '$total')");

$query5 = mysqli_query($koneksi,"UPDATE produk set stok='$tambah' WHERE id_brg='$idbrg'");

//show modal success
$message = "Item berhasil ditambahkan.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=transaksi-pembelian-form&id=$idpb'</script>";
?>