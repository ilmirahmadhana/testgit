          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Hutang</li>
          </ol>

         <link rel="icon" type="image/png" href="<?php echo base_url('/assets/images/icons/produk-50.png');?>"/>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Hutang Toko(pada sales/supplier)</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jumlah Hutang</th>
                      <th>Jatuh Tempo</th>
                      <th>Keterangan</th>
                      <th style="text-align:center;">Aksi</th>
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
                  <body>
                      <?php
                        $autonum = 1;
                        $query = mysqli_query($koneksi,"SELECT * FROM hutang WHERE jml_hutang > 0");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td>Rp. <?php echo number_format($data['jml_hutang']);?></td>
                      <td><?php echo date("d-m-Y", strtotime($data['tgl_jthtempo']));?></td>
                      <td><?php echo $data['ket'];?></td>
                      <td style="text-align:center;"><a href="pages/bayar-hutang-sales.php?id=<?php echo $data['id_hutang'];?>">Bayar</a></td>
                    </tr>
                      <?php $autonum++; } ?>
                  </body>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Diupdate kemarin pada jam 11:59 PM</div>
          </div>
        <!-- /.container-fluid -->
