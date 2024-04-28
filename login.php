<?php
session_start(); 


$host = 'localhost';
$username = 'root'; 
$password = ''; 
$database = 'memoirsstudio';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $conn = new mysqli($host, $username, $password, $database);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $username = $conn->real_escape_string($_POST['username']); 
    $password = $conn->real_escape_string($_POST['password']); 

   
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    
    if ($result && $result->num_rows == 1) {
       
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        
        setcookie('username', $username, time() + (86400 * 30), "/");

       
        header('Location: view.php');
        exit; 
    } else {
       
        $login_error = 'Invalid username or password. Please try again.';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (isset($login_error)) : ?>
                <p class="error-message"><?php echo $login_error; ?></p>
            <?php endif; ?>
            <div class="clearfix">
                <button class="button-right" type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
