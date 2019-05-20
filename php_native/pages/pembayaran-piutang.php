          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Pembayaran</li>
          </ol>

        <link rel="icon" type="image/png" href="images/icons/pembayaran-50.png"/>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Pembayaran Piutang</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
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
                  <tbody>
                      <?php
                        $autonum = 1;
                        $query = mysqli_query($koneksi,"SELECT piutang.id_piutang,piutang.jml_hutang,piutang.tgl_jthtempo,piutang.ket,transaksi_pj.id_customer,customer.nm_customer FROM piutang INNER JOIN transaksi_pj ON piutang.id_piutang = transaksi_pj.id_piutang INNER JOIN customer ON transaksi_pj.id_customer = customer.id_customer WHERE jml_hutang > 0");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td><?php echo $data['nm_customer'];?></td>
                      <td>Rp. <?php echo number_format($data['jml_hutang']);?></td>
                      <td><?php echo date("d-m-Y", strtotime($data['tgl_jthtempo']));?></td>
                      <td><?php echo $data['ket'];?></td>
                      <td style="text-align:center;"><a href="pages/bayar-hutang-customer.php?id=<?php echo $data['id_piutang'];?>&idcustomer=<?php echo $data['id_customer'];?>">Bayar</a></td>
                    </tr>
                      <?php $autonum++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Diupdate kemarin pada jam 11:59 PM</div>
          </div>
        <!-- /.container-fluid -->
