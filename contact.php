<!DOCTYPE html>
<html>

<head>
  <title>
    Contact Us Page
  </title>

  <link rel="stylesheet" href="styles/contactUs.css">
  <link rel="stylesheet" href="styles/style.css">
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
        <li><a href="contact_login.php" class="active-home">Contact Us</a></li>
        <li><a href="payment.php">Payment</a></li>
        <a href="userprofile.php" id="profile-link">
          <img src="images/prof.png" alt="" width="10%" id="profile-img" style="border-radius:100px;cursor:pointer;">
        </a>
        <a href="logout.php"><button class="btn1 logout">Log out <i
              class="fa-solid fa-right-from-bracket"></i></button></a>

      </ul>
    </div>

  </nav>
  <!--End of Nav bar-->

  <br>
  <div class="container">

    <div class="column">
      <div style="text-align:center">
        <h1 style="text-align: center; color:white">Contact Us</h1><br>
        <hr color="red" width="250px" style="margin-left:70px;margin-top:-10px;"><br>
        <form method="POST" action="msgsend.php">

          <label for="fname"><i class="fa-regular fa-user"></i> Full Name</label><br>
          <input type="text" name="firstname"><br>

          <label for="number"><i class="fa-solid fa-phone"></i> Phone Number</label><br>
          <input type="text" name="pnumber"><br>

          <label for="mail"><i class="fa-solid fa-envelope"></i> Email </label><br>
          <input type="text" name="email"> <br>



          <label for="msg"><i class="fa-regular fa-message"></i> Message</label><br>
          <textarea name="msg" style="height: 170px;width:380px;  "></textarea><br>

          <input type="submit" style="font-size: medium;font-weight: bold;" value="Send">

      </div>
    </div>
  </div>

  </form>
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
</body>

</html>