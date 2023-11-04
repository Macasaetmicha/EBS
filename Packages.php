<?php 
 session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Packages</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Packages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Event Start -->
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
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Packages</h5>
                        <h1 class="mb-4"><i class="fa fa-envelope text-primary me-2"></i>Welcome to Event Booking Management</h1>
                        <p class="mb-4">No matter what stage of the event process you’re in, we offer a complete set of tools that’s flexible enough to work with your event program. From small meetings, large conferences or internal meetings, we’ve got you covered</p>

                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event End -->

        <!-- Packages Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">This Is Our</h5>
                    <h1 class="mb-5">Packages</h1>
                </div>
                <section id="section-feature" class="container wow fadeInUp" data-wow-delay="0.1s">
                    
                    <!-- new row-->
                    <div class="row g-4 justify-content-center package-m-fix" >
                
                        <!-- Weddings -->
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="sf-wrap">
                                <div class="sf-mdl-left">
                                    <div class="wed-bg">
                                        <img src="img/wedding.jpg" alt="">
                                    </div>
                                    <h3>Weddings</h3>
                                </div>
                                <div class="sf-mdl-right">
                                    <div class="sf-icon">
                                        <i class="fa fa-fw fa-regular fa-rings-weddings fa-4x"></i>
                                    </div>
                                    <h3>Weddings</h3>
                                </div>
                                <div class="sf-mdl-left-full">
                                    <h3>Weddings</h3>
                                    <p>Elevate your wedding day with our all-inclusive package, featuring a stunning venue, custom menu, and personalized decor for a truly unforgettable experience.</p>
                                </div>
                                <div class="sf-mdl-right-full">
                                    <h3><a>Weddings</a></h3>
                                    <p>Elevate your wedding day with our all-inclusive package, featuring a stunning venue, custom menu, and personalized decor for a truly unforgettable experience.</p>
                                </div>
                            </div>
                        </li>

                        <!-- Birthdays -->
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="sf-wrap">
                                <div class="sf-mdl-left">
                                    <div class="bday-bg">
                                        <img src="img/BIRTHDAYS.jpg" alt="">
                                    </div>
                                    <h3>Birthdays</h3>
                                </div>
                                <div class="sf-mdl-right">
                                    <h3>Birthdays</h3>
                                </div>
                                <div class="sf-mdl-left-full">
                                    <h3>Birthdays</h3>
                                    <p>Transform your birthday celebration with our customizable packages, offering themed decor, delectable catering, and entertainment to create an unforgettable party experience for all ages.</p>
                                </div>
                                <div class="sf-mdl-right-full">
                                    <h3>Birthdays</h3>
                                    <p>Transform your birthday celebration with our customizable packages, offering themed decor, delectable catering, and entertainment to create an unforgettable party experience for all ages.</p>
                                </div>
                            </div>
                        </li>
                        <!-- All Occasions -->
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="sf-wrap">
                                <div class="sf-mdl-left">
                                    <div class="g-bg">
                                        <img src="img/gatherings.jpg" alt="">
                                    </div>
                                    <h3>All Occasions</h3>
                                </div>
                                <div class="sf-mdl-right">
                                    <h3>All Occasions</h3>
                                </div>
                                <div class="sf-mdl-left-full">
                                    <h3>All Occasions</h3>
                                    <p>Make any occasion extraordinary with our all-inclusive event packages, offering versatile venues, expert planning, and personalized details to ensure unforgettable moments.</p>
                                </div>
                                <div class="sf-mdl-right-full">
                                    <h3>All Occasions</h3>
                                    <p>Make any occasion extraordinary with our all-inclusive event packages, offering versatile venues, expert planning, and personalized details to ensure unforgettable moments.</p>
                                </div>
                            </div>
                        </li>

                        <!-- Function Rooms -->
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="sf-wrap">
                                <div class="sf-mdl-left">
                                    <div class="rooms-bg">
                                        <img src="img/rooms.jpg" alt="">
                                    </div>
                                    <h3>Function Rooms</h3>
                                </div>
                                <div class="sf-mdl-right">
                                    <h3>Function Rooms</h3>
                                </div>
                                <div class="sf-mdl-left-full">
                                    <h3>Function Rooms</h3>
                                    <p>Our function rooms provide a versatile and elegant space to host events, from corporate meetings to social gatherings, offering the ideal setting for a wide range of occasions.</p>
                                </div>
                                <div class="sf-mdl-right-full">
                                    <h3>Function Rooms</h3>
                                    <p>Our function rooms provide a versatile and elegant space to host events, from corporate meetings to social gatherings, offering the ideal setting for a wide range of occasions.</p>
                                </div>
                            </div>
                        </li>
                    </div> 
                </section>
            </div>
        </div>
        <!-- Team End -->

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
                            <h5 class="text-light fw-normal">Monday - Saturday</h5>                                        <p>08AM - 05PM</p>
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