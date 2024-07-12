<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artworkID = $_POST['artworkID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dimensions = $_POST['dimensions'];
    $medium = $_POST['medium'];
    $startingPrice = $_POST['startingPrice'];

    // Check if a new image is uploaded
    if (isset($_FILES['newImage']) && $_FILES['newImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $fileName = uniqid() . "-" . \basename($_FILES["newImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check if image file is a valid image
        $check = getimagesize($_FILES["newImage"]["tmp_name"]);
        if ($check !== false) {
            // Allow certain file formats
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($fileType, $allowedTypes)) {
                // Upload new image to server
                if (move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetFilePath)) {
                    // Update artwork details in the database with the new image
                    $query = "UPDATE artwork SET title='$title', description='$description', dimentions='$dimensions', medium='$medium', startingPrice='$startingPrice', images='$fileName' WHERE artworkID=$artworkID";
                    if (mysqli_query($con, $query)) {
                        echo "<link rel='stylesheet'href='styles/addnew.css'><div class='success'>Updated successfully!<br><iframe src='https://gifer.com/embed/7efs' width=300 height=300.000 frameBorder='0' style='border-radius:20%';></iframe><br><a href='sellerdashboard.php'><button class='back'>Go Back to Dashboard</button></a>";
                    } else {
                        echo "Error updating listing: " . mysqli_error($con);
                    }
                } else {
                    echo "Error uploading new image.";
                }
            } else {
                echo "Only JPG, JPEG, PNG & GIF files are allowed for image.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        // If no new image is uploaded, update only other details
        $query = "UPDATE artwork SET title='$title', description='$description', dimentions='$dimensions', medium='$medium', startingPrice='$startingPrice' WHERE artworkID=$artworkID";
        if (mysqli_query($con, $query)) {
            echo "<link rel='stylesheet'href='styles/addnew.css'><div class='success'>Updated successfully!<br><iframe src='https://gifer.com/embed/7efs' width=300 height=300.000 frameBorder='0' style='border-radius:20%';></iframe><br><a href='sellerdashboard.php'><button class='back'>Go Back to Dashboard</button></a>";
        } else {
            echo "Error updating listing: " . mysqli_error($con);
        }
    }
}
?>