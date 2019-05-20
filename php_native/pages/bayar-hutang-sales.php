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
        <div class="card-header">Bayar Hutang</div>
        <div class="card-body">
            <?php
            $query = mysqli_query($koneksi,"SELECT hutang.id_hutang,hutang.jml_hutang,hutang.tgl_jthtempo,hutang.ket,transaksi_pb.id_sales,transaksi_pb.bayar,sales.nm_sales FROM hutang INNER JOIN transaksi_pb ON hutang.id_hutang = transaksi_pb.id_hutang INNER JOIN sales ON transaksi_pb.id_sales = sales.id_sales WHERE hutang.id_hutang='$id'");
            while($data = mysqli_fetch_array($query)){
            ?>
          <form action="../act/bayar-hutang-sales.php" method="post">
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="IdH" name="IdH" class="form-control" placeholder="Id" required="required" autofocus="autofocus" value="<?php echo $data['id_hutang'];?>">
                    <label for="IdH">Id</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idSales" name="idSales" class="form-control" placeholder="ID Sales" required="required" autofocus="autofocus" value="<?php echo $data['id_sales'];?>">
                    <label for="idSales">ID Sales</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jml2" name="jml2" class="form-control" placeholder="Jumlah hutang" required="required" autofocus="autofocus" value="<?php echo $data['jml_hutang'];?>">
                    <label for="jml2">Jumlah hutang</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="jmlterbayar2" name="jmlterbayar2" class="form-control" placeholder="Terbayar" required="required" autofocus="autofocus" value="<?php echo $data['bayar'];?>">
                    <label for="jmlterbayar2">Terbayar</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="bayar2" name="bayar2" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus">
                    <label for="bayar2">Bayar</label>
                  </div>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="../beranda.php?hal=pembayaran-hutang">Kembali</a>
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
