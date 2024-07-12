<!DOCTYPE html>
<html>

<head>
  <title>
    Update Message
  </title>

  <link rel="stylesheet" href="styles/contactUs.css">

</head>

<body>
<?php
    session_start();
    require 'config.php';

    // Check if artwork ID is provided
    if (isset($_POST['msgID'])) {
        $msgID = $_POST['msgID'];

        $result = mysqli_query($con, "SELECT * FROM message WHERE msgID = $msgID");
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

  <div class="container">

    <div class="column">
      <div style="text-align:center">
        <h2 style="text-align: center; color:white">Contact Us</h2>
        <form method="POST" action="editmsg.php">
        <input type="hidden" name="msgID" value="<?php echo $row['msgID']; ?>">
          <label for="fname"> Full Name</label><br>
          <input type="text" id="fname" name="firstname" value="<?php echo $row['Name']; ?>"><br>

          <label for="number">Phone Number</label><br>

          <input type="text" id="lname" name="pnumber" value="<?php echo $row['Tel_no']; ?>"><br>

          <label for="mail"> Email </label><br>
          <input type="text" id="mail" name="email" value="<?php echo $row['Email']; ?>"> <br>



          <label for="msg">Message</label><br>
          <textarea id="msg " name="msg" style="height: 170px"><?php echo $row['msg']; ?></textarea><br>

          <input type="submit" style="font-size: medium;font-weight: bold;" value="Update Message">

      </div>
    </div>
  </div>

  </form>
  <?php
        } else {
            echo "Listing not found.";
        }
    } else {
        echo "Message ID not provided.";
    }
    ?>
</body>

</html>