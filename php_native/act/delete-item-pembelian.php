<?php
require("../koneksi.php");

$id = $_GET['id'];
$idpb = $_GET['idpb'];

//show modal success
$query1 = mysqli_query($koneksi,"SELECT COUNT(*) FROM dt_pembelian WHERE id_pb='$idpb'");

if($query1 = 1){
    $message = "Item telah dihapus.\\nKembali ke halaman sebelumnya.";
    echo "<script type='text/javascript'>alert('$message');
        window.location.href='../beranda.php?hal=transaksi-pembelian'</script>";
    $query2 = mysqli_query($koneksi,"UPDATE produk JOIN dt_pembelian ON produk.id_brg = dt_pembelian.id_brg SET produk.stok = produk.stok - dt_pembelian.jml_brg WHERE dt_pembelian.id_pb = '$idpb'");
    $query3 = mysqli_query($koneksi,"DELETE FROM dt_pembelian WHERE id_dt_pb='$id'");
    $query4 = mysqli_query($koneksi,"DELETE FROM transaksi_pb WHERE id_pb='$idpb'");
}else{
    $message2 = "Item telah dihapus.\\nKembali ke halaman sebelumnya.";
    echo "<script type='text/javascript'>alert('$message2');
        window.location.href='../beranda.php?hal=transaksi-pembelian-form&id=$idpb'</script>";
    $query2 = mysqli_query($koneksi,"UPDATE produk JOIN dt_pembelian ON produk.id_brg = dt_pembelian.id_brg SET produk.stok = dt_pembelian.jml_brg + produk.stok WHERE dt_pembelian.id_pb = '$id'");
    $query3 = mysqli_query($koneksi,"DELETE FROM dt_pembelian WHERE id_dt_pb='$id'");
}

?>