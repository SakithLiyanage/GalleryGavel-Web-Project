
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art || GalleryGavel</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="images/fav-01-01.png">
    <link rel="stylesheet" href="styles/product_about.css">
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
</head>

<body>

   <!--Nav bar-->
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><a href="#"><img src="images/logo.png" alt="" width="10%"></a></div>
            <ul>
                <li><a href="index_login.php">Home</a></li>
                <li><a href="auction_login.php">Auction</a></li>
                <li><a href="about_login.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <a href="userprofile.php" id="profile-link">
                    <img src="images/prof.png" alt="" width="10%" id="profile-img"
                        style="border-radius:100px;cursor:pointer;">
                </a>
                <a href="logout.php"><button class="btn1 logout">Log out <i
                            class="fa-solid fa-right-from-bracket"></i></button></a>
            </ul>
        </div>

    </nav>
    <!--End of Nav bar-->

    <section style="display: flex; align-items: center;">
        <div style="margin: 5%; width: 50%; margin-left: 5%;">
            <div >
                <div class="container" style="margin: 5%;">

                    <div>
                        <img src="Bidding image/images.jpeg" style="width:200%">
                    </div>
                  
                  </div>
                
               
            </div>
        </div> 
        <div class="pname">
            <h1>The Grate Lady</h1>
            <h4 >John Doe</h4>
            <h4 >31 X 43 in | 78 x 109.2 cm</h4>
            <hr>
            <h4>Estimated Value:1000$</h4>
            <h4>




<?php
    // Connect to the database PHP
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gallerygavel"; // Corrected variable name

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to get the maximum value in bidamount
    $max_bid_sql = "SELECT MAX(bidamount) AS max_bid FROM bidd";
    $max_bid_result = mysqli_query($conn, $max_bid_sql);

    if ($max_bid_result) {
        $row = mysqli_fetch_assoc($max_bid_result);
        $max_bid = $row['max_bid'];
        echo "<p>Maximum bid amount: $max_bid$</p>";
    } else {
        echo "<p>Error retrieving maximum bid amount: " . mysqli_error($conn) . "</p>";
    }

    // Close connection
    mysqli_close($conn);
?>
</h4>

            <h4 id="countdown"></h4>
           
           
            <div style="display: flex; justify-content: center;">
                <form action="update.php" method="post">
                    <div>
                        
                        <input name="bidamount" class="bidbutton" type="number" id="bidValue" style="height: 30px;" value="<?php echo $max_bid ?>" min="<?php echo $max_bid + 1 ?>">
                        <button class="bidbutton" onclick="placeBid()">Update Bid</button>
                    </div>
                </form>
                
                <form action="CDelete.php" method="post"> 
                    <button class="bidbutton" onclick="clearBid()">Clear Bid</button>
                </form>
            </div>
         </div>
    </section>

            
    
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    
    
    <h1><u class="aboutart2">About Artwork</u></h1><br>
    
    <p class="pdis">It's one thing to provide your customer with clear, well-lit images of your product. But by going that extra step further and presenting the a
        rtwork in context, with a frame, or in greater detail, you remove that element of guesswork so frequently associated with purchasing online - how will it look in reality?
    Artfinder artists offer their hints and tips on how to avoid the most common pitfalls of taking secondary images.</p>
    
    
   <hr><br><br>
<div class="pfeature">
   <h4 >Material     Oil On Found Painting</h4>
   <h4>Size     31 X 43 in | 78 x 109.2 cm</h4> 
   <h4>Condition     Good</h4>
   <h4>Image Right :John Doe</h4>
</div> 
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
            <p><a href="#">About Us</a></p>
            <p><a href="#">Contact Us</a></p>
            <p><a href="#">FAQs</a></p>
            <p><a href="#">Terms of Service</a></p>
            <p><a href="#">Privacy Policy</a></p>
        </div>
        <div class="footer3">
            <h3>Contact Information</h3>
            <hr class="hr1" style="float:left"><br>
            <p><i class="fa-solid fa-location-dot"></i> 123 Main Street, City, Country</p>
            <p><i class="fa fa-phone"></i> Phone: +123 456 789</p>
            <p><i class="fa-solid fa-envelope"></i> Email: info@example.com</p>
        </div>



    </footer>
    <div class="copyright">
        <p>&copy; 2024 GalleryGavel.com || All rights reserved.</p>
    </div>



    <script src="js/script.js"></script>
</body>

</html>