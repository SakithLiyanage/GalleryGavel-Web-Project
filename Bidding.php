<?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gallerygavel"; // Corrected variable name

    // Suppress errors for mysqli_connect()
    $conn = @mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Suppress errors for $_POST['bidamount']
    $bidamount = @$_POST['bidamount'];

    // Suppress errors for mysqli_real_escape_string()
    $bidamount = @mysqli_real_escape_string($conn, $bidamount);

    // Suppress errors for mysqli_query()
    $sql = @mysqli_query($conn, "INSERT INTO bidd (bidamount) VALUES ('$bidamount')");

    if ($sql === TRUE) {
        // Show the success message
        

        // Proceed to display the artwork details and bid form
        // Suppress errors for mysqli_query()
        $result = @mysqli_query($conn, "SELECT * FROM artwork"); // Fetch artwork details from your database
        $row = @mysqli_fetch_assoc($result);

        if ($row) {
?>
    <link rel="stylesheet" href="styles/product_about.css">
    <link rel="stylesheet" href="styles/style.css">
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
                    <p style="padding-top:10px; padding-bottom: 10px;">Estimated Value:
                        <b><?php echo $row["startingPrice"]; ?>/=</b>
                    </p>
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
                        // Suppress errors for mysqli_query()
                        $max_bid_result = @mysqli_query($conn, $max_bid_sql);

                        if ($max_bid_result) {
                            // Suppress errors for mysqli_fetch_assoc()
                            $max_bid_row = @mysqli_fetch_assoc($max_bid_result);
                            $max_bid = $max_bid_row['max_bid'];
                            echo "<p>Maximum Bid Amount: $max_bid$</p>";
                        } else {
                            echo "<p>Error retrieving maximum bid amount</p>";
                        }
                    ?>
                </h4>
                <h4 id="countdown"></h4>
                <div style="display: flex; justify-content: center;">
                <form action="updatebid.php" method="post">
                    <div>
                        
                    <input name="bidamount" class="bidbutton" type="number" id="bidValue" style="height: 30px;" value="<?php echo $max_bid ?>" min="0">
                        <button class="bidbutton" onclick="placeBid()" style="background-color:#ccc;margin:20px 20px 20px 20px;">Update Bid</button>
                    </div>
                </form>
                
                <form action="CDelete.php" method="post"> 
                    <button class="bidbutton" onclick="clearBid()" style="background-color:tomato;width:100px;margin-top:50px;margin-left:-280px">Clear Bid</button>
                </form>
            </div>
            </div>
            
<?php
        } else {
            echo "No artwork found."; // Display message if no artwork found
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn); // Fixed variable name
    }

    // Suppress errors for mysqli_close()
    @mysqli_close($conn);
?>
    </section>


    <div class="copyright">
        <p>&copy; 2024 GalleryGavel.com || All rights reserved.</p>
    </div>
