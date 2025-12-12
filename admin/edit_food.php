<?php
    require_once "../backend/session_check.php";
    require_once "../backend/db-connect.php";

    // ------------------------------
    // 1) Get ID from URL
    // ------------------------------
    if (!isset($_GET["id"])) {
        die("Invalid Food ID");
    }
    $food_id = $_GET["id"];

    // ------------------------------
    // 2) Fetch existing food data
    // ------------------------------
    $stmt = $db->prepare("SELECT * FROM foods WHERE id = ?");
    $stmt->execute([$food_id]);
    $food = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$food) {
        die("Food not found!");
    }

    $error = "";
    $success = "";

    // ------------------------------
    // 3) If form submitted → update
    // ------------------------------
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $imageName = $food["image"];  // default: keep old image

        // -------- IMAGE HANDLING --------
        if (!empty($_FILES["image"]["name"])) {

            $newImage = basename($_FILES["image"]["name"]);
            $targetFile = "../img/" . $newImage;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $imageName = $newImage; // replace old image

            } else {
                $error = "Image upload failed!";
            }
        }

        // -------- UPDATE IN DB --------
        if (empty($error)) {
            $updateStmt = $db->prepare("
                UPDATE foods
                SET name = ?, price = ?, description = ?, image = ?
                WHERE id = ?
            ");

            if ($updateStmt->execute([$name, $price, $description, $imageName, $food_id])) {
                $success = "Food updated successfully!";
                // Refresh data after update
                $food["name"] = $name;
                $food["price"] = $price;
                $food["description"] = $description;
                $food["image"] = $imageName;

            } else {
                $error = "Failed to update data!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit food</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css"
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
        <h1>Edit Food Item</h1>

        <?php if ($error): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p style="color:green;"><?= $success ?></p>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data" class="add-form">

            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($food['name']) ?>" required><br><br>

            <label>Price:</label>
            <input type="number" name="price" step="0.01"value="<?= htmlspecialchars($food['price']) ?>" required><br><br>
                
            <label>Description:</label>
            <textarea name="description" rows="4" required><?= htmlspecialchars($food['description']) ?></textarea><br><br>

            <label>Current Image:</label><br>
            <img src="../img/<?= htmlspecialchars($food['image']) ?>" class="food-img"><br><br>

            <label>Upload New Image (optional):</label>
            <input type="file" name="image" accept="image/*"><br><br>

            <button type="submit" class="btn">Update Food</button>

        </form>
    </div>
</body>
</html>