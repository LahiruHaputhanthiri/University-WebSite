<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];

    $sql = "DELETE FROM students WHERE NIC='$nic'";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully";
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
    <title>Delete Student</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Delete Student</h2>
    <form method="post">
        <label>NIC:</label>
        <input type="text" name="nic" required>
        <button type="submit">Delete</button>
    </form>
</body>
</html>
