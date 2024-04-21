<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: solid 1px #ddd;
            padding: 8px;
            text-align: left;
            background-color: #ffffff;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        td{
            text-align: center;
            font-weight: bold;
            
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            color: #333;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form action="view.php" method="GET">
    <label for="search"></label>
    <input type="text" name="search">
    <input type="submit" value="submit">
</form>

<table>
    <tr>
        <th> Full Name</th>
        <th> Address </th>
        <th> Contact Number </th>
        <th> Date of Reservation </th>
        <th> Time of Reservation </th>
        <th> Selected Services </th>
        <th> Edit </th>
        <th> Delete </th>
    </tr>

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

// Check if search parameter is set
$search = isset($_GET['search']) ? $_GET['search'] : '';

// SQL query to select data from the table
$sql = "SELECT `Name`, `Address`, `Contact Number`, `Date of Reservation`, `Time of Reservation`, `Select Services` FROM booking";

// If search parameter is provided, filter the results
if ($search) {
    $sql .= " WHERE `Name` LIKE ? OR `Address` LIKE ? OR `Contact Number` LIKE ? OR `Date of Reservation` LIKE ? OR `Time of Reservation` LIKE ? OR `Select Services` LIKE ?";
}

// Prepare the statement
$stmt = $connection->prepare($sql);

// If the statement is successfully prepared
if ($stmt) {
    // If search parameter is provided, bind parameters
    if ($search) {
        $searchParam = "%$search%";
        $stmt->bind_param("ssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
    }

    // Execute the query
    if ($stmt->execute()) {
        // Get the result
        $result = $stmt->get_result();

        // Check if the query returned any rows
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) { 
                echo "<tr> 
                        <td>{$row['Name']}</td>
                        <td>{$row['Address']}</td>
                        <td>{$row['Contact Number']}</td>
                        <td>{$row['Date of Reservation']}</td>
                        <td>{$row['Time of Reservation']}</td>
                        <td>{$row['Select Services']}</td>
                        <td><a href='edit.php?name={$row['Name']}&address={$row['Address']}&contact={$row['Contact Number']}&date={$row['Date of Reservation']}&time={$row['Time of Reservation']}&services={$row['Select Services']}'>Edit</a></td>
                        <td><a href='delete.php?name={$row['Name']}&address={$row['Address']}&contact={$row['Contact Number']}&date={$row['Date of Reservation']}&time={$row['Time of Reservation']}&services={$row['Select Services']}'>Delete</a></td>
                      </tr>";
            } 
        } else {
            // No rows returned
            echo "<tr><td colspan='8'>No results</td></tr>";
        }

        // Close result
        $result->close();
    } else {
        // Execution failed
        echo "Error executing statement: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Preparation failed
    echo "Error preparing statement: " . $connection->error;
}

// Close connection
$connection->close();
?>
