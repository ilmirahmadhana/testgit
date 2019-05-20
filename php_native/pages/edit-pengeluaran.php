<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Edit Pengeluaran</title>

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
        <div class="card-header">Edit Pengeluaran</div>
        <div class="card-body">
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE id_pengeluaran='$id'");
            while($data = mysqli_fetch_array($query)){
            ?>
          <form action="../act/edit-pengeluaran.php" method="post">
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="Id" name="Id" class="form-control" placeholder="Id" required="required" autofocus="autofocus" value="<?php echo $data['id_pengeluaran'];?>">
                    <label for="Id">Id</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="tgl" name="tgl" class="form-control" placeholder="Tanggal" required="required" autofocus="autofocus" value="<?php echo $data['tgl'];?>">
                    <label for="tgl">Tanggal</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jml" name="jml" class="form-control" placeholder="Jumlah Pengeluaran" required="required" autofocus="autofocus" value="<?php echo $data['jumlah_pengeluaran'];?>">
                    <label for="jml">Jumlah pengeluaran</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" required="required"><?php echo $data['keterangan'];?></textarea>
                  </div>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="../beranda.php?hal=pengeluaran">Kembali</a>
                    <input class="btn btn-primary" type="submit" name="submit" value="Ubah">
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
