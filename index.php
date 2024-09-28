<?php
    session_start();
    include('db.php');
        if (!isset($_SESSION['gmail'])) {
            header("Location: login.php"); // Redirect to login page if not logged in
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>WELCOME USER</h1>
    <a href = "login.php">Logout</a>

</body>
</html>