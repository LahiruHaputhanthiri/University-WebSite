<?php
    session_start();
    include('db.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];
    
        // Validate input
        if (!empty($gmail) && !empty($password)) {
            // Use prepared statement to prevent SQL injection
            $stmt = $con->prepare("SELECT gmail, password FROM form WHERE gmail = ? LIMIT 1");
            $stmt->bind_param("s", $gmail);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows == 1) {
                $user_data = $result->fetch_assoc();
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['gmail'] = $gmail;
    
                    // Debugging: Add echo statement to check if this line is executed
                    echo "Redirecting to index.php";
    
                    header("location: index.php");
                    exit();
                } else {
                    echo "<script>alert('Wrong Email or Password')</script>";
                }
            } else {
                echo "<script>alert('Wrong Email or Password')</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Invalid Email or Password')</script>";
        }
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
    <h2>Login</h2>
    <form method="post">
        <label>Email:</label>
        <input type="text" name="gmail" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
