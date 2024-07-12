<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction || GalleryGavel</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="images/fav-01-01.png">
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
    <script>
        document.getElementById('profile-img').addEventListener('click', function () {
            window.location.href = 'userprofile.php'; // Redirect to the user profile page
        });
    </script>

</head>

<?php
require 'config.php';

// Default query to select all artwork
$query = "SELECT * FROM artwork";
$result = mysqli_query($con, $query);
// Check if a sorting option is selected
if (isset($_GET['sort'])) {
    $sort_option = $_GET['sort'];
    switch ($sort_option) {
        case 'Price Low to High':
            $query .= " ORDER BY startingPrice ASC";
            break;
        case 'Price High to Low':
            $query .= " ORDER BY startingPrice DESC";
            break;

        default:
            // Default case, do nothing
            break;
    }
}
$result = mysqli_query($con, $query);
?>



<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><a href="#"><img src="images/logo.png" alt="" width="10%"></a></div>
            <ul>
                <li><a href="index_login.php">Home</a></li>
                <li><a href="auction_login.php" class="active-home">Auction</a></li>
                <li><a href="about_login.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="payment.php">Payment</a></li>
                <a href="userprofile.php" id="profile-link">
                    <img src="images/prof.png" alt="" width="10%" id="profile-img"
                        style="border-radius:100px;cursor:pointer;">
                </a>
                <a href="logout.php"><button class="btn1 logout">Log out <i
                            class="fa-solid fa-right-from-bracket"></i></button></a>

            </ul>
        </div>

    </nav>


    <div class="auction-container" style="background-image: url('images/back.jpg');">
        <div class="auc">
            <center>
                <img src="images/navlogo-01.png" alt="" width="20%">
                <h1>Auction</h1>
                <p><a href="index.html">Home</a> <i class="fa-solid fa-chevron-right"></i> <a href="#"><span
                            style="color: red;">Auction</span></a></p>

            </center>
        </div>
    </div>

    <br>
    <br>


    <div class="products">
        <center>
            <h1>Ongoing Bids</h1>
            <hr class="hr1">
        </center>
        <form method="GET" action="">
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="" selected disabled>Sort By</option>
                <option value="Price Low to High">Price Low to High</option>
                <option value="Price High to Low">Price High to Low</option>
            </select>
        </form><br><br>
        <div class="products-container">
            <!-- Display artwork data from the database -->
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="p1" style="height:500px;">
                    <img src="uploads/<?php echo $row['images']; ?>" alt="" width="100%">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <h3>Starting Bid: $<?php echo $row['startingPrice']; ?></h3><br>

                    <form action="product.php" method="GET">
                        <input type="hidden" name="artworkID" value="<?php echo $row['artworkID']; ?>">
                        <button type="submit" class='btn1'>Bid Now</button>
                    </form>
                </div>
            <?php } ?>
        </div>
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
            <p><a href="about_login.php">About Us</a></p>
            <p><a href="contact.php">Contact Us</a></p>
            <p><a href="terms.html">Terms of Service</a></p>
            <p><a href="privacy1.html">Privacy Policy</a></p>
        </div>
        <div class="footer3">
            <h3>Contact Information</h3>
            <hr class="hr1" style="float:left"><br>
            <p><i class="fa-solid fa-location-dot"></i> 123 Main Street, City, Country</p><br>
            <p><i class="fa fa-phone"></i> Phone: +123 456 789</p><br>
            <p><i class="fa-solid fa-envelope"></i> Email: info@example.com</p><br>
        </div>



    </footer>
    <div class="copyright">
        <p>&copy; 2024 GalleryGavel.com || All rights reserved.</p>
    </div>



    <script src="js/script.js"></script>
</body>

</html>