<?php
require("../koneksi.php");

$query1 = mysqli_query($koneksi,"SELECT id_pengeluaran FROM pengeluaran ORDER BY id_pengeluaran DESC");

$tgl = $_POST['tglPengeluaran'];
$jumlah = $_POST['jmlPengeluaran'];
$ket = $_POST['keterangan'];

$query2 = mysqli_query($koneksi,"INSERT INTO pengeluaran VALUES('', '$tgl', '$jumlah', '$ket')");

//show modal success
$message = "Pengeluaran sukses diinputkan.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=pengeluaran'</script>";
?>