<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture all relevant fields from the form
    $userID = $_POST['userID'];
    $fname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $DOB = $_POST['DOB'];
    $pw = $_POST['pw'];
    $rpw = $_POST['rpw'];

    // Update query to set correct fields in the users table
    $query = "UPDATE users SET Fname='$fname', Lname='$lastname', Email='$email', Phone_no='$pnumber', DOB='$DOB', Password='$pw', Rpassword='$rpw' WHERE userID=$userID";

    // Execute the query
    if (mysqli_query($con, $query)) {
        header("Location:userprofile.php");
    } else {
        echo "Error updating profile: " . mysqli_error($con);
    }
}
?>
