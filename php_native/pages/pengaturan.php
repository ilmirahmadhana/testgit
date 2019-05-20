        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="?hal=beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Pengaturan</li>
          </ol>

        <div class="row">
            <div class="column" style="padding-left:20px;">
                <img src="images/icons/user.png">
                <?php
                    $sesi = $_SESSION['username'];
                    $query = mysqli_query($koneksi,"SELECT user.id_user, user.username, user.grup, grup.id_grup, grup.nama_grup FROM user INNER JOIN grup ON grup.id_grup = user.grup WHERE user.username = '$sesi'");
                    $data = mysqli_fetch_array($query);
                    if($data){
                ?>
                <table style="float:right;margin-right:400px;">
                    <tr><th style="font-size:25px;">Info Akun</th></tr>
                    <tr>
                    <td>Nama : <?php echo $data['username'];?></td>
                    </tr>
                    <tr><td>Status : <?php echo $data['nama_grup'];?></td></tr>
                </table>
            </div>
            <?php
            if($data['nama_grup'] == "user"){
            ?>
            <div class="column" style="padding-left:20px;<?php echo "display:none;"?>">
        <div class="card-header">Buat Akun Baru</div>
        <div class="card-body">
          <form action="../act/add-user.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="user" name="user" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                    <label for="user">Username</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                    <label for="pass">Password</label>
                  </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                    Role : 
                    <select name="statsrole">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                </div>
                
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" name="submit" value="Buat">
                </div>
          </form>
        </div>
            </div>
            <?php
                }else{
            ?>
            <div class="column" style="padding-left:20px;">
        <div class="card-header">Buat Akun Baru</div>
        <div class="card-body">
          <form action="../act/add-user.php" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="user" name="user" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                    <label for="user">Username</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                    <label for="pass">Password</label>
                  </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                    Role : 
                    <select name="statsrole">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                </div>
                
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" name="submit" value="Buat">
                </div>
          </form>
        </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <!-- /.container-fluid -->
