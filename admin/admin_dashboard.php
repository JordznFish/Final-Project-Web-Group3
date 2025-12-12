<?php 
    require_once "../backend/session_check.php"; //load session_check once, for safety 
    require_once "../backend/db_connect.php"; //connect with db

    //Fetch datas from database (descending order)
    $stmt = $db->prepare("SELECT * FROM foods ORDER BY id DESC");
    $stmt->execute();
    $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
?>