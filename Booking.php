<?php 
 session_start();
 include 'connection.php';
?>

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/calendar2-event-fill.svg" rel="icon" type="image/svg+xml">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0">
                    <i class=" fa fa-duotone fa-calendar me-3"></i>Mi Casa</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="Home.php" class="nav-item nav-link">Home</a>
                        <a href="Packages.php" class="nav-item nav-link">Packages</a>
                        <a href="Booking.php" class="nav-item nav-link">Booking</a>
                        <a href="About.php" class="nav-item nav-link">About us</a>
                    </div>
                    <?php
                        if (isset($_SESSION['email'])) {
                            // User is logged in, show Logout link
                            echo '<a href="logout.php" class="btn btn-primary py-2 px-4">Logout</a>';
                        } else {
                            // User is not logged in, show Login link
                            echo '<a href="signin.php" class="btn btn-primary py-2 px-4">Login</a>';
                        }
                    ?>
                    
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="Home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/watch?v=zSQ48zyWZrY" data-bs-target="#videoModal">
                            <span></span>
                        </button>

                        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">YouTube Video</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zSQ48zyWZrY" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" id="forms_container" data-wow-delay="0.2s">
                    <form action="Booking.php" method="post" class="booking_form">

                    <?php
                        if (!isset($_SESSION['email'])) {
                            // User is not logged in, display a message
                            echo '<h1 class="text-white mb-4">Oops!</h1>';
                            echo '<p class="text-warning">It looks like you are not logged in. To continue with your booking please <a href="signin.php">log into your account</a>.
                            <br><br>Don\'t have one? Thats all right, click the button below to get started.</p>';
                            echo '<a href="signup.php" class="btn btn-primary py-2 px-4">Sign Up</a>';
                        } else {
                        ?>
                        
                        <div class="booking-step active" id="step-1">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Step 1</h5>
                            <h2 class="text-white mb-4">Tell us about your Event:</h2>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="package" name="package" required>
                                                <option selected disabled value="">Select Package</option>
                                                <optgroup label="Wedding Packages">
                                                    <option value="ip">Intimate Package</option>
                                                    <option value="cp">Classic Package</option>
                                                    <option value="dp">Deluxe Package</option>
                                                </optgroup>
                                                <optgroup label="Birthday Packages">
                                                    <option value="kp">Kiddie Package</option>
                                                    <option value="dep">Debut Package</option>
                                                    <option value="bp">Basic Package</option>
                                                </optgroup>
                                                <optgroup label="All Occassion Packages">
                                                    <option value="pA">Package A</option>
                                                    <option value="pB">Package B</option>
                                                </optgroup>
                                                    <option value="frm">Function Room</option>
                                            </select>
                                            <label for="pk">Package</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="ballroom" name="FRoom" required>
                                                <option selected disabled value="">Select Ballroom</option>
                                                <option value="sb" >Silver Ballroom</option>
                                                <option value="gb" >Golden Ballroom</option>
                                                <option value="pb" >Platinum Ballroom</option>
                                                <option value="db" >Diamond Ballroom</option>
                                            </select>
                                            <label for="fr">Function Room</label>
                                        </div>
                                    </div>

                                    <div class="col-md-13">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="event" placeholder="Event Name" id="event" required>
                                            <label for="event">Event Name</label>
                                        </div>
                                    </div>

                                    <!--Java Script for package and ballroom filter-->
                                    <script>
                                        const ballroomPackages = {
                                            sb: ["ip", "kp", "bp", "pA", "frm"], 
                                            gb: ["ip", "pB", "kp", "bp", "pA", "frm"],                 
                                            pb: ["cp", "dp", "pB", "frm"],            
                                            db: ["dp", "dep", "pB", "cp", "frm"],           
                                        };

                                        document.getElementById('package').addEventListener('change', function() {
                                            const selectedPackages = Array.from(this.selectedOptions).map(option => option.value);
                                            const ballroomDropdown = document.getElementById('ballroom');
                                            
                                            ballroomDropdown.selectedIndex = 0;
                                            
                                            Array.from(ballroomDropdown.options).forEach(function(option) {
                                                option.style.display = 'block';
                                            });
                                            
                                            if (selectedPackages.length > 0) {
                                                Array.from(ballroomDropdown.options).forEach(function(option, index) {
                                                    if (index !== 0) { 
                                                        const ballroom = option.value;
                                                        const applicablePackages = ballroomPackages[ballroom];
                                                        if (!applicablePackages || !selectedPackages.some(package => applicablePackages.includes(package))) {
                                                            option.style.display = 'none';
                                                        }
                                                    }
                                                });
                                            }
                                        });

                                    </script>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="number" placeholder="No. Of Guests" id="guestNo" required>
                                            <label for="number">No Of Guests</label>
                                        </div>
                                    </div> 

                                    <!--Java Script for guest counter limit-->
                                    <script>
                                       document.getElementById('ballroom').addEventListener('change', function() {
                                            const selectedBallroom = this.value;
                                            const guestNoInput = document.getElementById('guestNo');

                                            const ballroomLimits = {
                                                sb: 50, 
                                                gb: 100, 
                                                pb: 150,  
                                                db: 200, 
                                        
                                            };

                                            guestNoInput.max = ballroomLimits[selectedBallroom] || 50; 

                                            guestNoInput.addEventListener('input', function() {
                                                const enteredValue = parseInt(guestNoInput.value, 10);
                                                const maxLimit = parseInt(guestNoInput.max, 10);

                                                if (enteredValue > maxLimit) {
                                                    guestNoInput.value = maxLimit; 
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="col-md-6">
                                        <div class="form-floating date" id="dateCont" data-target-input="nearest">
                                        <?php
                                        $querry = "SELECT eventDate FROM eventinfo";
                            
                                        //sets the retrieved data as $result
                                        $result = mysqli_query($con,$querry);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $bookedDates[] = $row["eventDate"];
                                            }
                                        }
                                        
                                        // Convert the PHP array to a JavaScript array
                                        $bookedDatesJSON = json_encode($bookedDates);
                                        ?>
                                        <script>
                                           $(document).ready(function() {
                                                var today = new Date();
                                                var twoWeeksFromToday = new Date(today);
                                                twoWeeksFromToday.setDate(twoWeeksFromToday.getDate() + 14);

                                                // Array of specific dates to disable (using booked dates from the database)
                                                var bookedDates = <?php echo $bookedDatesJSON; ?>;

                                                $("#dateEvent").datepicker({
                                                    changeMonth: true,
                                                    changeYear: true,
                                                    beforeShowDay: function(date) {
                                                        // Check if the date is in the array of booked dates to disable
                                                        var dateString = $.datepicker.formatDate("yy-mm-dd", date);
                                                        if ($.inArray(dateString, bookedDates) != -1) {
                                                            return [false];
                                                        }

                                                        // Disable dates two weeks from today and earlier
                                                        return [date > twoWeeksFromToday];
                                                    }
                                                });
                                            });
                                        </script>
                                            <input type="text" id="dateEvent" class="form-control" placeholder="Select a date" name="dateEvent" required>
                                            <label for="date">Date</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating time" data-target-input="nearest">
                                            <input type="time" class="form-control" id="timestart" placeholder="Start Time" name="sTime" required>
                                            <label for="timestart">Start Time</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating time" data-target-input="nearest">
                                            <input type="time" class="form-control" id="endtime" placeholder="End Time" name="eTime" required>
                                            <label for="endtime">End Time</label>
                                        </div>
                                    </div>

                                    <script>
                                        // Get references to the input elements
                                        const startTimeInput = document.getElementById("timestart");
                                        const endTimeInput = document.getElementById("endtime"); // Corrected ID here

                                        // Add an event listener to the end time input
                                        endTimeInput.addEventListener("change", function () {
                                            // Parse the time inputs into Date objects
                                            const startTime = new Date(`1970-01-01T${startTimeInput.value}`);
                                            const endTime = new Date(`1970-01-01T${endTimeInput.value}`);

                                            // Compare the start and end times
                                            if (startTime >= endTime) {
                                                alert("End time must be later than the start time. Please adjust your input.");
                                                // You can also clear the end time input or take other actions as needed
                                                endTimeInput.value = "";
                                            }
                                        });
                                    </script>
                                    
                                    <div class="col-md-13">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Special Request" id="message" name="reqs" style="height: 100px"></textarea>
                                            <label for="message">Special Request</label>
                                        </div>
                                    </div>
                                </div>
                            <button type="button" class="booking_btn btn-primary w-100 py-3" id="s1Next" onclick="nextStep(2)">Next</button>
                        </div>

                        <div class="booking-step" id="step-2">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Step 2</h5>
                            <h2 class="text-white mb-4">Verification:</h2>
                                <div class="row g-3">
                                    <div class="col-md-7">
                                        <p style="color: #404a42;">Do you have an updated contact number?</p>
                                    </div>
                                    <div class="col-md-5" style="text-align: left;">
                                        <label style="color: #404a42; margin-right: 20px;">
                                            <input type="radio" name="contactChoice" value="yes" onclick="toggleContactNumberField(true)" required> Yes
                                        </label>
                                        <label style="color: #404a42;">
                                            <input type="radio" name="contactChoice" value="no" onclick="toggleContactNumberField(false)" required> No
                                        </label>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-floating" id="contNumField" style="display: none;">
                                            <input type="text" class="form-control" id="contNum"  name="contNum" maxlength="11" oninput="formatPhoneNumber(this)">
                                            <label for="Contact-Number">Contact Number</label>
                                        </div>
                                    </div>
                                    
                                    <!--JavaScript for Cont Number-->
                                    <script>
                                        function toggleContactNumberField(show) {
                                            const contactNumberField = document.getElementById("contNumField");
                                            if (show) {
                                                contactNumberField.style.display = "block";
                                                const contNum = document.getElementById("contNum");
                                                contNum.required = true;
                                                
                                            } else {
                                                contactNumberField.style.display = "none";
                                                const contNum = document.getElementById("contNum");
                                                contNum.required = false;
                                            }
                                        }

                                        function formatPhoneNumber(input) {
                                            // Remove non-numeric characters from the input
                                            const phoneNumber = input.value.replace(/\D/g, '');

                                            // Check if the phone number is empty or too long
                                            if (phoneNumber.length === 0) {
                                                input.value = '';
                                            } else {
                                                // Use regular expressions to insert hyphens
                                                const formattedPhoneNumber = phoneNumber.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');
                                                // Limit the phone number to 13 characters
                                                input.value = formattedPhoneNumber.slice(0, 13);
                                            }
                                        }
                                    </script>
                                    
                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="verify" placeholder="OTP">
                                            <label for="verify">Verification Code</label>
                                        </div>
                                    </div>

                                    <form action="send.php" class="" method="post">
                                        <div class="col-4">
                                            <input class="btn btn-primary w-100 py-3" type="submit" name="sendOTP" value="send OTP" id="verify1">
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="booking_btn btn-primary w-100 py-3" id="s1Previous" onclick="previousStep(1)">Previous</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="booking_btn btn-primary w-100 py-3" id="s2Next" onclick="nextStep(3)">Next</button>
                                    </div>
                                </div>
                        </div>

                        <div class="booking-step" id="step-3">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Step 3</h5>
                            <h2 class="text-white mb-4">Payment Details:</h2>
                            <div class="row g-3">
                                <div class="col-md-12" style="margin-bottom: none;">
                                    <div class="payment-info">
                                        <p>Total Amount: Php  </p>
                                        <p>Downpayment (30%): Php </p>
                                        <p>Amount to be payed on the day of the Event: Php </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select class="form-select" id="payType" name="payType" onchange="selectOption()">
                                        <option selected disabled value="">Select Payment Method</option>
                                        <optgroup label="Online Payment">
                                            <option value="gcash">GCash</option>
                                            <option value="maya">Paymaya</option>
                                        </optgroup>
                                        <optgroup label="Card Payment">
                                            <option value="pA">Credit Card</option>
                                            <option value="pB">Debit Card</option>
                                        </optgroup>
                                        </select>
                                        <label for="select1 ">Type of Payment</label>
                                    </div>
                                </div>

                                <div class="col-md-12" style="display: none;" id="referenceNumberField">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="refNum" id="referenceNumber" placeholder="Reference Number">
                                        <label for="referenceNumber">Reference Number</label>
                                    </div>
                                </div>

                                <div class="col-md-12" style="display: none;" id="cardDetailsField">
                                    <div class="col-md-12" style="margin-bottom: 15px;">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="cardNum" id="cardNum" placeholder="Card Number" maxlength="19" oninput="formatCardNumber(this)">
                                            <label for="cardNum">Card Number</label>
                                        </div>
                                    </div>

                                    <!--Javascript for CardNumber input-->
                                    <script>
                                        function formatCardNumber(input) {
                                            // Save the current cursor position
                                            const cursorPosition = input.selectionStart;

                                            // Remove non-numeric characters from the input
                                            const cardNumber = input.value.replace(/\D/g, '');

                                            // Format the card number with hyphens
                                            let formattedCardNumber = '';
                                            for (let i = 0; i < cardNumber.length; i++) {
                                                if (i > 0 && i % 4 === 0) {
                                                    formattedCardNumber += '-';
                                                }
                                                formattedCardNumber += cardNumber[i];
                                            }

                                            input.value = formattedCardNumber;

                                            // Restore the cursor position
                                            const newPosition = cursorPosition + (formattedCardNumber.length - cardNumber.length);
                                            input.setSelectionRange(newPosition, newPosition);
                                        }

                                    </script>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" name="cvv" id="cvv" placeholder="CVV" maxlength="3" oninput="formatCVV(this)">
                                                <label for="cvv">CVV</label>
                                            </div>
                                        </div>
                                        
                                        <!--Javascript for CVV-->
                                        <script>
                                            function formatCVV(input) {
                                                // Remove non-numeric characters from the input
                                                const cvv = input.value.replace(/\D/g, '');

                                                // Limit the CVV to 3 characters
                                                input.value = cvv.slice(0, 3);
                                            }
                                        </script>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="month" class="form-control" name="expDate" id="expDate" placeholder="Exp Date">
                                                <label for="expDate">Exp Date</label>
                                            </div>
                                        </div>
                                        
                                        <!--Javascript for expDate-->
                                        <script>
                                            // Get the current date (year and month)
                                            const currentDate = new Date();
                                            const currentYear = currentDate.getFullYear();
                                            const currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0'); 

                                            // Set the min attribute for the month input
                                            const monthInput = document.getElementById("expDate");
                                            monthInput.min = `${currentYear}-${currentMonth}`;
                                        </script>

                                    </div>
                                </div>

                                <!--JavaScript for Payment Method Additional Fields-->
                                <script>
                                    function selectOption() {
                                        const payType = document.getElementById("payType").value;
                                        const referenceNumberField = document.getElementById("referenceNumberField");
                                        const cardDetailsField = document.getElementById("cardDetailsField");

                                        // Reset the fields to hidden
                                        referenceNumberField.style.display = "none";
                                        cardDetailsField.style.display = "none";

                                        // Show the appropriate field based on the selected payment method
                                        if (payType === "gcash" || payType === "maya") {
                                            referenceNumberField.style.display = "block";
                                        } else if (payType === "pA" || payType === "pB") {
                                            cardDetailsField.style.display = "block";
                                        }
                                    }
                                </script>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="booking_btn btn-primary w-100 py-3" id="s1Previous" onclick="previousStep(2)">Previous</button>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" class="booking_btn btn-primary w-100 py-3" name="submit" value="Book">
                                </div>
                            </div>
                        </div>

                        <div class="booking-step" id="step-4" style="display: none;">
                            <h2 class="text-white mb-4">You're booking is Complete!</h2>
                            <p class="text-white mb-4">Thank you for choosing MiCasa to celebrate your special day with!</p>
                            <a href="Home.php" class="btn btn-primary py-2 px-4">Home</a>
                        </div>
                        <?php
                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation End -->
        <?php
        if(isset($_POST['submit'])) {
            $package = $_POST['package'];
            $funcRoom = $_POST['FRoom'];
            $eventName = $_POST['event'];
            $guestNum = $_POST['number'];
            $eventDate = $_POST['dateEvent'];
            $eventSTime = $_POST['sTime'];
            $eventETime = $_POST['eTime'];
            $request = $_POST['reqs'];

            $refNumber = $_POST['refNum'];
            $cardNum = $_POST['cardNum'];
            $cvv = $_POST['cvv'];
            $expDate = $_POST['expDate'];

            $contNum = $_POST['contNum'];

            $userEmail = $_SESSION['email'];

            //retrieves data from specified table where email is the same as email entered.
            $querry1 = "SELECT u.userID FROM user u
            INNER JOIN logCredentials lc ON u.logID = lc.logID
            WHERE lc.email = '$userEmail'";

            //sets the retrieved data as $result
            $result1 = mysqli_query($con,$querry1);

            if ($result1->num_rows > 0) {
                // Fetch the userID
                $row = $result1->fetch_assoc();
                $userID = $row["userID"];
                // You now have the userID associated with the user's email
            } 

            echo "Package: " . $package . "<br>";
            echo "Function Room: " . $funcRoom . "<br>";
            echo "Event Name: " . $eventName . "<br>";
            echo "Guest Num: " . $guestNum . "<br>";
            echo "Event Date: " . $eventDate . "<br>";
            echo "Start Time: " . $eventSTime . "<br>";
            echo "End Time: " . $eventETime . "<br>";
            echo "request: " . $request . "<br>";
            echo "Contact Number: " . $contNum . "<br>";
            

            $sql2 = "INSERT INTO eventinfo (userID, package, funcRoom, eventType, numAttendee, eventDate, eventTimeStart, eventTimeEnd, request) 
                    VALUES ('$userID', '$package', '$funcRoom', '$eventName','$guestNum', '$eventDate', '$eventSTime', '$eventETime', '$request')";
            mysqli_query($con, $sql2);

            $eventID = mysqli_insert_id($con);

            if (isset($_POST["contactChoice"]) && $_POST["contactChoice"] === "yes") {
                $sql6 = "UPDATE user
                SET contNum = '$contNum'
                WHERE userID = $userID";
                mysqli_query($con, $sql6);
            } else{

            }

            $price=0;
            $down=0;
            $full=0;

            //retrieves data from specified table where email is the same as email entered.
            $querry2 = "SELECT BasePrice FROM pricinginfo WHERE Package ='$package' AND Ballroom = '$funcRoom'";

            //sets the retrieved data as $result
            $result2 = mysqli_query($con,$querry2);

            if ($result2->num_rows > 0) {
                // Fetch the userID
                $row = $result2->fetch_assoc();
                $price = $row["BasePrice"];
                // You now have the userID associated with the user's email

                $percentage = 0.3; // 30% expressed as a decimal
                $down = $percentage * $price;

                // Subtract 30% from the original value
                $full = $price - $down;
            } 

            $type = $_POST['payType'];

            $sql4 = "INSERT INTO paymentinfo (eventID, total_bill, downpayment, paymentType, fullPayment) 
                    VALUES ('$eventID', '$price', '$down', '$type','$full')";
            mysqli_query($con, $sql4);

            $paymentID = mysqli_insert_id($con);

            echo "type: " . $type . "<br>";
            echo "refNum: " . $refNumber . "<br>";
            echo "cardNum: " . $cardNum . "<br>";
            echo "cvv: " . $cvv . "<br>";
            echo "expdate: " . $expDate . "<br>";

            // Insert payment information into the database
            if ($type === "gcash" || $type === "maya") {
                $sql5 = "INSERT INTO onlineinfo (paymentID, referenceNum) VALUES ('$paymentID','$refNumber')";
                mysqli_query($con, $sql5);
            } else if ($type  === "pA" || $type  === "pB") {
                $sql6 = "INSERT INTO cardinfo (paymentID, cardNum, cvv, expDate) VALUES ('$paymentID','$cardNum','$cvv','$expDate')";
                mysqli_query($con, $sql6);
            }

            mysqli_close($con);
        }
        ?>

        <!-- JavaScript for buttn navigation -->
        <script>
            const formSteps = document.querySelectorAll('.booking-step');
            let currentStep = 0;

            function nextStep(targetStep) {
                if (targetStep >= 1 && targetStep <= formSteps.length) {
                    formSteps[currentStep].style.display = 'none';
                    currentStep = targetStep - 1; // -1 to match the array index
                    formSteps[currentStep].style.display = 'block';
                }
            }

            function previousStep(targetStep) {
                if (targetStep >= 1 && targetStep <= formSteps.length) {
                    formSteps[currentStep].style.display = 'none';
                    currentStep = targetStep - 1; // -1 to match the array index
                    formSteps[currentStep].style.display = 'block';
                }
            }
        </script>


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="container py-5">
                        <div class="row g-5">
                            <div class="col-lg-4 col-md-6">
                                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                                <a class="btn btn-link" href="About.php">About us</a>
                                <a class="btn btn-link" href="Booking.php">Booking</a>
                                <a class="btn btn-link" href="">Privacy Policy</a>
                                <a class="btn btn-link" href="">Terms & Condition</a>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Carmona, Cavite, Philippines</p>
                                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0912 345 6789</p>
                                <p class="mb-2"><i class="fa fa-envelope me-3"></i>events@gmail.com</p>
                                <div class="d-flex pt-2">
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                                <h5 class="text-light fw-normal">Monday - Saturday</h5>
                                <p>08AM - 05PM</p>
                                <h5 class="text-light fw-normal">Sunday</h5>
                                <p>10AM - 06PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                    &copy; <a class="border-bottom" href="#">ChuChu Events Place</a>, All Right Reserved. 
                                    
                                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                    <br>Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>
</html>

