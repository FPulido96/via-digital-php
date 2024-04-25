<?php
    session_start();

    if (isset($_SESSION)) {
        $user = $_SESSION['user'];
        $email = $_SESSION['email'];  
    } else {
        header("location: ../login/login.php");
    }

    if (isset($_GET['logout'])) {
        $_SESSION = array();    
        session_destroy();
        header("location: ../login/login.php");
        exit;
    }
?>