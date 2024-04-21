<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $contact = htmlspecialchars($_POST["contact"]); 
    $date = htmlspecialchars($_POST["date"]);
    $time = htmlspecialchars($_POST["time"]);
    $selectedServices = isset($_POST["services"]) ? htmlspecialchars($_POST["services"]) : ""; 
    
    // Database connection parameters
    $serverName = 'localhost';  
    $dbName = 'project';    
    $username = 'root';
    $password = '';

    // Create connection
    $connection = new mysqli($serverName, $username, $password, $dbName);
    if ($connection->connect_errno > 0) {
        echo 'Failed to connect to MySQL: ' . $connection->error;
        die();  
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO `booking` (`Name`, `Address`, `Contact Number`,`Date of Reservation`, `Time of Reservation`, `Select Services`)
        VALUES (?, ?, ?, ?, ?, ?)";


    // Create a prepared statement
    $stmt = $connection->prepare($sql);
    if (!$stmt) {   
        echo "Error preparing statement: " . $connection->error;
        die();
    }

    // Bind parameters
    $stmt->bind_param("ssisss", $name, $address, $contact, $date, $time, $selectedServices);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close connection
    $connection->close();
}
?>
