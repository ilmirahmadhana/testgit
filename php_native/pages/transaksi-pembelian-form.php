          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Transaksi Pembelian</li>
            <li class="breadcrumb-item">
              <a href="?hal=list-transaksi-pembelian">List Transaksi</a>
            </li>
          </ol>

        <link rel="icon" type="image/png" href="images/icons/transaksi-50.png"/>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Form Transaksi Pembelian | Toko <a href="#" data-toggle="modal" data-target="#inputhtgtokoModal">berhutang?</a></div>
            <form action="" method="post">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group" style="max-width:200px;">
                <?php
                $tgl = date("Y-m-d");
                $id = $_GET['id'];
                $queryht = "SELECT max(id_hutang) as maxIDht FROM hutang";
                $has = mysqli_query($koneksi,$queryht);
                $dat = mysqli_fetch_array($has);
                $idHT = $dat['maxIDht'];
                $noUrut = (int) substr($idHT, 0, 3);
                $noUrut++;
                ?>
                <div class="form-label-group">
                    <input type="text" id="idtranspb2" name="idtranspb2" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $id;?>">
                    <label for="idtranspb2">ID Transaksi</label>
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
                        $query = mysqli_query($koneksi,"SELECT dt_pembelian.id_dt_pb, dt_pembelian.jml_brg, dt_pembelian.id_pb, dt_pembelian.harga_total, produk.id_brg, produk.nama_brg FROM dt_pembelian INNER JOIN produk ON dt_pembelian.id_brg = produk.id_brg WHERE dt_pembelian.id_pb='$id'");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td><?php echo $data['nama_brg'];?></td>
                      <td><?php echo $data['jml_brg'];?></td>
                      <td><?php echo $data['harga_total'];?></td>
                      <td style="text-align:center;"><a href="pages/edit-item-pembelian.php?id=<?php echo $data['id_dt_pb'];?>&idpb=<?php echo $id;?>">Edit</a></td>
                      <td style="text-align:center;"><a href="act/delete-item-pembelian.php?id=<?php echo $data['id_dt_pb'];?>&idpb=<?php echo $id;?>" class="" onclick="return  confirm('Anda yakin ingin hapus item?')">Hapus</a></td>
                    </tr>
                      <?php $autonum++; } ?>
                      <a href="#" data-toggle="modal" data-target="#inputpembelianfrmModal" style="padding-left:10px;float:right;"><span class="fas fa-plus"></span></a>
                  </tbody>
                </table>
              </div>  
            </div>
            <?php 
                $qtotalharga = mysqli_query($koneksi,"SELECT SUM(dt_pembelian.harga_total) AS TotalHargaItem FROM dt_pembelian WHERE id_pb='$id'");
            ?>
            <script>
            function bayar(){
                var a = document.getElementById("totalHargaPB").value;
                var b = document.getElementById("bayarPB").value;
                document.getElementById("kembaliPB").value = b - a;
                var d = document.getElementById("kembaliPB").value;
                if(d < 0){
                    var d = document.getElementById("kembaliPB").value = 0;
                }
            }
            function cmbsalespilih(){
                var c = document.getElementById("cmbSales").value;
                document.getElementById("txtidSales").value = c;
            }
            </script>
            <div class="modal-footer">
            <?php
                if($qtotalharga){
                    $tharga = mysqli_fetch_array($qtotalharga)
            ?>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="totalHargaPB" name="totalHargaPB" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="<?php echo $tharga['TotalHargaItem'];?>">
                <?php }?>
                <label for="totalHargaPB">Total</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="bayarPB" name="bayarPB" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" onchange="bayar()" onclick="bayar()" value="0">
                <label for="bayarPB">Bayar</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="kembaliPB" name="kembaliPB" class="form-control" placeholder="Kembali" required="required" autofocus="autofocus">
                <label for="kembaliPB">Kembali</label>
            </div>
            </div>
            <div class="card-footer">
            <input type="submit" class="btn btn-primary" name="selesaiPB" value="Selesai" style="float:right;margin:0px 10px 10px 0px;">
            <input type="submit" class="btn btn-danger" name="batalPB" value="Batal" style="float:right;margin:0px 10px 10px 0px;" onclick="return  confirm('Anda yakin ingin batalkan transaksi?')">
            </div>
            </form>
          </div>
        <!-- /.container-fluid -->

<?php
    if(isset($_POST['batalPB'])){
    $idpb = $_POST['idtranspb2'];

    //show modal success
    $message = "Transaksi Pembelian dibatalkan.";
    echo "<script type='text/javascript'>alert('$message');
            window.location.href='beranda.php?hal=beranda'</script>";
    $query1 = mysqli_query($koneksi,"UPDATE produk JOIN dt_pembelian ON produk.id_brg = dt_pembelian.id_brg SET produk.stok = produk.stok - dt_pembelian.jml_brg WHERE dt_pembelian.id_pb = '$id'");
    $query2 = mysqli_query($koneksi,"DELETE FROM dt_pembelian WHERE id_pb='$idpb'");
    $query3 = mysqli_query($koneksi,"DELETE FROM transaksi_pb WHERE id_pb='$idpb'");
    }

    if(isset($_POST['selesaiPB'])){
    $total = $_POST['totalHargaPB'];
    $bayar = $_POST['bayarPB'];
    $kembali = $_POST['kembaliPB'];

    $querypj1 = mysqli_query($koneksi,"SELECT id_pb FROM transaksi_pb ORDER BY id_pb ASC");

    $querypj2 = mysqli_query($koneksi,"UPDATE transaksi_pb SET total_harga='$total', bayar='$bayar', kembali='$kembali' WHERE id_pb='$id'");

    //show modal success
    $message = "Transaksi Selesai.\\nMembuka Form Transaksi yang baru.";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='beranda.php?hal=transaksi-pembelian'</script>";
    }

    if(isset($_POST['kirimsales'])){
    $idsales = $_POST['idsaleshtg'];
    $total2 = $_POST['totalHTGHarga'];
    $bayar2 = $_POST['bayarsales2'];
    $jmlhtgkami = $_POST['hutangsales'];
    $ket = $_POST['ketsales'];

    $querypb3 = mysqli_query($koneksi,"SELECT id_pb FROM transaksi_pb ORDER BY id_pb ASC");

    $querypb4 = mysqli_query($koneksi,"UPDATE transaksi_pb SET id_sales='$idsales', total_harga='$total2', bayar='$bayar2', id_hutang='$noUrut', kembali=0 WHERE id_pb='$id'");
        
    $querypj5 = mysqli_query($koneksi,"INSERT INTO hutang VALUES( '$noUrut', '$jmlhtgkami', DATE_ADD('$tgl', INTERVAL 1 MONTH), '$ket')");

    //show modal success
    $message = "Transaksi Selesai.\\nMembuka Form Transaksi yang baru.";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='beranda.php?hal=transaksi-pembelian'</script>";
    }
?>