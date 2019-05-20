<?php
require("../koneksi.php");

$id = $_POST['idsales'];
$nama = $_POST['namasales'];
$perusahaan = $_POST['namasalesprsh'];
$notelp = $_POST['notelpsales'];
$alamat = $_POST['alamatsales'];

$query2 = mysqli_query($koneksi,"UPDATE sales SET nm_sales='$nama', nm_perusahaan='$perusahaan', alamat_perusahaan='$alamat', no_telepon='$notelp' WHERE id_sales='$id'");
//show modal success creating account
$message = "Data telah diubah.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=kontak-sales'</script>";
?>