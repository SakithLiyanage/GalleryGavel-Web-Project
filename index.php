<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home || GalleryGavel</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="images/fav-01-01.png">
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'config.php';

    // Default query to select all artwork
    $query = "SELECT * FROM artwork";
    $result = mysqli_query($con, $query);

    // Fetch all rows from the result set and store them in an array
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    ?>
    <!--Nav bar-->
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><a href="#"><img src="images/logo.png" alt="" width="10%"></a></div>
            <ul>
                <li><a href="#" class="active-home">Home</a></li>
                <li><a href="auction.php">Auction</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="loginform.php">Contact Us</a></li>
                <a href="loginform.php"><button class="btn1">LOG IN</button></a>
                <a href="registerform.php"><button class="btn2">SIGN UP</button></a>
            </ul>
        </div>

    </nav>


    <!--Slider-->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="images/slide1.svg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/slide2.svg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/slide3.svg" style="width:100%">
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>


    <div class="about-container">
        <div class="about-img">
            <center><img src="images/about-img.png" alt="" width="90%"></center>
        </div>
        <div class="about">
            <h1>ABOUT US</h1>
            <hr color="red" width="50%"><br>
            <p>At GalleryGavel, we believe in the transformative power of art. We're a passionate team dedicated to
                creating a vibrant online platform where art lovers and collectors can connect, explore, and acquire
                exceptional artworks from around the world.
                <br><br>
                Our journey began with a simple vision: to revolutionize the way art is bought and sold, making it
                accessible to everyone, everywhere. What started as a spark of inspiration has evolved into a
                dynamic marketplace that celebrates creativity and fosters meaningful connections between artists
                and patrons.
                <br><br>
                With a commitment to excellence and innovation, GalleryGavel offers a seamless online auction
                experience that combines cutting-edge technology with personalized service. Our curated selection
                features a diverse range of artworks spanning various styles, mediums, and cultures, ensuring
                there's something for every taste and preference.
            </p><br>
            <button class="btn1">Learn More <i class="fa-solid fa-angles-right fa-beat-fade"></i> </button>
        </div>
    </div>

    <br>
    <br>

    <div class="service-container">
        <h1>WHY CHOOSE US?</h1>
        <center>
            <hr color="red" width="50%">
        </center><br>
        <div class="services">
            <div class="service">
                <div class="s1">
                    <i class="fa-solid fa-gavel"></i> Real-time Bidding<br>
                    <i class="fa-solid fa-dollar-sign"></i> Safe Fund Transferring<br>
                    <i class="fa-solid fa-clock-rotate-left"></i> 24/7 Customer Service<br>
                </div>

            </div>
            <div class="service">
                <div class="s2">
                    <div class="s1">
                        <i class="fa-regular fa-bell"></i> Bid Alerts and Notifications<br>
                        <i class="fa-solid fa-shield-halved"></i> Bidder Verification and Authentication<br>
                        <i class="fa-solid fa-comment-medical"></i> Art Advisory and Concierge Services<br>
                    </div>
                </div>
            </div>
            <div class="service-img">
                <center><img src="images/why-01.png
                    " alt="" width="50%"></center>
            </div>
        </div>
    </div>




    <div class="carousel">
        <h1 style="text-align: center;">ONGOING BIDS</h1>
        <center>
            <hr color="red" width="50%">
        </center><br>
        <div class="carousel-container">
            <?php foreach ($rows as $row) { ?>
                <div class="product">
                    <div class="p1" style="height:500px;">
                        <img src="uploads/<?php echo $row['images']; ?>" alt="" width="100%">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <h3>Starting Bid: $<?php echo $row['startingPrice']; ?></h3>
                        <a href="loginform.php"><button class="btn1">Log in to Bid now</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <br><br>



    <footer>
        <div class="footer1">
            <center><img src="images/logo.png" alt="" width="30%">
                <p>"Where Brushstorkes Meet Bid, Your Geteway to Artful Auction"</p><br>
                <h3>Connect With Us</h3>
                <hr class="hr1"><br>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </center>
        </div>
        <div class="footer2">
            <h3>Quick links</h3>
            <hr class="hr1" style="float:left"><br>
            <p><a href="about.php">About Us</a></p>
            <p><a href="terms.html">Terms of Service</a></p>
            <p><a href="privacy1.html">Privacy Policy</a></p>
        </div>
        <div class="footer3">
            <h3>Contact Information</h3>
            <hr class="hr1" style="float:left"><br>
            <p><i class="fa-solid fa-location-dot"></i> 123 Main Street, City, Country</p><br>
            <p><i class="fa fa-phone"></i> Phone: +123 456 789</p><br>
            <p><i class="fa-solid fa-envelope"></i> Email: info@example.com</p>
        </div>



    </footer>
    <div class="copyright">
        <p>&copy; 2024 GalleryGavel.com || All rights reserved.</p>
    </div>



    <script src="js/script.js"></script>
</body>

</html>