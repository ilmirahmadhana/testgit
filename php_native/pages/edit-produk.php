<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Edit Produk</title>

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
        <div class="card-header">Edit Produk</div>
        <div class="card-body">
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_brg='$id'");
            while($data = mysqli_fetch_array($query)){
            ?>
          <form action="../act/edit-produk.php" method="post">
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="Id" name="Id" class="form-control" placeholder="ID Produk" required="required" autofocus="autofocus" value="<?php echo $data['id_brg'];?>">
                    <label for="Id">ID Produk</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="nmProduk" name="nmProduk" class="form-control" placeholder="Nama produk" required="required" autofocus="autofocus" value="<?php echo $data['nama_brg'];?>">
                    <label for="nmProduk">Nama produk</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargabeliProduk" name="hargabeliProduk" class="form-control" placeholder="Harga beli" required="required" autofocus="autofocus" value="<?php echo $data['harga_beli'];?>">
                    <label for="hargabeliProduk">Harga beli</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargajualProduk" name="hargajualProduk" class="form-control" placeholder="Harga jual" required="required" autofocus="autofocus" value="<?php echo $data['harga_jual'];?>">
                    <label for="hargajualProduk">Harga jual</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <select id="jenisProduk" name="jenisProduk" class="form-control" placeholder="Jenis barang" required="required" onchange="jenispro()">
                    <option value="" selected>--- Pilih jenis barang ---</option>
                    <option value="Cat">Cat</option>
                    <option value="Kuas">Kuas</option>
                    </select>
                  </div>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="../beranda.php?hal=produk">Kembali</a>
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
