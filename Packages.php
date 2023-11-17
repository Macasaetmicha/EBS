<?php 
 session_start();
?>

<head>
    <meta charset="utf-8">
    <title>Package | MiCasa Events</title>
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
    <link href="css/packages.css" rel="stylesheet">
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

        <!-- Packages Start -->
        <div class="container-xxl pt-5 pb-3">
            <button id="Top"><a href="#section-feature" style="color: white">^</a></button>

            <div class="container">
                <section id="section-feature" class="container wow fadeInUp" data-wow-delay="0.9s">
                    
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

                    <!-- Subpackages Start -->
                    <!-- Subpackages Header -->
                    <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                        <br/><br/><br/>
                        <h1 class="section-title ff-secondary text-center text-primary fw-normal">Wedding</h1>
                        <h5 class="mb-5">Packages</h5>
                    </div>                  
                    <!-- Wedding Subpackages Start -->
                    <div class="subpackage">
                        <div class="container">
                            <div class="subpackage__grid">
                                <!-- Intimate Wedding Subpackages -->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <!--<img src="img/Intimate_Wedding.jpg" />-->
                                        <div class="subpackage-card__title">Intimate</div>
                                        <div class="subpackage-card__price">Php 50, 000
                                            <span>/ 50 pax</span>
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of Function Room for 4 hours (Silver or Golden Ballroom)</li>
                                            <li>Use of Tiffany Chairs</li>
                                            <li>Table Setting and Physical Arrangement of the Area</li>
                                            <li>Use of Cake Table, Registration Table and Gift Table</li>
                                            <li>Use of Red Carpet</li>
                                            <li>Basic Sound System for Public Address and Background Music</li>
                                            <li>Full Bottle of Sparkling Wine for Ceremonial Toast</li>
                                            <li>Guest Book and Pen</li>
                                            <li>Use of Bubble Machine and Fog Machine</li>
                                            <li>Food Tasting for 2 persons</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Intimate Wedding Package End-->

                                <!-- Classic Wedding Package Start-->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <div class="subpackage-card__title">Classic</div>
                                        <div class="subpackage-card__price">Php 150, 000
                                            <span>/ 150 pax</span>
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of Function Room for 4 hours (Silver, Golden or Platinum Ballroom)</li>
                                            <li>Use of Tiffany Chairs</li>
                                            <li>Table Setting and Physical Arrangement of the Area</li>
                                            <li>Use of Cake Table, Registration Table and Gift Table</li>
                                            <li>Use of Red Carpet</li>
                                            <li>Basic Sound System for Public Address and Background Music</li>
                                            <li>Full Bottle of Sparkling Wine for Ceremonial Toast</li>
                                            <li>Guest Book and Pen</li>
                                            <li>Use of Bubble Machine and Fog Machine</li>
                                            <li>Food Tasting for 2 persons</li>
                                            <li>Photo booth</li>
                                            <li>Dedicated Professional Events Personnel to attend to your necessities</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Classic Wedding Package End-->

                                <!-- Deluxe Wedding Package Start-->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <div class="subpackage-card__title">Deluxe</div>
                                        <div class="subpackage-card__price">Php 200, 000
                                            <span>/ 200 pax</span>
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of Function Room for 4 hours (Diamond Ballroom)</li>
                                            <li>Use of Tiffany Chairs</li>
                                            <li>Table Setting and Physical Arrangement of the Area</li>
                                            <li>Use of Cake Table, Registration Table and Gift Table</li>
                                            <li>Use of Red Carpet</li>
                                            <li>Basic Sound System for Public Address and Background Music</li>
                                            <li>Full Bottle of Sparkling Wine for Ceremonial Toast</li>
                                            <li>Guest Book and Pen</li>
                                            <li>Use of Bubble Machine and Fog Machine</li>
                                            <li>Food Tasting for 2 persons</li>
                                            <li>Photo booth</li>
                                            <li>Dedicated Professional Events Personnel to attend to your necessities</li>
                                        </ul>
                                    </div>
                                    <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                </div>
                                <!-- Deluxe Wedding Package End-->
                            </div>
                        </div>

                        <!-- Birthday Subpackages Start-->
                        <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                            <br/><br/><br/>
                            <h1 class="section-title ff-secondary text-center text-primary fw-normal">Birthday</h1>
                            <h5 class="mb-5">Packages</h5>
                        </div> 
                        <div class="subpackage">
                        <div class="container">
                            <div class="subpackage__grid">
                                <!-- Kiddie Birthday Subpackage -->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <!--<img src="img/Intimate_Wedding.jpg" />-->
                                        <div class="subpackage-card__title">Kiddie</div>
                                        <div class="subpackage-card__price">Php 90, 000
                                            <span>/ 50 Adults and 25 Kids</span>
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of private function room for 4 hours (Golden or Platinum Ballroom)</li>
                                            <li>Banquet set-up according to your color motif</li>
                                            <li>Party host and magician</li>
                                            <li>Balloon twisting show</li>
                                            <li>Balloon arrangements: 10pcs. Hanging balloons, Table centerpieces, Cake ark and 2</li>
                                            <li>Balloon pillars</li>
                                            <li>Bubble machine</li>
                                            <li>Basic sound system for public address and background music</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Kiddie Birthday Package End-->

                                <!-- Debut Birthday Package Start-->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <div class="subpackage-card__title">Debut</div>
                                        <div class="subpackage-card__price">Php 175, 000
                                            <span>/ 120 pax</span>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of Function Room for 4 hours (Silver, Golden or Platinum Ballroom)</li>
                                            <li>Use of tiffany chairs and red carpet</li>
                                            <li>Banquet set-up according to your color motif</li>
                                            <li>Floral centerpieces for presidential, buffet, and guest tables</li>
                                            <li>18 Roses and 18 Candles</li>
                                            <li>Photobooth</li>
                                            <li>Tarpaulin</li>
                                            <li>Bubble machine and fog machine</li>
                                            <li>Food tasting for two persons</li>
                                            <li>Basic sound system for public address and background music</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Debut Birthday Package End-->

                                <!-- Basic Birthday Package Start-->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <div class="subpackage-card__title">Basic</div>
                                        <div class="subpackage-card__price">Php 100, 000
                                            <span>/ 100 pax</span>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of private function room for 4 hours (Silver or Golden Ballroom)</li>
                                            <li>Use of tiffany chairs and red carpet</li>
                                            <li>Photobooth</li>
                                            <li>Tarpaulin</li>
                                            <li>Bubble machine and fog machine</li>
                                            <li>Food tasting for two persons</li>
                                            <li>Basic sound system for public address and background music</li>
                                        </ul>
                                    </div>
                                    <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                </div>
                                <!-- Basic Birthday Package End-->
                            </div>
                        </div>
                        <!-- Birthday Subpackages End-->

                        <!-- Occasion Celebration Packages Start -->
                        <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                            <br/><br/><br/><br/>
                            <h1 class="section-title ff-secondary text-center text-primary fw-normal">All Occasions Celebration</h1>
                            <h5 class="mb-5">Packages</h5>
                        </div> 
                        <div class="subpackage">
                        <div class="container">
                            <div class="subpackage__grid">
                                <!-- Package A Celebration Subpackage Start -->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <!--<img src="img/Intimate_Wedding.jpg" />-->
                                        <div class="subpackage-card__title">Package A</div>
                                        <div class="subpackage-card__price">Php 40, 000
                                            <span>/ 50 pax</span>
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of private function room for 4 hours (Silver or Golden Ballroom)</li>
                                            <li>Use of tiffany chairs and red carpet</li>
                                            <li>Food tasting for two persons</li>
                                            <li>Basic sound system for public address and background music</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Package A Celebration Subpackage End-->

                                <!-- Package B Celebration Subpackage Start-->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <div class="subpackage-card__title">Package B</div>
                                        <div class="subpackage-card__price">Php 75, 000
                                            <span>/ 100 pax</span>
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li>Use of private function room for 4 hours (Platinum or Diamond Ballroom)</li>
                                            <li>Use of tiffany chairs and red carpet</li>
                                            <li>Food tasting for two persons</li>
                                            <li>Basic sound system for public address and background music</li>
                                            <li>Photobooth</li>
                                            <li>Tarpaulin</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Package B Celebration Subpackage End-->
                            </div>
                        </div>
                        <!-- Occassion Celebration Packages End -->

                        <!-- Function Room Packages Start -->
                        <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                            <br/><br/><br/><br/>
                            <h1 class="section-title ff-secondary text-center text-primary fw-normal">Function Room</h1>
                            <h5 class="mb-5">Packages</h5>
                        </div> 
                        <div class="subpackage">
                        <div class="container">
                            <div class="subpackage__grid">
                                <!-- Silver Ballroom Start -->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <!--<img src="img/Intimate_Wedding.jpg" />-->
                                        <div class="subpackage-card__title">Silver Ballroom</div>
                                        <div class="subpackage-card__price">
                                            <span>Base Price: </span> Php 20, 000
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li class = "room">Area: 150 sqm</li>
                                            <li class = "room">Capacity: 50 persons</li>
                                            <li class = "room">Time Limit: 4 hours</li>
                                            <li class = "room">Overtime Additional Fee: Php 2, 000/hr.</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Silver Ballroom End-->

                                <!-- Golden Ballroom Start -->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <!--<img src="img/Intimate_Wedding.jpg" />-->
                                        <div class="subpackage-card__title">Golden Ballroom</div>
                                        <div class="subpackage-card__price">
                                            <span>Base Price: </span> Php 40, 000
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li class = "room">Area: 180 sqm</li>
                                            <li class = "room">Capacity: 100 persons</li>
                                            <li class = "room">Time Limit: 4 hours</li>
                                            <li class = "room">Overtime Additional Fee: Php 4, 000/hr.</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Golden Ballroom End-->

                                </div>
                                </div>
                                </div>
                                
                                <div class="subpackage">
                                <div class="container">
                                    <div class="subpackage__grid">
                                <!-- Platinum Ballroom Start -->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <!--<img src="img/Intimate_Wedding.jpg" />-->
                                        <div class="subpackage-card__title">Platinum Ballroom</div>
                                        <div class="subpackage-card__price">
                                            <span>Base Price: </span> Php 60, 000
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li class = "room">Area: 200 sqm</li>
                                            <li class = "room">Capacity: 150 persons</li>
                                            <li class = "room">Time Limit: 4 hours</li>
                                            <li class = "room">Overtime Additional Fee: Php 6, 000/hr.</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Platinum Ballroom End-->

                                <!-- Diamond Ballroom Start -->
                                <div class="subpackage__card subpackage-card">
                                    <div class="subpackage-card__top">
                                        <!--<img src="img/Intimate_Wedding.jpg" />-->
                                        <div class="subpackage-card__title">Diamond Ballroom</div>
                                        <div class="subpackage-card__price">
                                            <span>Base Price: </span> Php 80, 000
                                        </div>
                                    </div>
                                    <div class="subpackage-card__body">
                                        <ul>
                                            <li class = "room">Area: 250 sqm</li>
                                            <li class = "room">Capacity: 200 persons</li>
                                            <li class = "room">Time Limit: 4 hours</li>
                                            <li class = "room">Overtime Additional Fee: Php 8, 000/hr.</li>
                                        </ul>
                                        <!--<div class="subpackage-card__button"><a href="">Select</a></div>-->
                                    </div>
                                </div>
                                <!-- Silver Ballroom End-->
                            </div>
                        </div>
                    </div>
                        <!-- Function Room Packages End -->
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Packages End -->

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

                    <!-- Subpackages Start -->
                    <!-- Subpackages Header -->
                    <div class="text-center wow fadeInDown" data-wow-delay="0.1s">
                        <br/><br/><br/>
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal">These Are Our</h5>
                        <h1 class="mb-5">Subpackages</h1>
                        <br/>
                    </div>
                    
                    <!-- new row-->
                    <div class="row g-4 justify-content-center package-m-fix" >

                        <!-- Intimate Wedding Subpackages -->
                        <div class="subpackage-card">
                            <div id="subpackage-card__cover" class="subpackage-card__cover">
                                <div class="subpackage-card__img">
                                <img
                                    src="img/Intimate_Wedding.jpg"
                                    alt="Birthday">
                                </div>
                                <div class="subpackage-card__cover-details">
                                    <div id="subpackage-card__pax" class="subpackage-card__pax">
                                    <br/>
                                    <p><span>50</span>pax</p>
                                </div>
                                <div id="subpackage-card__info" class="subpackage-card__info">
                                    <div class="subpackage-card__title">
                                    <h1>Intimate Package</h1>
                                    </div>
                                    <div class="subpackage-card__description">
                                    <p>Wonderful blueberry french toast subpackage to serve for your whole family!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="subpackage-card__content-container" class="subpackage-card__content-container">
                            <div class="subpackage-card__actions">
                                <ul>
                                    <li><a id="inclusionsTab" href="#" class="active">Php 50,000</a></li>
                                </ul>
                            </div>
                            <div id="subpackage-card__content--inclusions" class="subpackage-card__content subpackage-card__content--active">
                                <ul>
                                    <span>Inclusions:</span>
                                    <li>Use of Function Room for 4 hours (Silver or Golden Ballroom)</li>
                                    <li>Use of Tiffany Chairs</li>
                                    <li>Table Setting and Physical Arrangement of the Area</li>
                                    <li>Use of Cake Table,Registration Table and Gift Table</li>
                                    <li>Use of Red Carpet</li>
                                    <li>Basic Sound System for Public Address and Background Music</li>
                                    <li>Full Bottle of Sparkling Wine for Ceremonial Toast</li>
                                    <li>Guest Book and Pen</li>
                                    <li>Use of Bubble Machine and Fog Machine</li>
                                    <li>Food Tasting for 2 persons</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Intimate Wedding Package End-->
                    </div>                    
                    
                    <!-- Subpackages End -->

                    <div class="pricing">
  <div class="container">
    <div class="pricing__grid">
      <div class="pricing__card pricing-card">
        <div class="pricing-card__top">
        <div class="pricing-card__img"><img
                                    src="img/Intimate_Wedding.jpg"
                                    alt="Birthday"></div>
          <div class="pricing-card__title">Intimate</div>
          <div class="pricing-card__price">Php 50, 000<span>/ 50 pax</span></div>
        </div>
        <div class="pricing-card__body">
          
              <ul>
              <li>Use of Function Room for 4 hours (Silver or Golden Ballroom)</li>
                                    <li>Use of Tiffany Chairs</li>
                                    <li>Table Setting and Physical Arrangement of the Area</li>
                                    <li>Use of Cake Table, Registration Table and Gift Table</li>
                                    <li>Use of Red Carpet</li>
                                    <li>Basic Sound System for Public Address and Background Music</li>
                                    <li>Full Bottle of Sparkling Wine for Ceremonial Toast</li>
                                    <li>Guest Book and Pen</li>
                                    <li>Use of Bubble Machine and Fog Machine</li>
                                    <li>Food Tasting for 2 persons</li>
              </ul>
          <div class="pricing-card__button"><a href="">Select</a></div>
        </div>
      </div>
      <div class="pricing__card pricing-card">
        <div class="pricing-card__top">
          <div class="pricing-card__title">Classic</div>
          <div class="pricing-card__price">Php 150, 000<span>/ 150 pax</span></div>
        </div>
        <div class="pricing-card__body">
          <ul>
                                    <li>Use of Function Room for 4 hours (Silver, Golden or Platinum Ballroom)</li>
                                    <li>Use of Tiffany Chairs</li>
                                    <li>Table Setting and Physical Arrangement of the Area</li>
                                    <li>Use of Cake Table, Registration Table and Gift Table</li>
                                    <li>Use of Red Carpet</li>
                                    <li>Basic Sound System for Public Address and Background Music</li>
                                    <li>Full Bottle of Sparkling Wine for Ceremonial Toast</li>
                                    <li>Guest Book and Pen</li>
                                    <li>Use of Bubble Machine and Fog Machine</li>
                                    <li>Food Tasting for 2 persons</li>
                                    <li>Photo booth</li>
                                    <li>Dedicated Professional Events Personnel to attend to your necessities</li>
                                </ul>
          <div class="pricing-card__button"><a href="">Select</a></div>
        </div>
      </div>
      <div class="pricing__card pricing-card">
        <div class="pricing-card__top">
          <div class="pricing-card__title">Deluxe</div>
          <div class="pricing-card__price">Php 200, 000<span>/ 200 pax</span></div>
        </div>
        <div class="pricing-card__body">
        <ul>
                                    <li>Use of Function Room for 4 hours (Diamond Ballroom)</li>
                                    <li>Use of Tiffany Chairs</li>
                                    <li>Table Setting and Physical Arrangement of the Area</li>
                                    <li>Use of Cake Table, Registration Table and Gift Table</li>
                                    <li>Use of Red Carpet</li>
                                    <li>Basic Sound System for Public Address and Background Music</li>
                                    <li>Full Bottle of Sparkling Wine for Ceremonial Toast</li>
                                    <li>Guest Book and Pen</li>
                                    <li>Use of Bubble Machine and Fog Machine</li>
                                    <li>Food Tasting for 2 persons</li>
                                    <li>Photo booth</li>
                                    <li>Dedicated Professional Events Personnel to attend to your necessities</li>
                                </ul>
          </div>
          <div class="pricing-card__button"><a href="">Select</a></div>
        </div>
      </div>
    </div>
  </div>
</div>


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