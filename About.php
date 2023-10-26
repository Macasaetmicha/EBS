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
                            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center text-uppercase">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Navbar & Hero End -->

                <!-- About Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <div class="col-6 text-start">
                                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/cathedral-8318952_1280.jpg">
                                    </div>
                                    <div class="col-6 text-start">
                                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/cathedral-8318952_1280.jpg" style="margin-top: 25%;">
                                    </div>
                                    <div class="col-6 text-end">
                                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/cathedral-8318952_1280.jpg">
                                    </div>
                                    <div class="col-6 text-end">
                                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/cathedral-8318952_1280.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                                <h1 class="mb-4">Welcome to <i class="fa fa-duotone fa-calendar me-3"></i>Events</h1>
                                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
                                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                                <div class="row g-4 mb-4">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">3</h1>
                                            <div class="ps-4">
                                                <p class="mb-0">Years of</p>
                                                <h6 class="text-uppercase mb-0">Experience</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                            <div class="ps-4">
                                                <p class="mb-0">Popular</p>
                                                <h6 class="text-uppercase mb-0">Event Managers</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About End -->

                <!-- Contact Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
                            <h1 class="mb-5">Contact For Any Query</h1>
                        </div>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="row gy-4">
                                    <div class="col-md-4">
                                        <h5 class="section-title ff-secondary fw-normal text-start text-primary">Email</h5>
                                        <p><i class="fa fa-envelope-open text-primary me-2"></i>events@gmail.com</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="section-title ff-secondary fw-normal text-start text-primary">Contact Number</h5>
                                        <p><i class="fa fa-envelope-open text-primary me-2"></i>0912 345 6789</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="section-title ff-secondary fw-normal text-start text-primary">Location</h5>
                                        <p><i class="fa fa-envelope-open text-primary me-2"></i>123 Carmona, Cavite, Philippines</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                                <iframe class="position-relative rounded w-100 h-100"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61858.66856026581!2d120.99866447258962!3d14.301740189359906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d62d43154f47%3A0x99eec5769bb55684!2sCarmona%2C%20Cavite!5e0!3m2!1sen!2sph!4v1698229935521!5m2!1sen!2sph" width="600" height="450" style="border:0;"
                                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                                    tabindex="0"></iframe>
                            </div>
                            <div class="col-md-6">
                                <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <?php
                                    if (!isset($_SESSION['email'])) {
                                        echo '<form>';
                                        echo '<div class="row g-3">';
                                        echo '<div class="col-md-6">';
                                        echo '<div class="form-floating">';
                                        echo '<input type="text" class="form-control" id="name" placeholder="Your Name">';
                                        echo '<label for="name">Your Name</label>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<div class="form-floating">';
                                        echo '<input type="email" class="form-control" id="email" placeholder="Your Email">';
                                        echo '<label for="email">Your Email</label>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-12">';
                                        echo '<div class="form-floating">';
                                        echo '<input type="text" class="form-control" id="subject" placeholder="Subject">';
                                        echo '<label for="subject">Subject</label>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-12">';
                                        echo '<div class="form-floating">';
                                        echo '<textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>';
                                        echo '<label for="message">Message</label>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-12">';
                                        echo '<button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</form>';
                                    } else {
                                        // User is logged in, display the reservation form
                                    ?>

                                    <form>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                                    <label for="name">Your Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                                    <label for="email">Your Email</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                                    <label for="datetime">Date & Time</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select" id="select1">
                                                    <option value="1">People 1</option>
                                                    <option value="2">People 2</option>
                                                    <option value="3">People 3</option>
                                                    </select>
                                                    <label for="select1">No Of People</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                                    <label for="message">Special Request</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
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
                </div>
                <!-- Contact End -->

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