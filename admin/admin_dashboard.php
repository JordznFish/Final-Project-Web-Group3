<?php 
    require_once "../backend/session_check.php"; //load session_check once, for safety 
    require_once "../backend/db-connect.php"; //connect with db

    //Fetch datas from database (descending order)
    $stmt = $db->prepare("SELECT * FROM foods ORDER BY id DESC");
    $stmt->execute();
    $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!--  CSS -->
    <link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css" />
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

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <h1 class="page-title">Food Items</h1>
        <a href="add_food.php" class="btn">+ Add New Food</a>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($foods as $food) { ?>
                        <tr>
                            <td><?= $food['id'] ?></td>
                            <td><?= htmlspecialchars($food['name']) ?></td>
                            <td>$<?= number_format($food['price'],2) ?></td>
                            <td><?= htmlspecialchars($food['description']) ?></td>
                            <td><img src="../img/<?= htmlspecialchars($food['image']) ?>" class="food-img"></td>
                            <td>
                                <a href="edit_food.php?id=<?= $food['id'] ?>" class="btn btn-warning">Edit</a>
                                <a href="delete_food.php?id=<?= $food['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete this item?');">Delete</a>            
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>