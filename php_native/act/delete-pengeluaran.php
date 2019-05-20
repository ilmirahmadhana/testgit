<?php
require("../koneksi.php");

$id = $_GET['id'];

//show modal success deleting account
$message = "Pengluaran telah dihapus.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=pengeluaran'</script>";
$query = mysqli_query($koneksi,"DELETE FROM pengeluaran WHERE id_pengeluaran='$id'");
?>