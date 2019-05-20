<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Edit Item Penjualan</title>

    <script>
        function totalhargaitem() {
        var b = document.getElementById("hargaPenjualan").value;
        var c = document.getElementById("jmlPenjualan2").value;
        var d = document.getElementById("jmlPenjualan").value;
        document.getElementById("jmlPenjualan3").value = d - c;
        document.getElementById("totalPenjualan").value = b * c;
        }
    </script>
    
    <!-- koneksi-->
    <?php
        require ("../koneksi.php");
        $id = $_GET['id'];
        $idpj = $_GET['idpj'];
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
        <div class="card-header">Edit Item Penjualan</div>
        <div class="card-body">
            <?php
            $query = mysqli_query($koneksi,"SELECT dt_penjualan.id_dt_pj, dt_penjualan.jml_brg, dt_penjualan.harga_total, produk.id_brg, produk.nama_brg, produk.harga_jual, produk.stok FROM dt_penjualan INNER JOIN produk ON dt_penjualan.id_brg = produk.id_brg WHERE id_dt_pj='$id'");
            while($data = mysqli_fetch_array($query)){
            ?>
          <form action="../act/edit-item-penjualan.php?id=<?php echo $id;?>" method="post">
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idDTPJ" name="idDTPJ" class="form-control" placeholder="ID DTPJ" required="required" autofocus="autofocus" value="<?php echo $id;?>">
                    <label for="idDTPJ">ID DTPJ</label>
                  </div>
                </div>
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idPJ" name="idPJ" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $idpj;?>">
                    <label for="idPJ">ID Transaksi</label>
                  </div>
                </div>
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idProduk" name="idProduk" class="form-control" placeholder="ID Produk" required="required" autofocus="autofocus" value="<?php echo $data['id_brg'];?>">
                    <label for="idProduk">ID Produk</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="nmProduk" name="nmProduk" class="form-control" placeholder="Nama produk" required="required" autofocus="autofocus" value="<?php echo $data['nama_brg'];?>">
                    <label for="nmProduk">Nama produk</label>
                  </div>
                </div>
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="stokPJ" name="stokPJ" class="form-control" placeholder="Stok" required="required" autofocus="autofocus" value="<?php echo $data['stok'];?>">
                    <label for="stokPJ">Stok</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargaPenjualan" name="hargaPenjualan" class="form-control" placeholder="Harga" required="required" autofocus="autofocus" value="<?php echo $data['harga_jual'];?>">
                    <label for="hargaPenjualan">Harga</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="jmlPenjualan" name="jmlPenjualan" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" value="<?php echo $data['jml_brg'];?>">
                    <label for="jmlPenjualan">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jmlPenjualan2" name="jmlPenjualan2" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" value="<?php echo $data['jml_brg'];?>" onchange="totalhargaitem()" onclick="totalhargaitem()">
                    <label for="jmlPenjualan2">Jumlah</label>
                  </div>
                </div>
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="jmlPenjualan3" name="jmlPenjualan3" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" value="">
                    <label for="jmlPenjualan3">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="totalPenjualan" name="totalPenjualan" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="<?php echo $data['harga_total'];?>">
                    <label for="totalPenjualan">Total</label>
                  </div>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="../beranda.php?hal=transaksi-penjualan-form&id=<?php echo $idpj;?>">Kembali</a>
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
