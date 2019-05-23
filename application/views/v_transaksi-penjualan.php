<!DOCTYPE html>
<html lang="en">
<?php
    /*error_reporting(0);*/
?>
  <head>
    <link rel="icon" type="image/png" href="<?php echo base_url('/assets/images/icons/transaksi-50.png');?>"/>
    <title>Transaksi Penjualan</title>
    
    <?php
        //include(APPPATH.'libraries/modal.php');  
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
            <li class="breadcrumb-item">
              <a href="../beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Transaksi Penjualan</li>
            <li class="breadcrumb-item">
              <a href="./list_transaksi_penjualan">List Transaksi</a>
            </li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Form Transaksi Penjualan</div>
            <form action="" method="post">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group" style="max-width:200px;">
                <div class="form-label-group">
                    <input type="text" id="idtranspj" name="idtranspj" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="">
                    <label for="idtranspj">ID Transaksi</label>
                </div>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama barang</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th colspan="2" style="text-align:center;">Aksi</th>
                    </tr>
                  </thead>
                  <!--<tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>-->
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td style="text-align:center;"><a href="pages/edit-item-penjualan.php?id=">Edit</a></td>
                      <td style="text-align:center;"><a href="act/delete-item-penjualan.php?id=" class="" onclick="return  confirm('Anda yakin ingin hapus item?')">Hapus</a></td>
                    </tr>
                      <a href="#" data-toggle="modal" data-target="#inputpenjualanModal" style="padding-left:10px;float:right;"><span class="fas fa-plus"></span></a>
                  </tbody>
                </table>
              </div>  
            </div>
            <script>
            function bayar(){
                var a = document.getElementById("totalHarga").value;
                var b = document.getElementById("bayarPJ").value;
                document.getElementById("kembaliPJ").value = b - a;
            }
            
            </script>
            <div class="modal-footer">
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="totalHarga" name="totalHarga" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="">
                <label for="totalHarga">Total</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="bayarPJ" name="bayarPJ" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" onchange="bayar()" onclick="bayar()">
                <label for="bayarPJ">Bayar</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="kembaliPJ" name="kembaliPJ" class="form-control" placeholder="Kembali" required="required" autofocus="autofocus">
                <label for="kembaliPJ">Kembali</label>
            </div>
            </div>
            <div class="card-footer">
            <input type="submit" class="btn btn-primary" name="selesaiPJ" value="Selesai" style="float:right;margin:0px 10px 10px 0px;">
            <a class="btn btn-danger" href="../beranda" style="float:right;margin:0px 10px 10px 0px;" onclick="return  confirm('Anda yakin ingin batalkan transaksi?')">Batal</a>
            </div>
            </form>
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
