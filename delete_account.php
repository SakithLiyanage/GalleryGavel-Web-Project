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

// Query to delete the user account
$sql = "DELETE FROM users WHERE Username = '$username'";

// Execute the query
if (mysqli_query($con, $sql)) {
    // Account deleted successfully
    // Log out the user by destroying the session
    session_destroy();
    // Redirect to the home page
    header("Location: index.php");
    exit();
} else {
    // Handle the error if deletion fails
    echo "Error deleting account: " . mysqli_error($con);
    exit();
}
?>
