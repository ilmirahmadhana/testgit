        <link rel="icon" type="image/png" href="images/icons/list-50.png"/>

        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript: goBack()">Transaksi Penjualan</a>
            </li>
            <li class="breadcrumb-item active">List Transaksi</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List Transaksi Pembelian</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Transaksi</th>
                      <th>Tanggal Transaksi</th>
                      <th>Total</th>
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
                        $query = mysqli_query($koneksi,"SELECT * FROM transaksi_pb");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td><?php echo $data['id_pb'];?></td>
                      <td><?php echo date("d-m-Y", strtotime($data['tgl']));?></td>
                      <td>Rp. <?php echo number_format($data['total_harga']);?></td>
                    </tr>
                      <?php $autonum++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Diupdate kemarin pada jam 11:59 PM</div>
          </div>
        <!-- /.container-fluid -->
