<?php
require("../koneksi.php");

$id = $_GET['id'];

//show modal success
$message = "Sales telah dihapus.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=kontak-sales'</script>";
$query = mysqli_query($koneksi,"DELETE FROM sales WHERE id_sales='$id'");
?>