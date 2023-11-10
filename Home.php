<?php 
 session_start();
?>

<head>
    <meta charset="utf-8">
    <title>Mi Casa Events Place</title>
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

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0">
                        <i class="fa fa-duotone fa-calendar me-3"></i>Mi Casa</h1>
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
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 text-center text-lg-start">
                    <?php

                        if (isset($_SESSION['email'])) {
                            // Access the 'email' session variable
                            $email = $_SESSION['email'];

                            include 'connection.php';

                            //retrieves data from specified table where email is the same as email entered.
                            $querry = "SELECT * FROM logcredentials WHERE email = '$email'";
                            //sets the retrieved data as $result
                            $result = mysqli_query($con,$querry);

                            //check if there are 0 rows in result, meaning no email match
                            if(mysqli_num_rows($result)<=0) 
                            {
                                //if there are 0
                                echo '<h1 class="display-3 text-white animated slideInLeft">Welcome!</h1>';
                            }
                            else
                            {
                                //check now for password y getting the row in result 
                                $row = mysqli_fetch_array($result);
                                //checks if password matches with password retrieved in db
                                if($email==$row['email'])
                                {
                                    echo '<h1 class="display-3 text-white animated slideInLeft">Welcome ' . $row['username'] . '!</h1>';
            
                                }
                            }
                        } else {
                            echo '<h1 class="display-3 text-white animated slideInLeft">Welcome!</h1>';
                        }
                    ?>
                        <h1 class="display-3 text-white animated slideInLeft">Enjoy your Special Day</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <a href="Booking.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Save the Date</a>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                        <img class="img-fluid" src="img/circlee.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Services Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h5>Offers</h5>
                            <p>I got front row seats for the park side livin'
                                Feel like the one but I'm one in a billion</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-envelope text-primary mb-4"></i>
                            <h5>Offers</h5>
                            <p>Teenage cynical and I don't really know
                                What's the point of living if my heart gets broken?</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                            <h5>Offers</h5>
                            <p>Driving on the road, waiting for head-on collision
                                Springtime funeral, I miss you but I'd rather be alone</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h5>Offers</h5>
                            <p>To keep me from Heartbreaks, headaches The doctor says I'm diagnosed with Shit days, mistakes But I'll be fine But I'll be fine</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
 
    <!-- Slideshow Start -->
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Venues</h5>
            <h1 class="mb-5">Look Around Our Venues</h1>
        </div>
    <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
        <ul class="image-list">
        <img class="image-item" src="img/img-1.jpg" alt="img-1" />
        <img class="image-item" src="img/img-2.jpg" alt="img-2" />
        <img class="image-item" src="img/img-3.jpg" alt="img-3" />
        <img class="image-item" src="img/img-4.jpg" alt="img-4" />
        <img class="image-item" src="img/img-5.jpg" alt="img-5" />
        <img class="image-item" src="img/img-6.jpg" alt="img-6" />
        <img class="image-item" src="img/img-7.jpg" alt="img-7" />
        <img class="image-item" src="img/img-8.jpg" alt="img-8" />
        <img class="image-item" src="img/img-9.jpg" alt="img-9" />
        <img class="image-item" src="img/img-10.jpg" alt="img-10" />
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
    </div>
    <div class="slider-scrollbar">
        <div class="scrollbar-track">
        <div class="scrollbar-thumb"></div>
        </div>
    </div>
    </div>
    <!-- Slideshow End -->
    
    <!-- About Us Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Learn About Us</h5>
                    <h1 class="mb-4">Welcome to <i class="fa fa-envelope text-primary me-2"></i>MiCasa Events</h1>
                    <p class="mb-4">'Cause you're my painkiller When my brain gets bitter You keep me close When I've been miserable And it takes forever To let my brain get better You keep me close You keep me close
                        </p>
                    <p class="mb-4">Window seats as the plane starts leavin' Miss those streets where my knees were bleedin' Homesick veteran I left my bed again</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">147</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Years Since</p>
                                    <h6 class="text-uppercase mb-0">Establish</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">17089</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Events</p>
                                    <h6 class="text-uppercase mb-0">Done</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="booking.html">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->

    <!-- Team Start -->
    <div class="container-xxl pt-5 pb-3">
        <div class="container">
            <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">This Is Our</h5>
                <h1 class="mb-5">Packages</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" onclick="showPopup('For Wedding ',' Details for it.')">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="criteria" src="img/wedding.jpg" alt="">
                        </div>
                        <h5 class="mb-0">For Wedding</h5>
                        <small>Designation</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s" onclick="showPopup('For Birthdays ',' Details for it.')">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="criteria" src="img\BIRTHDAYS.jpg" alt="image" class="flip">
                        </div>
                        <h5 class="mb-0">For Birthdays</h5>
                        <small>Designation</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s" onclick="showPopup('For Gatherings ',' Details for it.')">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="criteria" src="img/gatherings.jpeg" alt="">
                        </div>
                        <h5 class="mb-0">Gatherings</h5>
                        <small>Designation</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s" onclick="showPopup('For Rooms ',' Details for it.')">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="criteria" src="img/rooms.jpg">
                        </div>
                        <h5 class="mb-3">Rooms</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- try animation -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2 id="popup-title">Package Title</h2>
            <p id="popup-description">Package Description</p>
        </div>
    </div>

    <script>
        function showPopup(title, description) {
            var popup = document.getElementById("popup");
            var popupTitle = document.getElementById("popup-title");
            var popupDescription = document.getElementById("popup-description");

            popup.style.display = "flex";
            popupTitle.textContent = title;
            popupDescription.textContent = description;
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }
    </script>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Feedbacks</h5>
                <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Ang Gandaaa </p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Sir Nortz</h5>
                            <small>Sir DCIT</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Sheeeeeeeeeeeeeeeeeeeeeeesh</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Sir Hugo</h5>
                            <small>Sir COSC</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Calcu'laaaaaa'ted</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Sir Bayan</h5>
                            <small>Sir Math</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Grabe ang bilis</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Sir Opella</h5>
                            <small>Sir of the Sir</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Javascript to display booking success -->
    <<script>
        // Check if a success message was passed in the URL
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('message')) {
            var successMessage = urlParams.get('message');
            Swal.fire({
                title: 'Success',
                text: successMessage,
                icon: 'success',
                confirmButtonText: 'OK'
            });
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>
</html>