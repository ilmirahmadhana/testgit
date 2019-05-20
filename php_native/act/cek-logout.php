<?php
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    $message = "Kembali ke halaman login.";
    echo "<script type='text/javascript'>alert('$message');
          window.location.href='../index.php'</script>";
?>