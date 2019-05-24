        <link rel="icon" type="image/png" href="images/icons/laporan-50.png"/>

          <!-- DataTables Example -->
            <a class="fa fa-home" style="float:right;font-size:50px;color:black;text-decoration:none;" href="beranda.php?hal=beranda"></a>
            <div class="card-body">
              <h2 style="text-align:center; font-family:'Times New Roman';">LAPORAN PEMBELIAN</h2>
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
                        $query = mysqli_query($koneksi,"SELECT * FROM transaksi_pb WHERE bayar > total_harga");
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
            <a class="fa fa-print" style="float:right;font-size:50px;color:black;text-decoration:none;" href="laporan-pembelian-cetak.php"></a>
        <!-- /.container-fluid -->
