<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $msg = $_POST['msg'];

    if (empty($_POST["firstname"]) || empty($_POST["pnumber"]) || empty($_POST["email"]) || empty($_POST["msg"])) {
        echo "All fields are required.";
    } else {
        $firstName = $_POST["firstname"];
        $email = $_POST["email"];
        $msgID = $_POST["msgID"];

        $SQL = "UPDATE message SET `Name`='$firstName', Email='$email', msg='$msg' WHERE msgID='$msgID'";

        if ($con->query($SQL)) {
            echo "<link rel='stylesheet' href='styles/contactUs.css'><div class='success'>Message updated successfully!<br><img src='https://www.icegif.com/wp-content/uploads/2023/08/icegif-727.gif' style='width:60%;border-radius:20px;'><br>Your Message : $msg<br><a href='contact.php'><button class='goback'>Go Back</button></a>";
        } else {
            echo "Error updating message: " . $con->error;
        }
    }
    $con->close();
}
?>
