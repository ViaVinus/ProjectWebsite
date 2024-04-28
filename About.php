<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    /* Your existing styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif; /* Apply Roboto font to all elements */
    }

    /* Additional style for contact information */
    .contact-info p {
        font-weight: 400; /* Set font weight to normal */
        font-size: 18px; /* Adjust font size */
    }

    .contact-info h1 {
        font-family: 'Roboto', sans-serif; /* Apply Roboto font to h1 within .contact-info */
        font-size: 30px;
        margin-bottom: 20px;
        color: #333;
    }

    /* Add this style to apply Google Font to h1 */
    .contact-info h1 {
        font-family: 'Roboto', sans-serif; /* Apply Roboto font to h1 within .contact-info */
    }

    header {
        background-color: #4F6F52;
        color: #fff;
        padding: 15px;
        text-align: right;
        font-weight: bold;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 50px;
        font-weight: bold;
    }

    nav a:not(.active):hover {
        background-color: #A4CE95;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .contact-wrapper {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 80%;
        max-width: 800px;
    }

    .image-container {
        flex: 1;
    }

    .image-container img {
        max-width: 1000px;
        height: auto;
        margin-left: -390px;
    }

    .contact-info {
        background-color: #A4CE95; /* Change to the same color as contact info */
        padding: 20px;
        margin-left: 200px;
        margin-top: -200px;
        border-radius: 8px; /* Add border radius for rounded corners */
    }

    .contact-info p {
        margin-top: 10px;
        color: #555;
        font-size: 20px;
        font-weight: bold;
        display: flex; /* Use flex display to align items horizontally */
        align-items: center; /* Center vertically within the flex container */
    }

    .contact-info i {
        color: rgb(17, 16, 15);
        margin-right: 10px;
    }

    .contact-info .address {
        display: flex;
        align-items: center; /* Align items to the center */
    }

    .contact-info .address i {
        margin-right: 5px; /* Adjust the margin for map marker icon */
    }

    body {
        background-color: #A4CE95; /* Add background color for body */
    }
</style>

</head>
<body>
    <header>
        <nav>
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="Portfolio.php"><i class="fas fa-images"></i> Gallery</a>
            <a href="Service.php"><i class="fas fa-cogs"></i> Services</a>
            <a href="About.php" class="active"><i class="fas fa-user"></i> About Us</a>
            <a href="booknow.php"><i class="fas fa-calendar-plus"></i> Book Now</a>
        </nav>
    </header>
    <div class="container">
        <div class="contact-wrapper">
            <div class="image-container">
                <img src="pic.jpg" alt="pic">
            </div>
            <div class="contact-info"> <!-- Remove inline background color style -->
                <h1>Contact Information</h1> <!-- Apply Google Font here -->
                <p>
                    <i class="fab fa-facebook"></i><a href="https://www.facebook.com/memoirsstudios23?mibextid=LQQJ4d"> Memoirs Studios</a>
                </p>
                <p>
                    <i class="fas fa-envelope"></i><a href="mailto:MemoirsStudio@gmail.com"> MemoirsStudio@gmail.com</a>
                </p>
                <p class="address">
                    <span><i class="fas fa-map-marker-alt"></i> 2nd Floor Gen-Bru Bldg (7-Eleven Bldg) Unit C, Brgy. Silanganan, Dolores, Philippines</span>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
