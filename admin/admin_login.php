<?php
    //store login info and load db-connect.php
    session_start();
    require "../backend/db-connect.php";

    //if form submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        //Fetch admin from database
        $stmt = $db->prepare("SELECT * FROM admin WHERE username = ?"); //placeholder
        $stmt->execute([$username]); //parameter
        $admin = $stmt->fetch(PDO::FETCH_ASSOC); //turn retrieved row into dictionary

        //Check login 
        if ($admin && $admin["password"] === $password) {
            $_SESSION["admin_logged_in"] = true; //creates a session box with a variable (dict)
            header("Location: admin_dashboard.php");
            exit();
        }
        else {
            $error = "Invalid username or password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_login.css">
</head>
<body>

    <div class="background-wrapper"></div>
    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">ADMIN LOGIN</div>
            <form action="" method="POST">
                <div class="input-title">Username</div>
                <div class="input-group">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="username" required>
                </div>

                <div class="input-title">Password</div>
                <div class="input-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="password" required>
                </div>

                <button type="submit" class="login-btn">LOGIN</button>
                <?php if (!empty($error)): ?>
                    <p class="error"><?= $error ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>