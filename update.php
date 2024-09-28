<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET Name='$name', Address='$address', Tel='$tel', Course='$course' WHERE NIC='$nic'";

    if ($conn->query($sql) === TRUE) {
        echo "Student details updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Update Student Details</h2>
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
        <button type="submit">Update</button>
    </form>
</body>
</html>
