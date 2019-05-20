<?php
require("../koneksi.php");

$id = $_GET['id'];
$idpj = $_GET['idpj'];

//show modal success
$query1 = mysqli_query($koneksi,"SELECT COUNT(*) FROM dt_penjualan WHERE id_pj='$idpj'");

if($query1 = 1){
    $message = "Item telah dihapus.\\nKembali ke halaman sebelumnya.";
    echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=transaksi-penjualan'</script>";
    $query2 = mysqli_query($koneksi,"UPDATE produk JOIN dt_penjualan ON produk.id_brg = dt_penjualan.id_brg SET produk.stok = dt_penjualan.jml_brg + produk.stok WHERE dt_penjualan.id_pj = '$idpj'");
    $query3 = mysqli_query($koneksi,"DELETE FROM dt_penjualan WHERE id_dt_pj='$id'");
    $query4 = mysqli_query($koneksi,"DELETE FROM transaksi_pj WHERE id_pj='$idpj'");
}else{
    $message2 = "Item telah dihapus.\\nKembali ke halaman sebelumnya.";
    echo "<script type='text/javascript'>alert('$message2');
        window.location.href='../beranda.php?hal=transaksi-penjualan-form&id=$idpj'</script>";
    $query2 = mysqli_query($koneksi,"UPDATE produk JOIN dt_penjualan ON produk.id_brg = dt_penjualan.id_brg SET produk.stok = dt_penjualan.jml_brg + produk.stok WHERE dt_penjualan.id_pj = '$id'");
    $query3 = mysqli_query($koneksi,"DELETE FROM dt_penjualan WHERE id_dt_pj='$id'");
}

?>