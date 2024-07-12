<?php
session_start();
require 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: loginform.php");
    exit();
}

// Retrieve the username of the logged-in user
$username = $_SESSION['username'];

// Query to fetch the user's details from the database
$sql = "SELECT * FROM users WHERE Username = '$username'";
$result = mysqli_query($con, $sql);

// Check if the query executed successfully
if ($result && mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // Check if the user is a buyer
    if ($user['role'] !== 'buyer') {
        // If not a buyer, redirect to the index page or appropriate page
        header("Location: index.php"); // Change this to the appropriate page
        exit();
    }
} else {
    // Handle error if user details not found
    echo "Error fetching user details";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Profile || GalleryGavel</title>
    <link rel="icon" href="images/fav-01-01.png">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        table {
            line-height: 3;
            border-collapse: collapse;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            padding-left: 80px;
        }

        .actions {
            display: flex;
        }
    </style>

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
    <!--Profile container-->
    <div class="profile-box" style="margin:30px">
        <h1><span>Welcome, <?php echo $user['Fname']; ?>!</span></h1>
        <p>Your buyer profile details:</p>
        <br>
        <div class="details">
            <table width="100%" style="">
                <tr>
                    <td>
                        <h2>Name:</h2>
                    </td>
                    <td><?php echo $user['Fname'] . ' ' . $user['Lname']; ?></td>
                </tr>
                <tr>
                    <td>
                        <h2>Email:</h2>
                    </td>
                    <td><?php echo $user['Email']; ?></td>
                </tr>
                <tr>
                    <td>
                        <h2>Phone:</h2>
                    </td>
                    <td><?php echo $user['Phone_no']; ?></td>
                </tr>
                <tr>
                    <td>
                        <h2>Date of Birth:</h2>
                    </td>
                    <td><?php echo $user['DOB']; ?></td>
                </tr>
                <tr>
                    <td>
                        <h2>Username:</h2>
                    </td>
                    <td><?php echo $user['Username']; ?></td>
                </tr>
                <tr>
                    <td>
                        <h2>Gender:</h2>
                    </td>
                    <td><?php echo $user['Gender']; ?></td>
                </tr>
            </table>
        </div>
        <br><br>

        <div class="actions">

            <form action="update_acc.php" method="POST">
                <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
                <button type="submit" class='btn2'>Edit Profile <i class='fa-solid fa-pen'></i></button>
            </form>

            <form action="delete_account.php" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this account');">
                <button type="submit" class="btn1">Delete Account <i class="fa-solid fa-trash"></i></button>
            </form>

        </div>
    </div>

    <!--Footer -->
    <footer>
        <div class="footer1">
            <center><img src="images/logo.png" alt="" width="30%">
                <p>"Where Brushstrokes Meet Bid, Your Gateway to Artful Auction"</p><br>
            </center>
        </div>
        <div class="footer2">
            <h3>Quick links</h3>
            <hr class="hr1" style="float:left"><br>
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
</body>

</html>
