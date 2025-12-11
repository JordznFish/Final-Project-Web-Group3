<?php 
    $database = "crossing_eats_db";
    $host = "localhost";
    $username = "root";
    $password = "";

    //Connect to database
    $db = new PDO("mysql:dbname=$database;host=$host", $username, $password);

    //Check validity
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>