          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Transaksi Penjualan</li>
            <li class="breadcrumb-item">
              <a href="?hal=list-transaksi-penjualan">List Transaksi</a>
            </li>
          </ol>

        <link rel="icon" type="image/png" href="images/icons/transaksi-50.png"/> 

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Form Transaksi Penjualan | Customer <a href="#" data-toggle="modal" data-target="#inputhtgcustomerModal">berhutang?</a></div>
            <form action="" method="post">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group" style="max-width:200px;">
                <?php
                $tgl = date("Y-m-d");
                $id = $_GET['id'];
                $querypt = "SELECT max(id_piutang) as maxIDpt FROM piutang";
                $has = mysqli_query($koneksi,$querypt);
                $dat = mysqli_fetch_array($has);
                $idPT = $dat['maxIDpt'];
                $noUrut = (int) substr($idPT, 0, 3);
                $noUrut++;
                ?>
                <div class="form-label-group">
                    <input type="text" id="idtranspj2" name="idtranspj2" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $id;?>">
                    <label for="idtranspj2">ID Transaksi</label>
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
                      <?php
                        $autonum = 1;
                        $query = mysqli_query($koneksi,"SELECT dt_penjualan.id_dt_pj, dt_penjualan.jml_brg, dt_penjualan.id_pj, dt_penjualan.harga_total, produk.id_brg, produk.nama_brg FROM dt_penjualan INNER JOIN produk ON dt_penjualan.id_brg = produk.id_brg WHERE dt_penjualan.id_pj='$id'");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td><?php echo $data['nama_brg'];?></td>
                      <td><?php echo $data['jml_brg'];?></td>
                      <td><?php echo $data['harga_total'];?></td>
                      <td style="text-align:center;"><a href="pages/edit-item-penjualan.php?id=<?php echo $data['id_dt_pj'];?>&idpj=<?php echo $id;?>">Edit</a></td>
                      <td style="text-align:center;"><a href="act/delete-item-penjualan.php?id=<?php echo $data['id_dt_pj'];?>&idpj=<?php echo $id;?>" class="" onclick="return  confirm('Anda yakin ingin hapus item?')">Hapus</a></td>
                    </tr>
                      <?php $autonum++; } ?>
                      <a href="#" data-toggle="modal" data-target="#inputpenjualanfrmModal" style="padding-left:10px;float:right;"><span class="fas fa-plus"></span></a>
                  </tbody>
                </table>
              </div>  
            </div>
            <?php 
                $qtotalharga = mysqli_query($koneksi,"SELECT SUM(dt_penjualan.harga_total) AS TotalHargaItem FROM dt_penjualan WHERE id_pj='$id'");
            ?>
            <script>
            function bayar(){
                var a = document.getElementById("totalHargaPJ").value;
                var b = document.getElementById("bayarPJ").value;
                document.getElementById("kembaliPJ").value = b - a;
                var d = document.getElementById("kembaliPJ").value
                if(d < 0){
                    var d = document.getElementById("kembaliPJ").value = 0;
                }
            }
            function cmbcustomerpilih(){
                var c = document.getElementById("cmbCustomer").value;
                document.getElementById("txtidCustomer").value = c;
            }
            </script>
            <div class="modal-footer">
            <?php
                if($qtotalharga){
                    $tharga = mysqli_fetch_array($qtotalharga)
            ?>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="totalHargaPJ" name="totalHargaPJ" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="<?php echo $tharga['TotalHargaItem'];?>">
                <?php }?>
                <label for="totalHargaPJ">Total</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="bayarPJ" name="bayarPJ" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" onchange="bayar()" onclick="bayar()" value="0">
                <label for="bayarPJ">Bayar</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="kembaliPJ" name="kembaliPJ" class="form-control" placeholder="Kembali" required="required" autofocus="autofocus">
                <label for="kembaliPJ">Kembali</label>
            </div>
            </div>
            <div class="card-footer">
            <input type="submit" class="btn btn-primary" name="selesaiPJ" value="Selesai" style="float:right;margin:0px 10px 10px 0px;">
            <input type="submit" class="btn btn-danger" name="batalPJ" value="Batal" style="float:right;margin:0px 10px 10px 0px;" onclick="return  confirm('Anda yakin ingin batalkan transaksi?')">
            </div>
            </form>
          </div>
        <!-- /.container-fluid -->

<?php
    if(isset($_POST['batalPJ'])){
    $idpj = $_POST['idtranspj2'];

    //show modal success
    $message = "Transaksi Penjualan dibatalkan.";
    echo "<script type='text/javascript'>alert('$message');
            window.location.href='beranda.php?hal=beranda'</script>";
    $query1 = mysqli_query($koneksi,"UPDATE produk JOIN dt_penjualan ON produk.id_brg = dt_penjualan.id_brg SET produk.stok = dt_penjualan.jml_brg + produk.stok WHERE dt_penjualan.id_pj = '$id'");
    $query2 = mysqli_query($koneksi,"DELETE FROM dt_penjualan WHERE id_pj='$idpj'");
    $query3 = mysqli_query($koneksi,"DELETE FROM transaksi_pj WHERE id_pj='$idpj'");
    }

    if(isset($_POST['selesaiPJ'])){
    $total = $_POST['totalHargaPJ'];
    $bayar = $_POST['bayarPJ'];
    $kembali = $_POST['kembaliPJ'];

    $querypj1 = mysqli_query($koneksi,"SELECT id_pj FROM transaksi_pj ORDER BY id_pj ASC");

    $querypj2 = mysqli_query($koneksi,"UPDATE transaksi_pj SET total_harga='$total', bayar='$bayar', kembali='$kembali' WHERE id_pj='$id'");

    //show modal success
    $message = "Transaksi Selesai.\\nMembuka Form Transaksi yang baru.";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='beranda.php?hal=nota-transaksi-penjualan&id=$id'</script>";
    }

    if(isset($_POST['kirimcustomer'])){
    $idcustomer = $_POST['idcustomerhtg'];
    $total2 = $_POST['totalHargaHTG'];
    $bayar2 = $_POST['bayarcustom2'];
    $jmlhtgcustom = $_POST['hutangcustom'];
    $ket = $_POST['ketcustom'];

    $querypj3 = mysqli_query($koneksi,"SELECT id_pj FROM transaksi_pj ORDER BY id_pj ASC");

    $querypj4 = mysqli_query($koneksi,"UPDATE transaksi_pj SET id_customer='$idcustomer', total_harga='$total2', bayar='$bayar2', id_piutang='$noUrut', kembali=0 WHERE id_pj='$id'");
        
    $querypj5 = mysqli_query($koneksi,"INSERT INTO piutang VALUES( '$noUrut', '$jmlhtgcustom', DATE_ADD('$tgl', INTERVAL 1 MONTH), '$ket')");

    //show modal success
    $message = "Transaksi Selesai.\\nMembuka Form Transaksi yang baru.";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='beranda.php?hal=nota-transaksi-penjualan-hutang&id=$id'</script>";
    }
?>