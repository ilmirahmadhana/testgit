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

        <link rel="icon" type="image/png" href="<?php echo base_url('/assets/images/icons/transaksi-50.png');?>"/>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Form Transaksi Penjualan</div>
            <form action="" method="post">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group" style="max-width:200px;">
                <?php
                $tgl = date("Y-m-d");
                $querypj = "SELECT max(id_pj) as maxIDpj FROM transaksi_pj";
                $has = mysqli_query($koneksi,$querypj);
                $dat = mysqli_fetch_array($has);
                $idPJ = $dat['maxIDpj'];
                $trj = "TRJ";
                $noUrut = (int) substr($idPJ, 3, 7);
                $noUrut++;
                $idPJ = $trj . sprintf("%04s", $noUrut);
                ?>
                <div class="form-label-group">
                    <input type="text" id="idtranspj" name="idtranspj" class="form-control" placeholder="ID Transaksi" required="required" autofocus="autofocus" value="<?php echo $idPJ;?>">
                    <label for="idtranspj">ID Transaksi</label>
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
                        $query = mysqli_query($koneksi,"SELECT dt_penjualan.id_dt_pj, dt_penjualan.jml_brg, dt_penjualan.id_pj, dt_penjualan.harga_total, produk.id_brg, produk.nama_brg FROM dt_penjualan INNER JOIN produk ON dt_penjualan.id_brg = produk.id_brg WHERE dt_penjualan.id_pj='$idPJ'");
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
                      <a href="#" data-toggle="modal" data-target="#inputpenjualanModal" style="padding-left:10px;float:right;"><span class="fas fa-plus"></span></a>
                  </tbody>
                </table>
              </div>  
            </div>
            <?php 
                $qtotalharga = mysqli_query($koneksi,"SELECT SUM(dt_penjualan.harga_total) AS TotalHargaItem FROM dt_penjualan WHERE id_pj='$idPJ'");
            ?>
            <script>
            function bayar(){
                var a = document.getElementById("totalHarga").value;
                var b = document.getElementById("bayarPJ").value;
                document.getElementById("kembaliPJ").value = b - a;
            }
            
            </script>
            <div class="modal-footer">
            <?php
                if($qtotalharga){
                    $tharga = mysqli_fetch_array($qtotalharga)
            ?>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="totalHarga" name="totalHarga" class="form-control" placeholder="Total" required="required" autofocus="autofocus" value="<?php echo $tharga['TotalHargaItem'];?>">
                <?php }?>
                <label for="totalHarga">Total</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="bayarPJ" name="bayarPJ" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" onchange="bayar()" onclick="bayar()">
                <label for="bayarPJ">Bayar</label>
            </div>
            <div class="form-label-group" style="max-width:200px;float:right;">
                <input type="text" id="kembaliPJ" name="kembaliPJ" class="form-control" placeholder="Kembali" required="required" autofocus="autofocus">
                <label for="kembaliPJ">Kembali</label>
            </div>
            </div>
            <div class="card-footer">
            <input type="submit" class="btn btn-primary" name="selesaiPJ" value="Selesai" style="float:right;margin:0px 10px 10px 0px;">
            <a class="btn btn-danger" href="beranda.php?hal=beranda" style="float:right;margin:0px 10px 10px 0px;" onclick="return  confirm('Anda yakin ingin batalkan transaksi?')">Batal</a>
            </div>
            </form>
          </div>
        <!-- /.container-fluid -->