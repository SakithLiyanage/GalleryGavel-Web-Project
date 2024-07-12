<?php
require 'config.php';
session_start();

// Initialize artworkID from session
$artworkID = $_SESSION['artworkID'] ?? null;

// Check if artworkID is provided in the URL
if(isset($_GET['artworkID'])) {
    // Sanitize input
    $artworkID = mysqli_real_escape_string($con, $_GET['artworkID']);
}

if($artworkID) {
    // Query to fetch product information based on artworkID
    $query = "SELECT * FROM artwork WHERE artworkID = $artworkID";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if($result) {
        $row = mysqli_fetch_assoc($result); // Fetch product details

        // Display product details here
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
    <!-- Navbar content here -->
</nav>
<!--End of Nav bar-->

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
            <form action="Bidding.php" method="post">
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

<footer>
    <!-- Footer content here -->
</footer>

<script src="js/script.js"></script>
</body>
</html>
<?php
    } else {
        // Handle error if the query fails
        echo "Error fetching product details: " . mysqli_error($con);
    }
} else {
    // Handle case where artworkID is not provided
    echo "No artworkID provided";
}
?>
