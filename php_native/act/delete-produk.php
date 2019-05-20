<?php
require("../koneksi.php");

$id = $_GET['id'];

//show modal success deleting account
$message = "Produk telah dihapus.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=produk'</script>";
$query = mysqli_query($koneksi,"DELETE FROM produk WHERE id_brg='$id'");
?>