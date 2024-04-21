<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles/submit.css"> 
</head>
<body>
    <div class="container">
        <div id="purchase-info" style="display: block;">
            <h3>Please review your purchase information before confirming:</h3>
            <!-- Display other purchase information -->
        </div>

        <!-- Display selected services -->
        <div class="input-group" style="display: block;">
            <label for="select-services">Selected Services:</label>
            <input type="text" id="select-services" name="select-services" readonly>
        </div>

        <!-- Confirmation Button -->
        <button id="confirm-button" onclick="confirmBooking()">Confirm Booking</button>

        <!-- "Thank You" Message -->
        <div id="thank-you-message" style="display: none;">
            <h2>Thank You for Booking!</h2>
            <p>We have received your booking request. We will get back to you shortly.</p>
            <p>If you have other concerns please don't hesitate to message us.</p>
            <button onclick="goBack()">Back</button>
        </div>
    </div>

    <!-- JavaScript code to display purchase information -->
    <script>
        // Function to parse URL parameters
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Retrieve purchase information from URL parameters
        var name = getUrlParameter('name');
        var address = getUrlParameter('address');
        var number = getUrlParameter('number');
        var date = getUrlParameter('date');
        var time = getUrlParameter('time');
        var selectedServices = getUrlParameter('selectedServices');

        // Display purchase information for review
        document.getElementById('purchase-info').innerHTML += `
            <div>
                <label for="review-name">Full Name:</label>
                <span id="review-name">${name}</span>
            </div>
            <div>
                <label for="review-address">Address:</label>
                <span id="review-address">${address}</span>
            </div>
            <div>
                <label for="review-number">Contact Number:</label>
                <span id="review-number">${number}</span>
            </div>
            <div>
                <label for="review-date">Date of Reservation:</label>
                <span id="review-date">${date}</span>
            </div>
            <div>
                <label for="review-time">Time of Reservation:</label>
                <span id="review-time">${time}</span>
            </div>
        `;

        // Display selected services
        document.getElementById('select-services').value = selectedServices;

        // Confirmation function
        function confirmBooking() {
            // Hide the selected services input field and its label
            document.getElementById('select-services').style.display = 'none';
            document.querySelector('.input-group').style.display = 'none';

            // Hide the confirm booking button
            document.getElementById('confirm-button').style.display = 'none';

            // Hide the purchase information section
            document.getElementById('purchase-info').style.display = 'none';

            // Show the thank you message
            document.getElementById('thank-you-message').style.display = 'block';
        }

        // Go back function
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
