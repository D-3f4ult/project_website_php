<?php
            session_start();

            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
                exit;
            }
            if(isset($_SESSION['cart_message'])) {
                echo $_SESSION['cart_message'];
                unset($_SESSION['cart_message']);
}
            ?>
<!DOCTYPE html>  
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>watchlucury</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <div class="hero_social">
            <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="home.php">
                        <span>
                        watchesluxury
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="watches.php"> Watches </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html"> About </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">log out</a>
                            </li>
                        </ul>
                        <div class="user_option-box">
                            <a href="profile_user.php">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <a href="shoping_cart.php">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Smart Watches
                                        </h1>
                                        <p>
                                        Smart Timepieces Emporium: Elevate Your Style with Intelligence                                        </p>
                                        <div class="btn-box">
                                            <a href="contact.html" class="btn1">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="images/about-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Smart Watches
                                        </h1>
                                        <p>
                                            welcome on the luxury watch 
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="images/slider-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Smart Watches
                                        </h1>
                                        <p>
                                        Exclusive Watches Only at Our Store                                        </p>
                                        <div class="btn-box">
                                            <a href="contact.html" class="btn1">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="images/w1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </section>
        <!-- end slider section -->
    </div>
    <!-- shop section -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Watches</h2>
            </div>
            <div class="row">
                <?php
                include_once 'prod.php'; 
                
                if ($products) {
                    foreach ($products as $product) {
                        ?>
                        <div class="col-md-6">
                            <div class="box">
                                <a href="#">
                                    <div class="img-box">
                                        <img src="<?php echo isset($product['image']) ? $product['image'] : ''; ?>" alt="<?php echo isset($product['product_name']) ? $product['product_name'] : ''; ?>" class="img-fluid">
                                    </div>
                                    <div class="detail-box">
                                        <h6><?php echo isset($product['product_name']) ? $product['product_name'] : ''; ?></h6>
                                        <h6>Price: <span><?php echo isset($product['cost']) ? $product['cost'] : ''; ?></span></h6>
                                        <?php if ($product['stock_quantity'] <= 0) : ?>
                                            <p style="color: red;">Out of Stock</p>
                                        <?php else : ?>
                                            <p><?php echo isset($product['color']) ? $product['color'] : ''; ?></p>
                                            <div class="add-to-cart-button">
                                                <a href="add_to_cart.php?product_id=<?php echo isset($product['id']) ? $product['id'] : ''; ?>" class="btn btn-primary">Add to Cart</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No products available</p>";
                }
                ?>
            </div>
            <div class="btn-box">
                <a href="watches.php">View All</a>
            </div>
        </div>
    </section>
    <!-- End shop section -->
    <section class="about_section layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6 col-lg-5 ">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-7">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>
                        Welcome to [luxury watch], where time meets elegance. Established with a passion for horology, we pride ourselves on offering an exquisite selection of timepieces that cater to every style and occasion.

At [luxury watch], we understand the significance of a watch beyond its functionality. It's a reflection of one's personality and taste. Whether you're seeking a classic timepiece for formal events or a cutting-edge smartwatch for your active lifestyle, we have something for everyone.

Our commitment to quality is unwavering. Each watch in our collection is meticulously curated from renowned brands and trusted manufacturers, ensuring durability, precision, and timeless style. With our expert guidance, you can find the perfect watch that not only complements your look but also becomes a cherished companion for years to come.

But [luxury watch] is more than just a destination for exquisite watches. It's a place where passion for craftsmanship and dedication to customer satisfaction converge. Our knowledgeable staff is here to assist you every step of the way, providing personalized recommendations and unparalleled service.

We invite you to explore our curated collection and experience the luxury of timekeeping redefined. Thank you for choosing [luxury watch], where every moment counts.
                        </p>
                        <a href="about.html">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    <!-- feature section -->
    <section class="feature_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Features Of Our Watches
                </h2>
                <p>
                    Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Fitness Tracking
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Alerts & Notifications
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Messages
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/f4.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Bluetooth
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            </p>
                            <a href="">
                                <span>
                                    Read More
                                </span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div>
        </div>
    </section>
    <!-- end feature section -->
    <!-- contact section -->
    <section class="contact_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <div class="heading_container">
                            <h2>
                                Contact Us
                            </h2>
                        </div>
                        <form action="">
                            <div>
                                <input type="text" placeholder="Full Name " />
                            </div>
                            <div>
                                <input type="email" placeholder="Email" />
                            </div>
                            <div>
                                <input type="text" placeholder="Phone number" />
                            </div>
                            <div>
                                <input type="text" class="message-box" placeholder="Message" />
                            </div>
                            <div class="d-flex ">
                                <button>
                                    SEND
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/contact-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->
    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center ">
                <h2>
                    Testimonial
                </h2>
                <p>
                    Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
            <div id="customCarousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="box">
                            <div class="detail-box">
                                <div class="img-box">
                                    <img src="images/c1.png" alt="">
                                </div>
                                <p>
                                Welcome to my project and give me your rating
                                </p>
                                <h5>
                                    alaa shkhaidem
                                </h5>
                                <h6>
                                    <span>Designer</span>, Creative Works
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="box">
                            <div class="detail-box">
                                <div class="img-box">
                                    <img src="images/c2.png" alt="">
                                </div>
                                <p>
                                This isn't the next best thing
                                </p>
                                <h5>
                                alaa shkhaidem
                                </h5>
                                <h6>
                                    <span>Designer</span>, Creative Works
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel2" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel2" data-slide-to="1"></li>
                </ol>
            </div>
        </div>
    </section>
    <!-- end client section -->
    <!-- footer section -->
    <section class="container-fluid footer_section ">
        <div class="container">
            <div class="footer_logo">
                <a href="">
                    <span>
                        luxury watch
                    </span>
                </a>
            </div>
            <div class="footer_social">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </div>
            <div class="footer_menu">
                <ul>
                    <li>
                        <a href="home.php"> Home</a>
                    </li>
                    <li>
                        <a href="watches.php"> Watches</a>
                    </li>
                    <li>
                        <a href="about.html"> About</a>
                    </li>
                    <li>
                        <a href="contact.html"> Contact Us</a>
                    </li>
                    <li>
                        <a href="logout.php"> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/"> alaa </a>
            </p>
        </div>
    </section>
    <!-- footer section -->
    <!-- jQery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    
</body>

</html>
