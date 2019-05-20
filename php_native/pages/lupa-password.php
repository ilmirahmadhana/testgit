<!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="?hal=beranda">Beranda</a>
</li>
<li class="breadcrumb-item active">Lupa Password</li>
</ol>

<link rel="icon" type="image/png" href="images/icons/home.png"/>

<!-- Icon Cards-->
<div class="row">
<?php
    require("koneksi.php");
    $sesiuser = $_SESSION['username'];
    $querole = mysqli_query($koneksi,"SELECT user.id_user,user.username,user.grup,grup.id_grup,grup.nama_grup FROM grup INNER JOIN user ON user.grup = grup.id_grup WHERE user.username = '$sesiuser'");
    $datrole = mysqli_fetch_array($querole);
    if($datrole){
        if($datrole['nama_grup'] == "user"){
?>
<div class="form-group" style="margin-left:20px;">
<div class="form-label-group">
<h2>Hubungi Administrator!</h2>
</div>
</div>
<?php 
}else{
$query = mysqli_query($koneksi,"SELECT * FROM user");
?>
<div class="column" style="padding-left:20px;">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                Username : 
                <select id="user" name="user">
                <?php 
                while($data = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $data['id_user'];?>"><?php echo $data['username'];?></option>
                <?php 
                }
                ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password Baru" required="required" autofocus="autofocus">
                <label for="pass">Password Baru</label>
              </div>
            </div>
            <div class="modal-footer">
            <input class="btn btn-primary" type="submit" name="ganti" value="Kirim">
            </div>
        </form>
        </div>
        </div>
<?php
}
} 
?>
</div>
<?php
if(isset($_POST['ganti'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $query = mysqli_query($koneksi,"UPDATE user set password='$pass' WHERE id_user='$user'");
    //show modal success
    $message = "Password telah diubah.\\nJangan sampai lupa lagi :).";
    echo "<script type='text/javascript'>alert('$message');
        window.location.href='beranda.php?hal=beranda'</script>";
}
?>