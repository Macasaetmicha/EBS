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
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                    <?php
                        if (!isset($_SESSION['email'])) {
                            // User is not logged in, display a message
                            echo '<h1 class="text-white mb-4">Oops!</h1>';
                            echo '<p class="text-warning">It looks like you are not logged in. To continue with your booking please <a href="signin.php">log into your account</a>.
                            <br><br>Don\'t have one? Thats all right, click the button below to get started.</p>';
                            echo '<a href="signup.php" class="btn btn-primary py-2 px-4">Sign Up</a>';
                        } else {
                        ?>
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Step 1</h5>
                            <h2 class="text-white mb-4">Tell us about your Event:</h2>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="pk" required>
                                                <option value="sp">Select Package</option>
                                                <option value="wd" disabled>Wedding</option>
                                                <option value="ip">Intimate Package</option>
                                                <option value="cp">Classic Package</option>
                                                <option value="dp">Deluxe Package</option>
                                                <option value="bd" disabled>Birthday</option>
                                                <option value="kp">Kiddie Package</option>
                                                <option value="dp">Debut Package</option>
                                                <option value="bp">Basic Package</option>
                                                <option value="ao" disabled>All Occassion</option>
                                                <option value="pA">Package A</option>
                                                <option value="pB">Package B</option>
                                                <option value="frm">Function Room</option>
                                            </select>
                                            <label for="pk">Package</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="fr" required>
                                                <option value="sb">Select Ballroom</option>
                                                <option value="sb">Silver Ballroom</option>
                                                <option value="gb">Golden Ballroom</option>
                                                <option value="pb">Platinum Ballroom</option>
                                                <option value="db">Diamond Ballroom</option>
                                            </select>
                                            <label for="fr">Function Room</label>
                                        </div>
                                    </div>
                                    <div class="col-md-13">
                                        <div class="hidden" id="field1">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="event" placeholder="Event Name" required>
                                                <label for="event">Event Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="number" placeholder="No. Of Guests" required>
                                            <label for="number">No Of Guests</label>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date" data-target-input="nearest">
                                            <input type="date" class="form-control" id="date" placeholder="Date" required>
                                            <label for="date">Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating time" data-target-input="nearest">
                                            <input type="time" class="form-control" id="timestart" placeholder="Start Time" required>
                                            <label for="timestart">Start Time</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating time" data-target-input="nearest">
                                            <input type="time" class="form-control" id="endtime" placeholder="End Time" required>
                                            <label for="endtime">End Time</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Next</button>
                                    </div>
                                </div>
                            </form>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation End -->

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

