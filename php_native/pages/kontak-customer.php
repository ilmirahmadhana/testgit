        <link rel="icon" type="image/png" href="images/icons/kontak-50.png"/>

        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Kontak</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Kontak Customer</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No telepon</th>
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
                        $query = mysqli_query($koneksi,"SELECT * FROM customer");
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td><?php echo $autonum;?></td>
                      <td><?php echo $data['nm_customer'];?></td>
                      <td><?php echo $data['alamat'];?></td>
                      <td><?php echo $data['no_telepon'];?></td>
                      <td style="text-align:center;"><a href="pages/edit-customer.php?id=<?php echo $data['id_customer'];?>">Edit</a></td>
                      <td style="text-align:center;"><a href="act/delete-customer.php?id=<?php echo $data['id_customer'];?>" onclick="return  confirm('Anda yakin ingin hapus data?')">Hapus</a></td>
                    </tr>
                      <?php $autonum++; } ?>
                      <a href="#" data-toggle="modal" data-target="#inputcustomerModal" style="padding-left:10px;float:right;"><span class="fas fa-plus"></span></a>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Diupdate kemarin pada jam 11:59 PM</div>
          </div>
        <!-- /.container-fluid -->
