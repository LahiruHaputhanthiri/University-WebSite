<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];

    $sql = "SELECT * FROM students WHERE NIC='$nic'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "NIC: " . $row['NIC'] . "<br>";
        echo "Name: " . $row['Name'] . "<br>";
        echo "Address: " . $row['Address'] . "<br>";
        echo "Tel No: " . $row['Tel'] . "<br>";
        echo "Course: " . $row['Course'] . "<br>";
    } else {
        echo "No student found with NIC: $nic";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Student</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Search Student</h2>
    <form method="post">
        <label>NIC:</label>
        <input type="text" name="nic" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>
