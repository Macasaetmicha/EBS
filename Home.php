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
                                <img class="img-fluid" src="img/hero.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Navbar & Hero End -->

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>
</html>