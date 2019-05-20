                  <style type="text/css">
                      @page { size: auto;  margin: 0mm; }
                      .tengah{
                          text-align: justify;
                      }
                  </style>
                  
                  <h2 class="tengah">TOKO CAT STASIUN WARNA</h2>
                  <h5 style="margin-top:-26px;">_________________________________________________</h5>
                  <p style="margin:-4px 0px 0px 0px;">Jl. Mawar, Tegal Rejo, Jemberlor, Patrang, Jember Regency,<br>Jawa Timur 68118</p>
                  <h5 style="margin-top:-14px;">_________________________________________________</h5>
                  <table class="tengah" id="dataTable" width="100%">
                  <tbody>
                    <?php $id = $_GET['id'];?>
                    <?php
                        $query = mysqli_query($koneksi,"SELECT * FROM transaksi_pj,customer,piutang WHERE id_pj='$id'");
                        if($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th style="font-weight:normal;"><a style="font-weight:bold;">Kode : </a><?php echo $data['id_pj'];?></th>
                    </tr>
                    <tr>
                        <th style="font-weight:normal;"><a style="font-weight:bold;">Tanggal : </a><?php echo date("d-m-Y", strtotime($data['tgl']));?></th>
                    </tr>
                    <tr>
                        <th style="font-weight:normal;"><a style="font-weight:bold;">Total : </a>Rp.<?php echo number_format($data['total_harga']);?></th>
                    </tr>
                    <tr>
                        <th style="font-weight:normal;"><a style="font-weight:bold;">Bayar : </a>Rp.<?php echo number_format($data['bayar']);?></th>
                    </tr>
                    <tr>
                        <th style="font-weight:normal;"><a style="font-weight:bold;">Kembali : </a>Rp.<?php echo number_format($data['kembali']);?></th>
                    </tr>
                    <tr>
                    <th>____________________________________________________________</th>
                    </tr>
                    <tr>
                    <th>Barang yang telah dibayar, tidak dapat dikembalikan</th>
                    </tr>
                  </tbody>
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
                  
                </table>
                <script>
                function cetak() {
                    myWindow=window.open('','','width=500,height=800');
                    myWindow.document.write("<h2 style='margin-bottom:-2px;'>TOKO CAT STASIUN WARNA</h2><hr>Jl. Mawar, Tegal Rejo, Jemberlor, Patrang, Jember <br>Regency, Jawa Timur 68118<br><hr><a style='font-weight:bold;'>Kode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<a><?php echo $data['id_pj'];?><br><a style='font-weight:bold;'>Tanggal&nbsp;&nbsp;:&nbsp;<a><?php echo date("d-m-Y", strtotime($data['tgl']));?><br><a style='font-weight:bold;'>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<a>Rp.<?php echo number_format($data['total_harga']);?><br><a style='font-weight:bold;'>Bayar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<a>Rp.<?php echo number_format($data['bayar']);?><br><a style='font-weight:bold;'>Kembali : <a>Rp.<?php echo number_format($data['kembali']);?><hr><a style='font-weight:bold;'>Barang yang telah dibayar, tidak dapat dikembalikan</a>");
                    myWindow.document.close();
                    window.location.href='beranda.php?hal=transaksi-penjualan';
                    myWindow.focus();
                    myWindow.print(); 
                }
                </script>
                <?php } ?>
                <a href="beranda.php?hal=beranda" class="btn btn-secondary" style="margin-top:20px;">Beranda</a>
                <a href="" id="cetak" onclick="cetak()" class="btn btn-primary" style="margin-top:20px;">Cetak</a>
          

        <!-- /.container-fluid -->
