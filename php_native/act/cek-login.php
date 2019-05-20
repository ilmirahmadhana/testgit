<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_bupe");
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT id_user FROM user WHERE username='$username' and password='$password'";
    $result = mysqli_query($koneksi,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
    $_SESSION['username'] = $username;
    header("location: ../beranda.php");
    }else {
    //show message fail login
    $message = "Username or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');
          window.location.href='../index.php'</script>";
    }
?>