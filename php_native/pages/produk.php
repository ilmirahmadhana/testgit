          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Produk</li>
          </ol>

        <link rel="icon" type="image/png" href="images/icons/produk-50.png"/>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List Produk</div>
            <div class="card-body">
              <div class="table-responsive">
                <?php
                $tgl = date("Y-m-d");
                $querypro = "SELECT max(id_brg) as maxID FROM produk";
                $has = mysqli_query($koneksi,$querypro);
                $dat = mysqli_fetch_array($has);
                $idBRG = $dat['maxID'];
                $brg = "BRG";
                $noUrut = (int) substr($idBRG, 3, 7);
                $noUrut++;
                $idBRG = $brg . sprintf("%04s", $noUrut);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Harga beli</th>
                      <th>Harga jual</th>
                      <th>Jenis</th>
                      <th>Stok</th>
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
                        $query = mysqli_query($koneksi,"SELECT * FROM produk");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td><?php echo $data['nama_brg'];?></td>
                      <td>Rp. <?php echo number_format($data['harga_beli']);?></td>
                      <td>Rp. <?php echo number_format($data['harga_jual']);?></td>
                      <td><?php echo $data['jenis_brg'];?></td>
                      <td><?php echo $data['stok'];?></td>
                      <td style="text-align:center;"><a href="pages/edit-produk.php?id=<?php echo $data['id_brg'];?>">Edit</a></td>
                      <td style="text-align:center;"><a href="act/delete-produk.php?id=<?php echo $data['id_brg'];?>" onclick="return  confirm('Anda yakin ingin hapus data?')">Hapus</a></td>
                    </tr>
                      <?php $autonum++; } ?>
                      <a href="#" data-toggle="modal" data-target="#inputprodukModal" style="padding-left:10px;float:right;"><span class="fas fa-plus"></span></a>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Diupdate kemarin pada jam 11:59 PM</div>
          </div>
        <!-- /.container-fluid -->
