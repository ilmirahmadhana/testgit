        
<?php 
    require("koneksi.php");
    $tgl = date('m');
?>
        <title>Cetak Laporan Penjualan</title>
          <!-- DataTables Example -->
              <a style="border-radius:5px;padding:0px 5px 0px 5px;font-size:25px;color:black;text-decoration:none;display:block;border:2px solid #333;position:absolute;top:10;right:10;" href="beranda.php?hal=beranda">Beranda</a>
              <h1 style="text-align:center; font-family:'Times New Roman';">LAPORAN PENJUALAN</h1>
                <form method="post">
                <div style="float:right;margin-bottom:10px;">
                <select name="bulan">
                    <option value="<?php echo $tgl;?>">---Pilih bulan---</option>
                    <option value="-01-">Januari</option>
                    <option value="-02-">Februari</option>
                    <option value="-03-">Maret</option>
                    <option value="-04-">April</option>
                    <option value="-05-">Mei</option>
                    <option value="-06-">Juni</option>
                    <option value="-07-">Juli</option>
                    <option value="-08-">Agustus</option>
                    <option value="-09-">September</option>
                    <option value="-10-">Oktober</option>
                    <option value="-11-">November</option>
                    <option value="-12-">Desember</option>
                </select>
                <input type="submit" name="pilih" value="Pilih">
                </div>
                </form>
                <table border="1px" width="100%" cellspacing="0">
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
                        if(isset($_POST['pilih'])){
                            $bulan = $_POST['bulan'];
                            $query = mysqli_query($koneksi,"SELECT * FROM transaksi_pj WHERE tgl like '%$bulan%' AND bayar > total_harga");
                        }else{
                            $query = mysqli_query($koneksi,"SELECT * FROM transaksi_pj WHERE bayar > total_harga");
                        }
                        while($data = mysqli_fetch_array($query)){
                      ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $autonum;?></td>
                      <td style="text-align:center;"><?php echo $data['id_pj'];?></td>
                      <td style="text-align:center;"><?php echo date("d-m-Y", strtotime($data['tgl']));?></td>
                      <td style="text-align:center;">Rp. <?php echo number_format($data['total_harga']);?></td>
                    </tr>
                      <?php $autonum++; } ?>
                  </tbody>
                </table>
            <a style="border-radius:5px;padding:0px 5px 0px 5px;font-size:25px;color:black;text-decoration:none;display:block;border:2px solid #333;position:absolute;bottom:10;right:10;" href="" onclick="window.print()">Cetak</a>
        <!-- /.container-fluid -->
