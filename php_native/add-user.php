<?php
require("../koneksi.php");

$query1 = mysqli_query($koneksi,"SELECT id_user FROM user ORDER BY id_user DESC");

$user = $_POST['user'];
$pass = $_POST['pass'];
$role = $_POST['statsrole'];

$query2 = mysqli_query($koneksi,"INSERT INTO user VALUES('', '$user', '$pass', '$role', NULL)");

//show modal success
$message = "User baru berhasil dibuat.\\nKembali ke halaman sebelumnya.";
echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=pengaturan-akun'</script>";
?>