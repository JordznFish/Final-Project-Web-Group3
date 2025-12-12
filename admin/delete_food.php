<?php
    require_once "../backend/session_check.php";
    require_once "../backend/db-connect.php";

    // Check if id exists in URL
    if (!isset($_GET["id"])) {
        header("Location: admin_dashboard.php");
        exit();
    }

    $id = $_GET["id"];

    // DELETE using PDO
    $stmt = $db->prepare("DELETE FROM foods WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect back to dashboard
    header("Location: admin_dashboard.php");
    exit();
?>
