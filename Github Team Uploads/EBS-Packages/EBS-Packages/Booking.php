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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
                    <form action="sendDB.php" method="post" class="booking_form" id="bookingForm">

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
                                            <input type="text" id="dateEvent" class="form-control" name="dateEvent" required>
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
                            <h2 class="text-white mb-4">Update:</h2>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <p style="color: #404a42;">We want to keep our communication smooth in preparation for the big day! 
                                        <br><br>With that we would like to ask if you have an updated contact number?</p>
                                    </div>

                                    <div class="col-md-12" style="text-align: left;">
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

                                        <div class="form-floating" id="contNumFieldPlaceholder" style="display: none;">
                                            <input type="text" class="form-control" style="visibility: hidden;">
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

                        <?php
                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation End -->
        

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
                        <a class="btn btn-link" id="privacyLink" onclick="showPrivacyDialog()">Privacy Policy</a>
                        <a class="btn btn-link" id="termsLink" onclick="showTermsDialog()">Terms & Condition</a>
                    </div>

                    <dialog id="privacyDialog">
                        <button id="closePrivacyDialog" onclick="closePrivacyDialog()">&times;</button> <!-- Close "x" button -->
                        <h1>Privacy Policy for MiCasa Events</h1>
                        <h5>Effective Date: November 1, 2023</h5>
                        <br>
                        <hr>
                        <br>
                        <p><b>1. Introduction</b></p>
                        <p class="non-bold"> Welcome to MiCasa Events. At MiCasa Events, we are committed to protecting your privacy and ensuring 
                            the security of your personal information. This Privacy Policy explains how we collect, use, 
                            and safeguard your information when you use our services and visit our website.</p>

                        <p><b>2. Information We Collect</b></p>

                        <p class="non-bold">We may collect various types of information, including but not limited to:
                            <ul><i>Personal Information:</i> This includes your name, email address, phone number, and any other information you provide to us.</ul>
                            <ul><i>Information:</i> We collect data about your interactions with our website and services, including your IP address, browser type, and pages visited.</ul>
                            <ul><i>Cookies and Tracking Technologies:</i> We may use cookies and similar technologies to collect information about your browsing habits.</ul></p>
                            
                        <p><b>3. How We Use Your Information</b></p>
                        <p class="non-bold"> We use the information we collect for various purposes, including but not limited to:
                            <br>•Providing and improving our services.
                            <br>•Communicating with you.
                            <br>•Personalizing your experience.
                            <br>•Analyzing website usage and trends.</p>

                        <p><b>4. Disclosure of Your Information</b></p>
                        <p class="non-bold">We may share your information with third parties in certain circumstances, such as:
                            <ul><i>Providers:</i> We may use third-party service providers to assist in delivering our services.</ul>
                            <ul><i>Legal Obligations:</i> We may share your information if required by law or to protect our rights and interests.</ul></p>
                        
                        <p><b>5. Data Security</b></p>
                        <p class="non-bold"> We take measures to protect your information from unauthorized access, disclosure, or alteration. 
                            However, no method of transmission over the internet or electronic storage is completely secure, 
                            and we cannot guarantee absolute security.</p>
                                                
                        <p><b> 6. Your Choices</b></p>
                        <p class="non-bold">You have the right to access, correct, or delete your personal information. 
                            You can also opt-out of marketing communications at any time.</p>
                        
                        <p><b>7. Children's Privacy</b></p>
                        <p class="non-bold">Our services are not intended for individuals under the age of 18. 
                            We do not knowingly collect or store information from children.</p>

                        <p><b>8. Changes to This Privacy Policy</b></p>
                        <p class="non-bold">We may update this Privacy Policy from time to time. 
                            Please check back periodically to review any changes.</p>

                        <p><b>9. Contact Us</b></p>
                        <p class="non-bold">If you have questions or concerns about this Privacy Policy, please contact us at 09123456789.</p>
                    </dialog>

                    <dialog id="termsDialog">
                        <button id="closePrivacyDialog" onclick="closeTermsDialog()">&times;</button> <!-- Close "x" button -->
                        <h1>Terms and Conditions for MiCasa Events</h1>
                        <h6>Please read the following terms and conditions carefully before making a booking with MiCasa Events. 
                            By booking an event with us, you agree to abide by these terms and conditions.</h6>
                        <br>
                        <hr>
                        <br>
                        <p><b>1. Booking and Payment</b></p>
                        <p class="non-bold"> 1.1 <b>Downpayment:</b> A downpayment of 30% of the total event cost is required to secure your booking. The downpayment can be made through GCash, PayMaya, or credit and debit card.
                            <br><br>1.2. <b>Final Payment:</b> The remaining balance of the total event cost must be settled on the day of the event before the event begins.
                            <br><br>1.3. <b>Booking Lead Time:</b> Bookings must be made at least 2 weeks before the scheduled event date.</p>

                        <br><p><b>2. Overtime Charges</b></p>
                        <p class="non-bold">2.1. <b>Event Duration:</b> The booking time includes the set-up, event duration, and teardown. Any event exceeding the agreed-upon end time during booking will be subject to overtime charges.
                            <br><br>2.2. <b>Overtime Fees:</b> An additional 10% of the function room base price will be added for every hour or fraction thereof that the event goes overtime based on the selected end time during booking.</p>
                            
                        <br><p><b>3. Function Room Upgrades</b></p>
                        <p class="non-bold"> 3.1. <b>Package:</b> The prices quoted are for the base package. Any function room upgrades will result in an additional charge.
                            <br><br>3.2. <b>Upgrade Fee:</b> An additional 15% of the function room base price is added to the base package price for every function room upgrade.</p>

                        <br><p><b>4. Cancellation and Refunds</b></p>
                        <p class="non-bold">4.1. <b>Cancellation:</b> If you need to cancel your booking, please do so at least 2 weeks in advance to receive a full refund of the downpayment, minus a 10% processing fee.
                            <br><br>4.2. <b>Refund Policy:</b> Refunds for cancellations made within 2 weeks of the event date may be subject to a 10% processing fee, resulting in a 90% refund of the downpayment.</p>
                        
                        <br><p><b>5. House Rules</b></p>
                        <p class="non-bold">5.1. <b>Adherence to Rules:</b> Clients and guests are expected to adhere to the house rules and guidelines provided by MiCasa Events for a safe and enjoyable experience.
                            <br><br>5.2. <b>Liability:</b> MiCasa Events is not responsible for any loss or damage to personal property or injuries sustained during the event.</p>
                                                
                        <br><p><b>6. Contact Information</b></p>
                        <p class="non-bold">For any questions, concerns, or to make changes to your booking, please contact us at 09123456789 or email us at micasa.cosc75g2@gmail.com.
                            <br><br>By booking with MiCasa Events, you acknowledge that you have read and agreed to these terms and conditions.</p>
                    </dialog>

                    <script>
                        const privacyDialog = document.getElementById("privacyDialog");
                        const termsDialog = document.getElementById("termsDialog");

                        // Show the Privacy Policy dialog when the "Privacy Policy" link is clicked
                        function showPrivacyDialog() {
                            privacyDialog.showModal();
                        }

                        // Show the Terms and Conditions dialog when the "Terms & Conditions" link is clicked
                        function showTermsDialog() {
                            termsDialog.showModal();
                        }

                        // Close the Privacy Policy dialog when the "x" button is clicked
                        function closePrivacyDialog() {
                            privacyDialog.close();
                        }

                        // Close the Terms and Conditions dialog when the "x" button is clicked
                        function closeTermsDialog() {
                            termsDialog.close();
                        }
                    </script>

                    <div class="col-lg-4 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Carmona, Cavite, Philippines</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0912 345 6789</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>micasa.cosc75g2@gmail.com</p>
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

