<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>watchesluxury</title>


    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

    <div class="hero_area">

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
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="watches.php"> Watches <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html"> About </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
                            </li>
                            <li class="nav-item">
                <a class="nav-link" href="logout.php "> Logout</a>
            </li>
                        </ul>
                        <div class="user_option-box">
                            <a href="">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <a href="">
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
    </div>

    <!-- shop section -->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Watches
                </h2>
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
                                        <h6><?php echo isset($product['description']) ? $product['description'] : ''; ?></h6>
                                    </div>
                                    <div class="detail-box">
                                    
                                        <h6><?php echo isset($product['product_name']) ? $product['product_name'] : ''; ?></h6>
                                        <h6>Price: <span><?php echo isset($product['cost']) ? $product['cost'] : ''; ?></span></h6>
                                    </div>
                                    <div class="new">
                                        <span><?php echo isset($product['color']) ? $product['color'] : ''; ?></span>
                                    </div>
                                </a>
                                <div class="add-to-cart-button">
                                    <a href="add_to_cart.php?product_id=<?php echo isset($product['id']) ? $product['id'] : ''; ?>" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No products available</p>";
                }
                ?>
            </div>
    </section>

    <!-- end shop section -->

    <!-- footer section -->
    <footer class="footer_section">
        <!-- footer content -->
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->

</body>

</html>
