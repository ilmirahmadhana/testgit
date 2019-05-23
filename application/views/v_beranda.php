<!DOCTYPE html>
<html lang="en">
<?php
    /*error_reporting(0);*/
?>
  <head>
    <link rel="icon" type="image/png" href="<?php echo base_url('/assets/images/icons/home.png');?>"/>
    <title>Beranda</title>
    
    <?php
        include(APPPATH.'libraries/modal.php');  
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('/assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/assets/css/sb-admin.css');?>" rel="stylesheet">
      
    <link href="<?php echo base_url('/assets/css/util.css');?>" rel="stylesheet">

  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="beranda">Buku Penjualan</a>
      <i class="fs-14 p-l-10" style="color:white;text-decoration:underline;">&nbsp;Buku Besar Akuntansi</i>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2" onchange="<?php ?>">
          <div class="input-group-append">
            <a class="btn btn-primary">
              <i class="fas fa-search"></i>
            </a>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="badge badge-danger" style="font-size:10px;"><?php echo "!";?></span>
            <i class="fas fa-bell fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="<?php echo "beranda.php?hal=pembayaran-piutang"?>"><?php echo "Ada pelanggan<br>yang masih berhutang";?></a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Hi, <?php echo $this->session->userdata("nama"); ?></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="beranda.php?hal=pengaturan-akun">Pengaturan</a>
            <a class="dropdown-item" href="beranda.php?hal=lupa-password">Lupa Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('bukupenjualan/logout');?>">Keluar</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">
      <div id="content-wrapper">
        <div class="container-fluid">
            
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Beranda</li>
            </ol>
            <div class="row">
                <div class="col-xl-1 col-sm-6 mb-3" style="">
                    <span class="float-left">
                    <a href="beranda/produk">
                    <img src="<?php echo base_url('/assets/images/icons/produk.png');?>">
                    </a>
                    </span>
                    <span class="float-left">Produk</span>
                </div>
                <div class="col-xl-1 col-sm-6 mb-3">
                    <span class="float-left">
                    <a href="#" data-toggle="modal" data-target="#transaksiModal">
                    <img src="<?php echo base_url('/assets/images/icons/transaksi.png');?>">
                    </a>
                    </span>
                    <span class="float-left">Transaksi</span>
                </div>
                <div class="col-xl-1 col-sm-6 mb-3">
                    <span class="float-left">
                    <a href="#" data-toggle="modal" data-target="#pembayaranModal">
                    <img src="<?php echo base_url('/assets/images/icons/pembayaran.png');?>">
                    </a>
                    </span>
                    <span class="float-left">Pembayaran</span>
                </div>
                <div class="col-xl-1 col-sm-6 mb-3" style="">
                    <span class="float-left">
                    <a href="beranda/pengeluaran">
                    <img src="<?php echo base_url('/assets/images/icons/pengeluaran.png');?>">
                    </a>
                    </span>
                    <span class="float-left">Pengeluaran</span>
                </div>
                <div class="col-xl-1 col-sm-6 mb-3" style="">
                    <span class="float-left">
                    <a href="#" data-toggle="modal" data-target="#kontakModal">
                    <img src="<?php echo base_url('/assets/images/icons/kontak.png');?>">
                    </a>
                    </span>
                    <span class="float-left">Kontak</span>
                </div>
                <div class="col-xl-1 col-sm-6 mb-3">
                    <span class="float-left">
                    <a href="#" name="laporan" data-toggle="modal" data-target="#laporanModal">
                    <img src="<?php echo base_url('/assets/images/icons/laporan.png');?>">
                    </a>
                    </span>
                    <span class="float-left">Laporan</span>
                </div>
            </div>
            
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer id="kaki" class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center">
              <span>Copyright © Powered by Politeknik Negeri Jember - MIF 2017</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    
    <?php
        //require("modal.php");
    ?>
      
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('/assets/vendor/chart.js/Chart.min.js');?>"></script>
    <script src="<?php echo base_url('/assets/vendor/datatables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/assets/js/sb-admin.min.js');?>"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url('/assets/js/demo/datatables-demo.js');?>"></script>
    <script src="<?php echo base_url('/assets/js/demo/chart-area-demo.js');?>"></script>
    
    <!-- go to previous pages-->
    <script>
    function goBack() {
      window.history.back();
    }
    </script>
    
  </body>

</html>
