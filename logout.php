<?php
    session_start();

    session_destroy();
    $_SESSION['status_login']==false;

    header('location: login.php');
?>