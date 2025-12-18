<?php
require_once "../backend/session_check.php";
require_once "../backend/db-connect.php";

// initialize error & success messages
$error = "";
$success = "";

// When form is submitted:
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $imageName = "";

    // ---------------------------------------------------
    //  HANDLE IMAGE UPLOAD
    // ---------------------------------------------------
    // Check if a file was uploaded AND no errors occurred
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {

        $imageName = basename($_FILES["image"]["name"]);
        $targetFile = "../img/" . $imageName;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $error = "Image upload failed!";
        }

    } else {
        $error = "Image upload is required!";
    }

    // ---------------------------------------------------
    //  INSERT INTO DATABASE USING PDO
    // ---------------------------------------------------
    if (empty($error)) {
        $stmt = $db->prepare("
            INSERT INTO foods (name, price, description, image)
            VALUES (?, ?, ?, ?)
        ");

        if ($stmt->execute([$name, $price, $description, $imageName])) {
            $success = "Food item added successfully!";
            // optional redirect:
            // header("Location: admin_dashboard.php");
            // exit;
        } else {
            $error = "Failed to insert data!";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>

    <link rel="stylesheet" href="../css/admin_dashboard.css">
</head>
<body>
    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Crossing Eats</h2>

        <ul>
            <li><a href="admin_dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">

        <h1>Add New Food</h1>

        <?php if ($error): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p style="color: green;"><?= $success ?></p>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data" class="add-form">
            <br>
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" required>

            <label>Description:</label>
            <textarea name="description" rows="4" required></textarea>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required><br><br>

            <button type="submit" class="btn">Add Food</button>
        </form>
    </div>
</body>
</html>
