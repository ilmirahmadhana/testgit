<?php
require("../koneksi.php");

$id = $_POST['idcustomer'];
$nama = $_POST['namacustomer'];
$notelp = $_POST['notelpcustomer'];
$alamat = $_POST['alamatcustomer'];

$query2 = mysqli_query($koneksi,"UPDATE customer SET nm_customer='$nama', no_telepon='$notelp', alamat='$alamat' WHERE id_customer='$id'");
//show modal success
$message = "Data telah diubah.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=kontak-customer'</script>";
?>