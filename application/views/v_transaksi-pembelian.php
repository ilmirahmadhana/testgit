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

        <link rel="icon" type="image/png" href="<?php echo base_url('/assets/images/icons/transaksi-50.png');?>"/>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Form Transaksi Pembelian</div>
            <form action="" method="post">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group" style="max-width:200px;">
                <?php
                $tgl = date("Y-m-d");
                $querypb = "SELECT max(id_pb) as maxIDpb FROM transaksi_pb";
                $has = mysqli_query($koneksi,$querypb);
                $dat = mysqli_fetch_array($has);
                $idPB = $dat['maxIDpb'];
                $trj = "TRB";
                $noUrut = (int) substr($idPB, 3, 7);
                $noUrut++;
                $idPB = $trj . sprintf("%04s", $noUrut);
                ?>
                <div class="form-label-group">
                    <input type="text" id="idtranspb" name="idtranspb" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $idPB;?>">
                    <label for="idtranspb">ID Transaksi</label>
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
                        $query = mysqli_query($koneksi,"SELECT dt_pembelian.id_dt_pb, dt_pembelian.jml_brg, dt_pembelian.id_pb, dt_pembelian.harga_total, produk.id_brg, produk.nama_brg FROM dt_pembelian INNER JOIN produk ON dt_pembelian.id_brg = produk.id_brg WHERE dt_pembelian.id_pb='$idPB'");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td><?php echo $data['nama_brg'];?></td>
                      <td><?php echo $data['jml_brg'];?></td>
                      <td><?php echo $data['harga_total'];?></td>
                      <td style="text-align:center;"><a href="pages/edit-item-penjualan.php?id=<?php echo $data['id_dt_pj'];?>">Edit</a></td>
                      <td style="text-align:center;"><a href="act/delete-item-penjualan.php?id=<?php echo $data['id_dt_pj'];?>" class="" onclick="return  confirm('Anda yakin ingin hapus item?')">Hapus</a></td>
                    </tr>
                      <?php $autonum++; } ?>
                      <a href="#" data-toggle="modal" data-target="#inputpembelianModal" style="padding-left:10px;float:right;"><span class="fas fa-plus"></span></a>
                  </tbody>
                </table>
              </div>  
            </div>
            <?php 
                $qtotalharga = mysqli_query($koneksi,"SELECT SUM(dt_pembelian.harga_total) AS TotalHargaItem FROM dt_pembelian WHERE id_pb='$idPB'");
            ?>
            <script>
            function bayar(){
                var a = document.getElementById("totalHarga").value;
                var b = document.getElementById("bayarPB").value;
                document.getElementById("kembaliPB").value = b - a;
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
                <input type="text" id="bayarPB" name="bayarPB" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" onchange="bayar()" onclick="bayar()">
                <label for="bayarPB">Bayar</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="kembaliPB" name="kembaliPB" class="form-control" placeholder="Hutang" required="required" autofocus="autofocus">
                <label for="kembaliPB">Hutang</label>
            </div>
            </div>
            <div class="card-footer">
            <input type="submit" class="btn btn-primary" name="selesaiPJ" value="Selesai" style="float:right;margin:0px 10px 10px 0px;">
            <a class="btn btn-danger" href="beranda.php?hal=beranda" style="float:right;margin:0px 10px 10px 0px;" onclick="return  confirm('Anda yakin ingin batalkan transaksi?')">Batal</a>
            </div>
            </form>
          </div>
        <!-- /.container-fluid -->