<?php
    // Database connection parameters
    $servername = 'localhost';  
    $dbname = 'project';    
    $username = 'root';
    $password = ''; 

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve values from the URL
    $name = $_GET['name'] ?? '';
    $address = $_GET['address'] ?? '';
    $contact = $_GET['contact'] ?? '';
    $date = $_GET['date'] ?? '';
    $time = $_GET['time'] ?? '';
    $services = $_GET['services'] ?? '';

    // Construct the SQL DELETE query using prepared statement
    $sql = "DELETE FROM booking WHERE 
            `Name` = ? AND 
            `Address` = ? AND 
            `Contact Number` = ? AND  
            `Date of Reservation` = ? AND 
            `Time of Reservation` = ? AND 
            `Select Services` = ?";

    // Prepare SQL statement
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        die('MySQL prepare error: ' . $connection->error);
    }

    // Bind parameters to the prepared statement as strings
    $stmt->bind_param('ssssss', $name, $address, $contact, $date, $time, $services);

    // Execute the query
    if ($stmt->execute()) {
        header("Location:view.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
?>
