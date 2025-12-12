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
</head>
<body>
    <div class="login-box">
        <h2>Crossing Eats Admin Login</h2>

        <form action="" method="POST">
            <label>Username:</label><br>
            <input type="text" name="username" required><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>