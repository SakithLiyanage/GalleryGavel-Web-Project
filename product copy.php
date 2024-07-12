<?php
require 'config.php';

// Check if artworkID is provided in the URL
if(isset($_GET['artworkID'])) {
    $artworkID = $_GET['artworkID'];

    // Query to fetch product information based on artworkID
    $query = "SELECT * FROM artwork WHERE artworkID = $artworkID";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if($result) {
        $row = mysqli_fetch_assoc($result); // Fetch product details

        // Now display the product details as needed
?>
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

    <?php
        // Display product details here
    ?>
    <section style="display: flex; align-items: center;">
        <div style="margin: 5%; width: 50%; margin-left: 5%;">
            <div class="container" style="margin: 5%;">
                <div>
                    <img src="uploads/<?php echo $row['images']; ?>" width="600">
                </div>
            </div>
        </div>
        <div class="pname" style="margin-top:50px;">
            <h1><?php echo $row["title"]; ?></h1>
            <?php echo $row["artist"]; ?><br>
            <?php echo $row["dimentions"]; ?><br>
            <hr color="red">
            <p style="padding-top:10px; padding-bottom: 10px;">Estimated Value: <b><?php echo $row["startingPrice"];?>/=</b></p>
            <h1 class="aboutart2">About Artwork</h1>
            <hr color="red" width="200px">
            <p class="pdis"><?php echo $row["description"]; ?></p>
            <br>
            <div class="pfeature">
                Medium : <b><?php echo $row["medium"]; ?></b><br>
                Size : <b><?php echo $row["dimentions"]; ?></b><br><br>
            </div>
            <h4>
                <?php
                // Query to get the maximum value in bidamount
                $max_bid_sql = "SELECT MAX(bidamount) AS max_bid FROM bidd";
                $max_bid_result = mysqli_query($con, $max_bid_sql);

                if ($max_bid_result) {
                    $row = mysqli_fetch_assoc($max_bid_result);
                    $max_bid = $row['max_bid'];
                    echo "<p>Maximum Bid Amount: $max_bid$</p>";
                } else {
                    echo "<p>Error retrieving maximum bid amount: " . mysqli_error($con) . "</p>";
                }
                ?>
            </h4>
            <h4 id="countdown"></h4>
            <div style="display: flex; justify-content: center;">
                <form action="product_bid.php" method="post">
                    <div>
                        <input name="bidamount" class="bidbutton" type="number" id="bidValue"
                            placeholder="Enter the Bid Amount" style="height: 30px;"
                            min="<?php echo $max_bid + 1; ?>">
                        <button class="bidbutton" onclick="placeBid()" style="background-color:tomato;margin-left:-50px;">Bid</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
    } else {
        // Handle error if the query fails
        echo "Error fetching product details: " . mysqli_error($con);
    }
} else {
    // Handle case where artworkID is not provided in the URL
    echo "No artworkID provided";
}
?>

    <footer>
        <div class="footer1">
            <center><img src="images/logo.png" alt="" width="30%">
                <p>"Where Brushstrokes Meet Bid, Your Gateway to Artful Auction"</p><br>
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
