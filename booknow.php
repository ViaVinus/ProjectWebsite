    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="styles/booknow.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php"><i class="fas fa-home"></i> Home</a>
                <a href="Portfolio.php"><i class="fas fa-images"></i> Gallery</a>
                <a href="Service.php"><i class="fas fa-cogs"></i> Services</a>
                <a href="About.php"><i class="fas fa-user"></i> About Us</a>
                <a href="booknow.php"><i class="fas fa-calendar-plus"></i> Book Now</a>
            </nav>
        </header>
        <div class="container">
            <h2>Book Now</h2>

            <form id="bookingForm" action="submit_action.php" method="post">
                <div class="input-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="input-group">
                    <label for="number">Contact Number:</label>
                    <input type="tel" id="number" name="number" required>
                </div>
                <div class="input-group">
                    <label for="date">Date of Reservation:</label>
                    <input type="date" name="date">
                </div>
                <div class="input-group">
                    <label for="time">Time of Reservation:</label>
                    <input type="time" name="time">
                </div>
                <div class="input-group">
                    <label for="select-services">Select Services:</label>
                    <div class="input-with-icon" onclick="toggleServiceOptions()">
                        <input type="text" id="select-services" name="select-services" placeholder="Select a service" readonly>
                        <i class="fas fa-caret-down"></i> <!-- Font Awesome arrow icon -->
                    </div>
                    <div id="service-options" class="service-options">
                        <div>
                            <input type="checkbox" id="service1" name="service1" value="Solo" onclick="updateSelectedServices()">
                            <label for="service1">Solo Package</label>
                        </div>
                        <div>
                            <input type="checkbox" id="service2" name="service2" value="Duo" onclick="updateSelectedServices()">
                            <label for="service2">Duo Package</label>
                        </div>
                        <div>
                            <input type="checkbox" id="service3" name="service3" value="Group" onclick="updateSelectedServices()">
                            <label for="service3">Group Package</label>
                        </div>
                        <div>
                            <input type="checkbox" id="service4" name="service4"  value="Birthday" onclick="updateSelectedServices()">
                            <label for="service4">Birthday Package</label>
                        </div>
                        <div>
                            <input type="checkbox" id="service5" name="service5" value="Special Birthday" onclick="updateSelectedServices()">
                            <label for="service5">Special Birthday Package</label>
                        </div>
                    </div>
                </div>
                <div id="checkbox">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree">I agree to the <a href="terms.php" target="_blank">terms and conditions</a></label>
                </div>
                <div class="clearfix">
                    <button class="button-right" onclick="confirmBooking()">Submit</button>
                </div>
            </form> 
        </div>

        <script>
            
            function confirmBooking() {
                // Retrieve selected services
                var selectedServicesInput = document.getElementById("select-services");
                var selectedServices = selectedServicesInput.value;

                // Ensure at least one service is selected
                if (!selectedServices) {
                    alert("Please select at least one service.");
                    return;
                }


                    // Redirect to submit.html with URL parameters
                    var confirmationUrl = "submit_action.php?" +
                        "name=" + encodeURIComponent(document.getElementById('name').value) +
                        "&address=" + encodeURIComponent(document.getElementById('address').value) +
                        "&number=" + encodeURIComponent(document.getElementById('number').value) +
                        "&date=" + encodeURIComponent(document.getElementById('date').value) +
                        "&time=" + encodeURIComponent(document.getElementById('time').value) +
                        "&selectedServices=" + encodeURIComponent(selectedServices);

                    // Perform the redirection
                    window.location.href = confirmationUrl;

                    // Change the document title to avoid "This page says" text
                    document.title = "Thank You!";
                }

            function toggleServiceOptions() {
                var serviceOptions = document.getElementById("service-options");
                serviceOptions.classList.toggle("show");
            }

            function updateSelectedServices() {
                var selectedServicesInput = document.getElementById("select-services");
                var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                var selectedServices = Array.from(checkboxes).map(function(checkbox) {
                    return checkbox.value;
                });
                selectedServicesInput.value = selectedServices.join(", ");
            }   
            
        </script>
    </body>
    </html>
