<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item active">Beranda</li>
</ol>

<link rel="icon" type="image/png" href="images/icons/home.png"/>

<!-- Icon Cards-->
<div class="row">
<?php
    require("koneksi.php");
    $sesiuser = $_SESSION['username'];
    $querole = mysqli_query($koneksi,"SELECT user.grup,grup.id_grup,grup.nama_grup FROM grup INNER JOIN user ON user.grup = grup.id_grup WHERE user.username = '$sesiuser'");
    $datrole = mysqli_fetch_array($querole);
    if($datrole){
        if($datrole['nama_grup'] == "user"){
?>
<div class="col-xl-1 col-sm-6 mb-3" style="<?php echo "display:none;";?>">
<span class="float-left">
<a href="beranda.php?hal=produk">
<img src="images/icons/produk.png">
</a>
</span>
<span class="float-left">Produk</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="#" data-toggle="modal" data-target="#transaksiModal">
<img src="images/icons/transaksi.png">
</a>
</span>
<span class="float-left">Transaksi</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="#" data-toggle="modal" data-target="#pembayaranModal">
<img src="images/icons/pembayaran.png">
</a>
</span>
<span class="float-left">Pembayaran</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3" style="<?php echo "display:none;";?>">
<span class="float-left">
<a href="?hal=pengeluaran">
<img src="images/icons/pengeluaran.png">
</a>
</span>
<span class="float-left">Pengeluaran</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3" style="<?php echo "display:none;";?>">
<span class="float-left">
<a href="#" data-toggle="modal" data-target="#kontakModal">
<img src="images/icons/kontak.png">
</a>
</span>
<span class="float-left">Kontak</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="#" name="laporan" data-toggle="modal" data-target="#laporanModal">
<img src="images/icons/laporan.png">
</a>
</span>
<span class="float-left">Laporan</span>
</div>
<?php 
}else{
?>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="beranda.php?hal=produk">
<img src="images/icons/produk.png">
</a>
</span>
<span class="float-left">Produk</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="#" data-toggle="modal" data-target="#transaksiModal">
<img src="images/icons/transaksi.png">
</a>
</span>
<span class="float-left">Transaksi</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="#" data-toggle="modal" data-target="#pembayaranModal">
<img src="images/icons/pembayaran.png">
</a>
</span>
<span class="float-left">Pembayaran</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="?hal=pengeluaran">
<img src="images/icons/pengeluaran.png">
</a>
</span>
<span class="float-left">Pengeluaran</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="#" data-toggle="modal" data-target="#kontakModal">
<img src="images/icons/kontak.png">
</a>
</span>
<span class="float-left">Kontak</span>
</div>
<div class="col-xl-1 col-sm-6 mb-3">
<span class="float-left">
<a href="#" name="laporan" data-toggle="modal" data-target="#laporanModal">
<img src="images/icons/laporan.png">
</a>
</span>
<span class="float-left">Laporan</span>
</div>
<?php
}
} 
?>
</div>