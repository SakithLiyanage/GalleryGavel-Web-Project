<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Listing</title>
    <link rel="stylesheet" href="styles/update.css">
</head>

<body>
    <?php
    session_start();
    require 'config.php';

    // Check if artwork ID is provided
    if (isset($_GET['artworkID'])) {
        $artworkID = $_GET['artworkID'];

        $result = mysqli_query($con, "SELECT * FROM artwork WHERE artworkID = $artworkID");
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="add-box">
                <form action="update_listing.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="artworkID" value="<?php echo $row['artworkID']; ?>">
                    Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
                    Artist: <input type="text" name="artist" value="<?php echo $row['artist']; ?>"><br>
                    Description: <textarea name="description"><?php echo $row['description']; ?></textarea><br>
                    Dimension: <input type="text" name="dimensions" value="<?php echo $row['dimentions']; ?>"><br>
                    Medium: <input type="text" name="medium" value="<?php echo $row['medium']; ?>"><br>
                    Price: <input type="text" name="startingPrice" value="<?php echo $row['startingPrice']; ?>"><br>
                    <!-- Input field for uploading new image -->
                    New Image: <input type="file" name="newImage" accept=".jpg, .jpeg, .png"><br>

                    <button type="submit" class="submit" style="width:150px;">Update Listing</button>
                </form>
            </div>
            <?php
        } else {
            echo "Listing not found.";
        }
    } else {
        echo "Artwork ID not provided.";
    }
    ?>

</body>

</html>
