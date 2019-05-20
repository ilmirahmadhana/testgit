<?php
require("../koneksi.php");

$query1 = mysqli_query($koneksi,"SELECT id_customer FROM customer ORDER BY id_customer DESC");

$nama = $_POST['nmCustomer'];
$alamat = $_POST['alamatCustomer'];
$notelpon = $_POST['noteleponCustomer'];

$query2 = mysqli_query($koneksi,"INSERT INTO customer VALUES('', '$nama', '$alamat', '$notelpon')");

//show modal success
$message = "Data customer sukses diinputkan.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=kontak-customer'</script>";
?>