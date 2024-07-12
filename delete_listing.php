<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['artworkID'])) {
        $artworkID = $_POST['artworkID'];

        // Delete the listing from the database
        $query = "DELETE FROM artwork WHERE artworkID=$artworkID";
        if (mysqli_query($con, $query)) {
            echo "<link rel='stylesheet'href='styles/addnew.css'><div class='success'>Artwork Deleted successfully!<br><iframe src='https://gifer.com/embed/7efs' width=300 height=300.000 frameBorder='0'style='border-radius:20%';></iframe><br><a href='sellerdashboard.php'><button class='back'>Go Back to Dashboard</button></a>";
        } else {
            echo "Error deleting listing: " . mysqli_error($con);
        }
    } else {
        echo "Artwork ID not provided.";
    }
}
?>
