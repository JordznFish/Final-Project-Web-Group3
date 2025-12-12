<?php 
    session_start();

    //If admin not logged in, we redirect them to login page
    if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
        header("Location: ../admin/admin_login.php");
        exit();
    }
?>