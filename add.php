<?php

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $artist = $_POST["artist"];
    $description = $_POST["descrip"];
    $dimensions = $_POST["dimensions"];
    $medium = $_POST["medium"];
    $startingPrice = $_POST["startingPrice"];

    // File upload handling
    $targetDir = "uploads/";
    $fileName = uniqid() . "-" . basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if image file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowedTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Insert artwork information into database
                $sql = "INSERT INTO artwork (title, artist, description, dimentions, medium, startingPrice, images) 
                        VALUES ('$title', '$artist', '$description', '$dimensions', '$medium', '$startingPrice', '$fileName')";
                if (mysqli_query($con, $sql)) {
                    echo "<link rel='stylesheet' href='styles/addnew.css'><div class='success'>Artwork added successfully!<br><iframe src='https://gifer.com/embed/7efs' width=300 height=300.000 frameBorder='0' style='border-radius:20%';></iframe><br><a href='sellerdashboard.php'><button class='back'>Go Back to Dashboard</button></a>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        echo "File is not an image.";
    }
}

?>