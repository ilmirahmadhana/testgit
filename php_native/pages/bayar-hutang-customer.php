<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Customer Bayar Hutang</title>

    <!-- koneksi-->
    <?php
        require ("../koneksi.php");
        $id = $_GET['id'];
    ?>
      
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Customer Bayar Hutang</div>
        <div class="card-body">
            <?php
            $query = mysqli_query($koneksi,"SELECT piutang.id_piutang,piutang.jml_hutang,piutang.tgl_jthtempo,piutang.ket,transaksi_pj.id_customer,transaksi_pj.bayar,customer.nm_customer FROM piutang INNER JOIN transaksi_pj ON piutang.id_piutang = transaksi_pj.id_piutang INNER JOIN customer ON transaksi_pj.id_customer = customer.id_customer WHERE piutang.id_piutang='$id'");
            while($data = mysqli_fetch_array($query)){
            ?>
          <form action="../act/bayar-hutang-customer.php" method="post">
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="Id" name="Id" class="form-control" placeholder="Id" required="required" autofocus="autofocus" value="<?php echo $data['id_piutang'];?>">
                    <label for="Id">Id</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idCustomer" name="idCustomer" class="form-control" placeholder="ID Customer" required="required" autofocus="autofocus" value="<?php echo $data['id_customer'];?>">
                    <label for="idCustomer">ID Customer</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jml" name="jml" class="form-control" placeholder="Jumlah hutang" required="required" autofocus="autofocus" value="<?php echo $data['jml_hutang'];?>">
                    <label for="jml">Jumlah hutang</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="jmlterbayar" name="jmlterbayar" class="form-control" placeholder="Terbayar" required="required" autofocus="autofocus" value="<?php echo $data['bayar'];?>">
                    <label for="jmlterbayar">Terbayar</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="bayar" name="bayar" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus">
                    <label for="bayar">Bayar</label>
                  </div>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="../beranda.php?hal=pembayaran-piutang">Kembali</a>
                    <input class="btn btn-primary" type="submit" name="submit" value="Kirim">
                </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>
</html>
