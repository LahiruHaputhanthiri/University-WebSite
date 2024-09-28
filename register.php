<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $course = $_POST['course'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    if (!empty($nic) && !empty($name) && !empty($address) && !empty($tel) && !empty($course) && !empty($gmail) && !empty($password)) {
        // Check if NIC already exists
        $check_query = "SELECT * FROM form WHERE nic = '$nic'";
        $result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script type='text/javascript'> alert('Error: NIC already exists')</script>";
        } else {
            // Insert new record
            $query = "INSERT INTO form (nic, name, address, tel, course, gmail, password) VALUES ('$nic', '$name', '$address', '$tel', '$course', '$gmail', '$password')";
            
            if (mysqli_query($con, $query)) {
                echo "<script type='text/javascript'> alert('Student registered successfully')</script>";
            } else {
                echo "<script type='text/javascript'> alert('Error: " . mysqli_error($con) . "')</script>";
            }
        }
    } else {
        echo "<script type='text/javascript'> alert('Error: Please fill in all fields')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Student Registration</h2>
    <form method="post">
        <label>NIC:</label>
        <input type="text" name="nic" required>
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Address:</label>
        <input type="text" name="address" required>
        <label>Tel No:</label>
        <input type="text" name="tel" required>
        <label>Course:</label>
        <input type="text" name="course" required>
        <label>Email:</label>
        <input type="email" name="gmail" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
