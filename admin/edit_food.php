<?php
    require_once "../backend/session_check.php";
    require_once "../backend/db-connect.php";

    // Get ID from URL
    if (!isset($_GET["id"])) {
        die("Invalid Food ID");
    }
    $food_id = $_GET["id"];

    
    // Fetch existing food data
    $stmt = $db->prepare("SELECT * FROM foods WHERE id = ?");
    $stmt->execute([$food_id]);
    $food = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$food) {
        die("Food not found!");
    }

    $error = "";
    $success = "";

    
    // If form submitted → update
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $imageName = $food["image"];  // default: keep old image

        // If file uploaded: highest priority
        if (!empty($_FILES["image_file"]["name"])) {

            $newImage = basename($_FILES["image_file"]["name"]);
            $targetFile = "../img/" . $newImage;

            if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFile)) {
                $imageName = $newImage;
            } else {
                $error = "Image upload failed!";
            }

        // Else: use text input
        } else {
            if (!empty($_POST["image_text"])) {
                $imageName = trim($_POST["image_text"]);
            }
        }

        // UPDATE IN DB 
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
            <br>
            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($food['name']) ?>" required>

            <label>Price:</label>
            <input type="number" name="price" step="0.01"value="<?= htmlspecialchars($food['price']) ?>" required>
                
            <label>Description:</label>
            <textarea name="description" rows="4" required><?= htmlspecialchars($food['description']) ?></textarea>

            <label>Current Image Filename:</label>
            <img src="../img/<?= htmlspecialchars($food['image']) ?>" class="food-img" style="display:block; margin-bottom: 5px;">
            <input type="text" name="image_text" value="<?= htmlspecialchars($food['image']) ?>"required>

            <label>Upload New Image (optional):</label>
            <input type="file" name="image_file" accept="image/*"><br><br>
            
            <button type="submit" class="btn">Update Food</button>

        </form>
    </div>
</body>
</html>