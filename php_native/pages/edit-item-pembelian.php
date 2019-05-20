<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Edit Item Pembelian</title>

    <script>
        function totalhargaitem() {
        var b = document.getElementById("hargaPembelian").value;
        var c = document.getElementById("jmlPembelian2").value;
        var d = document.getElementById("jmlPembelian").value;
        document.getElementById("jmlPembelian3").value = c - d;
        document.getElementById("totalPembelian").value = b * c;
        }
    </script>
    
    <!-- koneksi-->
    <?php
        require ("../koneksi.php");
        $id = $_GET['id'];
        $idpb = $_GET['idpb'];
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
        <div class="card-header">Edit Item Pembelian</div>
        <div class="card-body">
            <?php
            $query = mysqli_query($koneksi,"SELECT dt_pembelian.id_dt_pb, dt_pembelian.jml_brg, dt_pembelian.harga_total, produk.id_brg, produk.nama_brg, produk.harga_beli, produk.stok FROM dt_pembelian INNER JOIN produk ON dt_pembelian.id_brg = produk.id_brg WHERE id_dt_pb='$id'");
            while($data = mysqli_fetch_array($query)){
            ?>
          <form action="../act/edit-item-pembelian.php?id=<?php echo $id;?>" method="post">
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idDTPB" name="idDTPB" class="form-control" placeholder="ID DTPB" required="required" autofocus="autofocus" value="<?php echo $id;?>">
                    <label for="idDTPB">ID DTPB</label>
                  </div>
                </div>
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idPB" name="idPB" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $idpb;?>">
                    <label for="idPB">ID Transaksi</label>
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
                    <input type="text" id="stokPB" name="stokPB" class="form-control" placeholder="Stok" required="required" autofocus="autofocus" value="<?php echo $data['stok'];?>">
                    <label for="stokPB">Stok</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargaPembelian" name="hargaPembelian" class="form-control" placeholder="Harga" required="required" autofocus="autofocus" value="<?php echo $data['harga_beli'];?>">
                    <label for="hargaPembelian">Harga</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="jmlPembelian" name="jmlPembelian" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" value="<?php echo $data['jml_brg'];?>">
                    <label for="jmlPembelian">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jmlPembelian2" name="jmlPembelian2" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" value="<?php echo $data['jml_brg'];?>" onchange="totalhargaitem()" onclick="totalhargaitem()">
                    <label for="jmlPembelian2">Jumlah</label>
                  </div>
                </div>
              <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="jmlPembelian3" name="jmlPembelian3" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" value="">
                    <label for="jmlPembelian3">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="totalPembelian" name="totalPembelian" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="<?php echo $data['harga_total'];?>">
                    <label for="totalPembelian">Total</label>
                  </div>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="../beranda.php?hal=transaksi-pembelian-form&id=<?php echo $idpb;?>">Kembali</a>
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
