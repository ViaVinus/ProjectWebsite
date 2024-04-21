<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url(green1.jpg);
}

        </style>
</head>
<body>

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
// Retrieve bookings from the database
$sql = "SELECT Name, Address, `Contact Number`, `Date of Reservation`, `Time of Reservation`, `Select Services` FROM booking";
$result = $connection->query($sql);

if ($result === false) {
    // Handle the error - for example, logging it or displaying a user-friendly message
    die("Error executing query: " . $connection->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<a href='edit.php?name=" . urlencode($row['Name']) . 
             "&address=" . urlencode($row['Address']) . 
             "&contact=" . urlencode($row['Contact Number']) . 
             "&date=" . $row['Date of Reservation'] . 
             "&time=" . $row['Time of Reservation'] . 
             "&services=" . urlencode($row['Select Services']) . "'></a><br>";
    }
} else {
    echo "0 results";
}

// Retrieve information from URL parameters if they are set
$name = isset($_GET['name']) ? $_GET['name'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$contact = isset($_GET['contact']) ? $_GET['contact'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$time = isset($_GET['time']) ? $_GET['time'] : '';
$services = isset($_GET['services']) ? $_GET['services'] : '';
$servicesArray = explode(", ", $services); 

?>

<div class="wrapper">
    
    <form action="update.php" method="post" class="contact-form">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <input type="text" name="name" placeholder="Name" required class="input-group" value="<?php echo htmlspecialchars($name); ?>">
        <input type="text" name="address" placeholder="Address" required class="input-group" value="<?php echo htmlspecialchars($address); ?>">
        <input type="tel" name="contact" placeholder="Contact Number" required class="input-group" value="<?php echo htmlspecialchars($contact); ?>">
        <input type="date" name="date" placeholder="Date of Reservation" required class="input-group" value="<?php echo htmlspecialchars($date); ?>">
        <input type="time" name="time" placeholder="Time of Reservation" required class="input-group" value="<?php echo htmlspecialchars($time); ?>">
        <input type="text" id="select-services" name="services" placeholder="Select Services" required class="input-group" value="<?php echo htmlspecialchars($services); ?>">
        <div id="service-options" class="service-options">
            <div>
                <input type="checkbox" id="service1" name="service1" value="Solo" <?php echo in_array('Solo', $servicesArray) ? 'checked' : ''; ?>>
                <label for="service1">Solo Package</label>
            </div>
            <div>
                <input type="checkbox" id="service2" name="service2" value="Duo" <?php echo in_array('Duo', $servicesArray) ? 'checked' : ''; ?>>
                <label for="service2">Duo Package</label>
            </div>
            <div>
                <input type="checkbox" id="service3" name="service3" value="Group" <?php echo in_array('Group', $servicesArray) ? 'checked' : ''; ?>>
                <label for="service3">Group Package</label>
            </div>
            <div>
                <input type="checkbox" id="service4" name="service4" value="Birthday" <?php echo in_array('Birthday', $servicesArray) ? 'checked' : ''; ?>>
                <label for="service4">Birthday Package</label>
            </div>
            <div>
                <input type="checkbox" id="service5" name="service5" value="Special Birthday" <?php echo in_array('Special Birthday', $servicesArray) ? 'checked' : ''; ?>>
                <label for="service5">Special Birthday Package</label>
            </div>
        </div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>

<script>
    function updateSelectedServices() {
        var checkboxes = document.querySelectorAll('#service-options input[type="checkbox"]:checked');
        var selectedServices = Array.from(checkboxes).map(checkbox => checkbox.value).join(", ");
        document.getElementById("select-services").value = selectedServices;
    }

    document.querySelectorAll('#service-options input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedServices);
    });

    window.onload = updateSelectedServices; // Ensures the input field is synchronized with pre-selected checkboxes on page load
</script>
</body>
</html>
