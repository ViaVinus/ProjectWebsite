<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';


$connection = new mysqli($servername, $username, $password, $dbname);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve POST data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$contact = isset($_POST['contact']) ? $_POST['contact'] : ''; 
$date = isset($_POST['date']) ? $_POST['date'] : '';
$time = isset($_POST['time']) ? $_POST['time'] : '';
$services = isset($_POST['services']) ? $_POST['services'] : '';

// Prepare an SQL statement to avoid SQL injection
$sql = "UPDATE booking SET `Name`=?, `Address`=?, `Contact Number`=?, `Date of Reservation`=?, `Time of Reservation`=?, `Select Services`=? WHERE `Name`=?";
$stmt = $connection->prepare($sql);

// Check if the statement was prepared correctly
if (!$stmt) {
    die("MySQL prepare error: " . $connection->error);
}

// Bind parameters to the prepared statement
$stmt->bind_param("sssssss", $name, $address, $contact, $date, $time, $services, $name);

// Execute the prepared statement
if ($stmt->execute()) {
    header("Location:view.php");
    exit();
} else {
    echo "Error updating record: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$connection->close();
?>
