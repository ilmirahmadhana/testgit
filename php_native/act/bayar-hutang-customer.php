<?php
require("../koneksi.php");

$id = $_POST['Id'];
$id2 = $_POST['idCustomer'];
$tgl = date("Y-m-d");
$jml = $_POST['jml'];
$bayar = $_POST['bayar'];
$terbayar = $_POST['jmlterbayar'];
$tambah = $terbayar + $bayar;
$kurangi = $jml - $bayar;

$query3 = mysqli_query($koneksi,"SELECT id_piutang FROM piutang ORDER BY id_piutang DESC");

$query4 = mysqli_query($koneksi,"INSERT INTO dt_piutang VALUES( NULL, '$id', '$bayar', '$tgl')");

$query5 = mysqli_query($koneksi,"UPDATE piutang set jml_hutang='$kurangi' WHERE id_piutang='$id'");

$query6 = mysqli_query($koneksi,"UPDATE transaksi_pj set bayar='$tambah' WHERE id_customer='$id2'");

//show modal success
$message = "Data berhasil diinputkan.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=pembayaran-piutang'</script>";
?>