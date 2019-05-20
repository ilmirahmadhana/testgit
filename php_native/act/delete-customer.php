<?php
require("../koneksi.php");

$id = $_GET['id'];

//show modal success
$message = "Customer telah dihapus.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=kontak-customer'</script>";
$query = mysqli_query($koneksi,"DELETE FROM customer WHERE id_customer='$id'");
?>