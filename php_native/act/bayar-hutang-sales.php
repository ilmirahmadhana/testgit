<?php
require("../koneksi.php");

$id = $_POST['IdH'];
$id2 = $_POST['idSales'];
$tgl = date("Y-m-d");
$jml = $_POST['jml2'];
$bayar = $_POST['bayar2'];
$terbayar = $_POST['jmlterbayar2'];
$tambah = $terbayar + $bayar;
$kurangi = $jml - $bayar;

$query3 = mysqli_query($koneksi,"SELECT id_hutang FROM hutang ORDER BY id_hutang DESC");

$query4 = mysqli_query($koneksi,"INSERT INTO dt_hutang VALUES( NULL, '$id', '$bayar', '$tgl')");

$query5 = mysqli_query($koneksi,"UPDATE hutang set jml_hutang='$kurangi' WHERE id_hutang='$id'");

$query6 = mysqli_query($koneksi,"UPDATE transaksi_pb set bayar='$tambah' WHERE id_sales='$id2'");

//show modal success
$message = "Data berhasil diinputkan.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=pembayaran-hutang'</script>";
?>