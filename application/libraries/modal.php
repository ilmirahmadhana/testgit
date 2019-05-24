    <!-- Transaksi Modal-->
    <div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilihan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Transaksi Anda</div>
          <div class="modal-footer">
            <a class="btn btn-success" href="beranda/transaksi_penjualan">Penjualan</a>
            <a class="btn btn-primary" href="beranda/transaksi_pembelian">Pembelian</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Pembayaran Modal-->
    <div class="modal fade" id="pembayaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilihan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Pembayaran Anda</div>
          <div class="modal-footer">
            <a class="btn btn-primary" href="?hal=pembayaran-hutang">Hutang</a>
            <a class="btn btn-success" href="beranda/pembayaran_piutang">Piutang</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Input Produk Modal-->
    <div class="modal fade" id="inputprodukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Input Produk</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-produk.php" method="post">
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idProduk" name="idProduk" class="form-control" placeholder="ID Produk" required="required" value="<?php echo $idBRG;?>" autofocus="autofocus">
                    <label for="idProduk">ID Produk</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="nmProduk" name="nmProduk" class="form-control" placeholder="Nama produk" required="required" autofocus="autofocus">
                    <label for="nmProduk">Nama produk</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargabeliProduk" name="hargabeliProduk" class="form-control" placeholder="Harga beli" required="required" autofocus="autofocus">
                    <label for="hargabeliProduk">Harga beli</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargajualProduk" name="hargajualProduk" class="form-control" placeholder="Harga jual" required="required" autofocus="autofocus">
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
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="stokProduk" name="stokProduk" class="form-control" placeholder="Stok" required="required" autofocus="autofocus">
                    <label for="stokProduk">Stok</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Kirim">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Input Penjualan Modal-->
    <div class="modal fade" id="inputpenjualanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Tambah item</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-item-penjualan.php" method="post">
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="text" id="idtransPJ" name="idtransPJ" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $idPJ;?>">
                    <label for="idtransPJ">ID Transaksi</label>
                  </div>
                </div>
                <div class="row">
                    <script>
                    function cmbidbrg() {
                    var a = document.getElementById("idbrg_trpj_cmb").value;
                    document.getElementById("idbrg_trpj").value = a.substr(0,7);
                    document.getElementById("hargaPenjualan").value = a.substr(7,6);
                    document.getElementById("stokPenjualan").value = a.substr(13,2);
                    }
                    function totalhargaitem() {
                    var b = document.getElementById("hargaPenjualan").value;
                    var c = document.getElementById("jmlPenjualan").value;
                    document.getElementById("totalPenjualan").value = b * c;
                    }
                    </script>
                    <div class="column"><div class="form-label-group">
                    <input type="text" id="idbrg_trpj" name="idbrg_trpj" class="form-control" placeholder="ID barang" required="required" autofocus="autofocus">
                    <label for="idbrg_trpj">ID barang</label>
                    </div></div>
                    <?php
                        $query1 = mysqli_query($koneksi,"SELECT * FROM produk");
                    ?>
                    <div class="column"><select id="idbrg_trpj_cmb" name="idbrg_trpj_cmb" class="form-control" required="required" autofocus="autofocus" onchange="cmbidbrg()">
                    <option selected>--- Pilih satu barang ---</option>
                    <?php while($data1 = mysqli_fetch_array($query1)){?>
                    <option value="<?php echo $data1[0],$data1[3],$data1[5];?>"><?php echo $data1['nama_brg'];?></option>
                    <?php }?>
                    </select></div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargaPenjualan" name="hargaPenjualan" class="form-control" placeholder="Harga" required="required" autofocus="autofocus">
                    <label for="hargaPenjualan">Harga</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="stokPenjualan" name="stokPenjualan" class="form-control" placeholder="Stok" required="required" autofocus="autofocus">
                    <label for="stokPenjualan">Stok</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jmlPenjualan" name="jmlPenjualan" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" onchange="totalhargaitem()" onclick="totalhargaitem()">
                    <label for="jmlPenjualan">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="totalPenjualan" name="totalPenjualan" class="form-control" placeholder="Total" required="required" autofocus="autofocus">
                    <label for="totalPenjualan">Total</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="date" id="tglPenjualan" name="tglPenjualan" class="form-control" placeholder="Tanggal" required="required" autofocus="autofocus" value="<?php echo date("Y-m-d");?>">
                    <label for="tglPenjualan">Tanggal</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="additemPJ" value="Tambah">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Input Pembelian Modal-->
    <div class="modal fade" id="inputpembelianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Tambah item</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-item-pembelian.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="idtransPB" name="idtransPB" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $idPB;?>" style="display:none;">
                    <label for="idtransPB">ID Transaksi</label>
                  </div>
                </div>
                <div class="row">
                    <script>
                    function cmbidbrg3() {
                    var a = document.getElementById("idbrg_trpb_cmb").value;
                    document.getElementById("idbrg_trpb").value = a.substr(0,7);
                    document.getElementById("hargaPembelian").value = a.substr(7,6);
                    document.getElementById("stokPembelian").value = a.substr(13,2);
                    }
                    function totalhargaitem3() {
                    var b = document.getElementById("hargaPembelian").value;
                    var c = document.getElementById("jmlPembelian").value;
                    document.getElementById("totalPembelian").value = b * c;
                    }
                    </script>
                    <div class="column"><div class="form-label-group">
                    <input type="text" id="idbrg_trpb" name="idbrg_trpb" class="form-control" placeholder="ID barang" required="required" autofocus="autofocus">
                    <label for="idbrg_trpb">ID barang</label>
                    </div></div>
                    <?php
                        $query1 = mysqli_query($koneksi,"SELECT * FROM produk");
                    ?>
                    <div class="column"><select id="idbrg_trpb_cmb" name="idbrg_trpb_cmb" class="form-control" required="required" autofocus="autofocus" onchange="cmbidbrg3()">
                    <option selected>--- Pilih satu barang ---</option>
                    <?php while($data1 = mysqli_fetch_array($query1)){?>
                    <option value="<?php echo $data1[0],$data1[2],$data1[5];?>"><?php echo $data1['nama_brg'];?></option>
                    <?php }?>
                    </select></div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargaPembelian" name="hargaPembelian" class="form-control" placeholder="Harga" required="required" autofocus="autofocus">
                    <label for="hargaPembelian">Harga</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="stokPembelian" name="stokPembelian" class="form-control" placeholder="Stok" required="required" autofocus="autofocus">
                    <label for="stokPembelian">Stok</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jmlPembelian" name="jmlPembelian" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" onchange="totalhargaitem3()" onclick="totalhargaitem3()">
                    <label for="jmlPembelian">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="totalPembelian" name="totalPembelian" class="form-control" placeholder="Total" required="required" autofocus="autofocus">
                    <label for="totalPembelian">Total</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="date" id="tglPembelian" name="tglPembelian" class="form-control" placeholder="Tanggal" required="required" autofocus="autofocus" value="<?php echo date("Y-m-d");?>">
                    <label for="tglPembelian">Tanggal</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="additemPB" value="Tambah">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Input Penjualan Form Modal-->
    <div class="modal fade" id="inputpenjualanfrmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Tambah item</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-item-penjualan-form.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="idtransPJ2" name="idtransPJ2" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $id;?>" style="display:none;">
                    <label for="idtransPJ2">ID Transaksi</label>
                  </div>
                </div>
                <div class="row">
                    <script>
                    function cmbidbrg2() {
                    var a = document.getElementById("idbrg_trpj_cmb2").value;
                    document.getElementById("idbrg_trpj2").value = a.substr(0,7);
                    document.getElementById("hargaPenjualan2").value = a.substr(7,6);
                    document.getElementById("stokPenjualan2").value = a.substr(13,2);
                    }
                    function totalhargaitem2() {
                    var b = document.getElementById("hargaPenjualan2").value;
                    var c = document.getElementById("jmlPenjualan2").value;
                    document.getElementById("totalPenjualan2").value = b * c;
                    }
                    </script>
                    <div class="column"><div class="form-label-group">
                    <input type="text" id="idbrg_trpj2" name="idbrg_trpj2" class="form-control" placeholder="ID barang" required="required" autofocus="autofocus">
                    <label for="idbrg_trpj2">ID barang</label>
                    </div></div>
                    <?php
                        $query2 = mysqli_query($koneksi,"SELECT * FROM produk");
                    ?>
                    <div class="column"><select id="idbrg_trpj_cmb2" name="idbrg_trpj_cmb2" class="form-control" required="required" autofocus="autofocus" onchange="cmbidbrg2()">
                    <option selected>--- Pilih satu barang ---</option>
                    <?php while($data2 = mysqli_fetch_array($query2)){?>
                    <option value="<?php echo $data2[0],$data2[3],$data2[5];?>"><?php echo $data2['nama_brg'];?></option>
                    <?php }?>
                    </select></div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargaPenjualan2" name="hargaPenjualan2" class="form-control" placeholder="Harga" required="required" autofocus="autofocus">
                    <label for="hargaPenjualan2">Harga</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="stokPenjualan2" name="stokPenjualan2" class="form-control" placeholder="Stok" required="required" autofocus="autofocus">
                    <label for="stokPenjualan2">Stok</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jmlPenjualan2" name="jmlPenjualan2" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" onchange="totalhargaitem2()" onclick="totalhargaitem2()">
                    <label for="jmlPenjualan2">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="totalPenjualan2" name="totalPenjualan2" class="form-control" placeholder="Total" required="required" autofocus="autofocus">
                    <label for="totalPenjualan2">Total</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="date" id="tglPenjualan2" name="tglPenjualan2" class="form-control" placeholder="Tanggal" required="required" autofocus="autofocus" value="<?php echo date("Y-m-d");?>">
                    <label for="tglPenjualan2">Tanggal</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="additemPJ2" value="Tambah">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Input Pembelian Form Modal-->
    <div class="modal fade" id="inputpembelianfrmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Tambah item</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-item-pembelian.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="idtransPB2" name="idtransPB2" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $idPB;?>" style="display:none;">
                    <label for="idtransPB2">ID Transaksi</label>
                  </div>
                </div>
                <div class="row">
                    <script>
                    function cmbidbrg4() {
                    var a = document.getElementById("idbrg_trpb_cmb2").value;
                    document.getElementById("idbrg_trpb2").value = a.substr(0,7);
                    document.getElementById("hargaPembelian2").value = a.substr(7,6);
                    document.getElementById("stokPembelian2").value = a.substr(13,2);
                    }
                    function totalhargaitem4() {
                    var b = document.getElementById("hargaPembelian2").value;
                    var c = document.getElementById("jmlPembelian2").value;
                    document.getElementById("totalPembelian2").value = b * c;
                    }
                    </script>
                    <div class="column"><div class="form-label-group">
                    <input type="text" id="idbrg_trpb2" name="idbrg_trpb2" class="form-control" placeholder="ID barang" required="required" autofocus="autofocus">
                    <label for="idbrg_trpb2">ID barang</label>
                    </div></div>
                    <?php
                        $query1 = mysqli_query($koneksi,"SELECT * FROM produk");
                    ?>
                    <div class="column"><select id="idbrg_trpb_cmb2" name="idbrg_trpb_cmb2" class="form-control" required="required" autofocus="autofocus" onchange="cmbidbrg4()">
                    <option selected>--- Pilih satu barang ---</option>
                    <?php while($data1 = mysqli_fetch_array($query1)){?>
                    <option value="<?php echo $data1[0],$data1[2],$data1[5];?>"><?php echo $data1['nama_brg'];?></option>
                    <?php }?>
                    </select></div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="hargaPembelian2" name="hargaPembelian2" class="form-control" placeholder="Harga" required="required" autofocus="autofocus">
                    <label for="hargaPembelian2">Harga</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="stokPembelian2" name="stokPembelian2" class="form-control" placeholder="Stok" required="required" autofocus="autofocus">
                    <label for="stokPembelian2">Stok</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jmlPembelian2" name="jmlPembelian2" class="form-control" placeholder="Jumlah" required="required" autofocus="autofocus" onchange="totalhargaitem4()" onclick="totalhargaitem4()">
                    <label for="jmlPembelian2">Jumlah</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="totalPembelian2" name="totalPembelian2" class="form-control" placeholder="Total" required="required" autofocus="autofocus">
                    <label for="totalPembelian2">Total</label>
                  </div>
                </div>
                <div class="form-group" style="display:none;">
                  <div class="form-label-group">
                    <input type="date" id="tglPembelian2" name="tglPembelian2" class="form-control" placeholder="Tanggal" required="required" autofocus="autofocus" value="<?php echo date("Y-m-d");?>">
                    <label for="tglPembelian2">Tanggal</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="additemPB" value="Tambah">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Input Hutang Customer Modal-->
    <div class="modal fade" id="inputhtgcustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Input Hutang Customer</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="idtransPJ22" name="idtransPJ22" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $id;?>" style="display:none;">
                    <label for="idtransPJ22">ID Transaksi</label>
                  </div>
                </div>
                    <script type="text/javascript">
                    function cmbcustomerhtg() {
                    var a = document.getElementById("idcustomerhtgcmb").value;
                    document.getElementById("idcustomerhtg").value = a;
                    }
                    function totalhutang() {
                    var b = document.getElementById("totalHargaHTG").value;
                    var c = document.getElementById("bayarcustom2").value;
                    var d = document.getElementById("hutangcustom");
                    document.getElementById("bayarcustom").value = b;
                    document.getElementById("hutangcustom").value = b - c;
                    if(d.value < 0){
                        document.getElementById("hutangcustom").value = c - b;
                    }
                    }
                    </script>
                    <div class="form-group"><div class="form-label-group">
                    <input type="text" id="idcustomerhtg" name="idcustomerhtg" class="form-control" placeholder="ID Customer" required="required" autofocus="autofocus" style="display:none;">
                    <label for="idcustomerhtg">ID Customer</label>
                    </div></div>
                    <?php
                        $query3 = mysqli_query($koneksi,"SELECT * FROM customer");
                    ?>
                    <div class="form-group">
                    <div class="form-label-group">
                    <select id="idcustomerhtgcmb" name="idcustomerhtgcmb" class="form-control" required="required" autofocus="autofocus" onchange="cmbcustomerhtg()">
                    <option selected>--- Pilih customer ---</option>
                    <?php while($data3 = mysqli_fetch_array($query3)){?>
                    <option value="<?php echo $data3['id_customer'];?>"><?php echo $data3['nm_customer'];?></option>
                    <?php }?>
                    </select>
                    </div>
                    </div>
                    <?php
                    $qtotalharga2 = mysqli_query($koneksi,"SELECT SUM(dt_penjualan.harga_total) AS TotalHargaItem FROM dt_penjualan WHERE id_pj='$id'");
                    if($qtotalharga2){
                    $tharga2 = mysqli_fetch_array($qtotalharga2)
                    ?>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="totalHargaHTG" name="totalHargaHTG" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="<?php echo $tharga2['TotalHargaItem'];?>">
                    <?php }?>
                    <label for="totalHargaHTG">Total</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" style="display:none;" id="bayarcustom" name="bayarcustom" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus">
                    <label for="bayarcustom">Bayar</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="bayarcustom2" name="bayarcustom2" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" onchange="totalhutang()" onclick="totalhutang()">
                    <label for="bayarcustom2">Bayar</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="hutangcustom" name="hutangcustom" class="form-control" placeholder="Kurang" required="required" autofocus="autofocus">
                    <label for="hutangcustom">Kurang</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <textarea id="ketcustom" name="ketcustom" class="form-control" placeholder="Keterangan" required="required" autofocus="autofocus"></textarea>
                    </div>
                    </div>
                <input class="btn btn-primary btn-block" type="submit" name="kirimcustomer" value="Kirim">
          </form>
        </div>
          </div>
          <div class="modal-footer" style="display:none;">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Input Hutang Toko Modal-->
    <div class="modal fade" id="inputhtgtokoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Input Hutang</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="idtransPB22" name="idtransPB22" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $id;?>" style="display:none;">
                    <label for="idtransPB22">ID Transaksi</label>
                  </div>
                </div>
                    <script type="text/javascript">
                    function cmbsaleshtg() {
                    var a = document.getElementById("idsaleshtgcmb").value;
                    document.getElementById("idsaleshtg").value = a;
                    }
                    function totalhutang2() {
                    var b = document.getElementById("totalHTGHarga").value;
                    var c = document.getElementById("bayarsales2").value;
                    var d = document.getElementById("hutangsales");
                    document.getElementById("bayarsales").value = b;
                    document.getElementById("hutangsales").value = b - c;
                    if(d.value < 0){
                        document.getElementById("hutangcustom").value = c - b;
                    }
                    }
                    </script>
                    <div class="form-group"><div class="form-label-group">
                    <input type="text" id="idsaleshtg" name="idsaleshtg" class="form-control" placeholder="ID Customer" required="required" autofocus="autofocus" style="display:none;">
                    <label for="idsaleshtg">ID Sales</label>
                    </div></div>
                    <?php
                        $query3 = mysqli_query($koneksi,"SELECT * FROM sales");
                    ?>
                    <div class="form-group">
                    <div class="form-label-group">
                    <select id="idsaleshtgcmb" name="idsaleshtgcmb" class="form-control" required="required" autofocus="autofocus" onchange="cmbsaleshtg()">
                    <option selected>--- Pilih customer ---</option>
                    <?php while($data3 = mysqli_fetch_array($query3)){?>
                    <option value="<?php echo $data3['id_sales'];?>"><?php echo $data3['nm_sales'];?></option>
                    <?php }?>
                    </select>
                    </div>
                    </div>
                    <?php
                    $qtotalharga2 = mysqli_query($koneksi,"SELECT SUM(dt_pembelian.harga_total) AS TotalHargaItem FROM dt_pembelian WHERE id_pb='$id'");
                    if($qtotalharga2){
                    $tharga2 = mysqli_fetch_array($qtotalharga2)
                    ?>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="totalHTGHarga" name="totalHTGHarga" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="<?php echo $tharga2['TotalHargaItem'];?>">
                    <?php }?>
                    <label for="totalHTGHarga">Total</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" style="display:none;" id="bayarsales" name="bayarsales" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus">
                    <label for="bayarsales">Bayar</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="bayarsales2" name="bayarsales2" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" onchange="totalhutang2()" onclick="totalhutang2()">
                    <label for="bayarsales2">Bayar</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <input type="text" id="hutangsales" name="hutangsales" class="form-control" placeholder="Kurang" required="required" autofocus="autofocus">
                    <label for="hutangsales">Kurang</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="form-label-group">
                    <textarea id="ketsales" name="ketsales" class="form-control" placeholder="Keterangan" required="required" autofocus="autofocus"></textarea>
                    </div>
                    </div>
                <input class="btn btn-primary btn-block" type="submit" name="kirimsales" value="Kirim">
          </form>
        </div>
          </div>
          <div class="modal-footer" style="display:none;">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Input Pengeluaran Modal-->
    <div class="modal fade" id="inputpengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Input Pengeluaran</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-pengeluaran.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="jmlPengeluaran" name="jmlPengeluaran" class="form-control" placeholder="Jumlah Pengeluaran" required="required" autofocus="autofocus">
                    <label for="jmlPengeluaran">Jumlah Pengeluaran</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" required="required"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="date" id="tglPengeluaran" name="tglPengeluaran" class="form-control" placeholder="Tanggal" required="required" autofocus="autofocus" value="<?php echo date("Y-m-d");?>">
                    <label for="tglPengeluaran">Tanggal</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Kirim">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Input Customer Modal-->
    <div class="modal fade" id="inputcustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Input Data Customer</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-customer.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="nmCustomer" name="nmCustomer" class="form-control" placeholder="Nama Customer" required="required" autofocus="autofocus">
                    <label for="nmCustomer">Nama Customer</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="noteleponCustomer" name="noteleponCustomer" class="form-control" placeholder="No telepon" required="required" autofocus="autofocus">
                    <label for="noteleponCustomer">No telepon</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <textarea id="alamatCustomer" name="alamatCustomer" class="form-control" placeholder="Alamat" required="required"></textarea>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Kirim">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Input Sales Modal-->
    <div class="modal fade" id="inputsalesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header black-bg">
            <h5 class="modal-title" id="exampleModalLabel">Input Data Sales</h5>
            <button class="close white" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
        <div class="card-body">
          <form action="act/add-sales.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="nmSales" name="nmSales" class="form-control" placeholder="Nama Sales" required="required" autofocus="autofocus">
                    <label for="nmSales">Nama Sales</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="nmSalesprsh" name="nmSalesprsh" class="form-control" placeholder="Perusahaan" required="required" autofocus="autofocus">
                    <label for="nmSalesprsh">Perusahaan</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <textarea id="alamatSales" name="alamatSales" class="form-control" placeholder="Alamat perusahaan" required="required"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="noteleponSales" name="noteleponSales" class="form-control" placeholder="No telepon" required="required" autofocus="autofocus">
                    <label for="noteleponSales">No telepon</label>
                  </div>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Kirim">
          </form>
        </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="#" data-dismiss="modal">Batal</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Kontak Modal-->
    <div class="modal fade" id="kontakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilihan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih kontak customer atau sales</div>
          <div class="modal-footer">
            <a class="btn btn-secondary" href="beranda/kontak_customer">Customer</a>
            <a class="btn btn-secondary" href="beranda/kontak_sales">Sales</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Anda yakin ingin keluar?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="act/cek-logout.php">Keluar</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Laporan Modal-->
    <div class="modal fade" id="laporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilihan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih laporan</div>
          <div class="modal-footer">
            <a class="btn btn-success" href="?hal=laporan-penjualan">Penjualan</a>
            <a class="btn btn-primary" href="beranda/laporan_pembelian">Pembelian</a>
          </div>
        </div>
      </div>
    </div>