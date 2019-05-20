<?php
require("../koneksi.php");

$query1 = mysqli_query($koneksi,"SELECT id_sales FROM sales ORDER BY id_sales DESC");

$nama = $_POST['nmSales'];
$perusahaan = $_POST['nmSalesprsh'];
$alamat = $_POST['alamatSales'];
$notelpon = $_POST['noteleponSales'];

$query2 = mysqli_query($koneksi,"INSERT INTO sales VALUES('', '$nama', '$perusahaan', '$alamat', '$notelpon')");

//show modal success
$message = "Data sales sukses diinputkan.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=kontak-sales'</script>";
?>