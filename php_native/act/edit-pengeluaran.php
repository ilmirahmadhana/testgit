<?php
require("../koneksi.php");

$id = $_POST['Id'];
$tgl = $_POST['tgl'];
$jumlah = $_POST['jml'];
$ket = $_POST['keterangan'];

$query2 = mysqli_query($koneksi,"UPDATE pengeluaran SET jumlah_pengeluaran='$jumlah', keterangan='$ket' WHERE id_pengeluaran='$id'");
//show modal success creating account
$message = "Data telah diubah.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=pengeluaran'</script>";
?>