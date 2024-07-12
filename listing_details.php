<?php
$artworkID = $_GET['artworkID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/listing_details.css">
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
    <title>View Details</title>
</head>

<body>
    <?php
    require 'config.php';
    $i = 1;
    $query = "SELECT * FROM artwork WHERE artworkID = $artworkID";
    $result = mysqli_query($con, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<table class='artwork_details' width='70%'>";
            echo "<tr>";
            echo "<td>" . 'Title : ' . "</td>" . "<td>" . $row['title'] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Artist : ' . "</td>" . "<td>" . $row["artist"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Description : ' . "</td>" . "<td>" . $row["description"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Dimension : ' . "</td>" . "<td>" . $row["dimentions"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Medium : ' . "</td>" . "<td>" . $row["medium"] . "<br>" . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . 'Starting Price : ' . "</td>" . "<td>" . $row["startingPrice"] . "<br>" . "</td>";
            echo "</tr>";
            // Display image
            echo "<tr>";
            echo "<td>Image:</td>";
            echo "<td><img src='uploads/" . $row['images'] . "' width='400'></td>";
            echo "</tr>";
            ?>
            <tr>
                <td>
                    <form action="edit_listing.php" method="GET">
                        <input type="hidden" name="artworkID" value="<?php echo $row['artworkID']; ?>">
                        <button type="submit" class='btn2'>Edit Listing <i class='fa-solid fa-pen'></i></button>
                    </form>
                </td>
                <td>
                    <form action="delete_listing.php" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this listing?');">
                        <input type="hidden" name="artworkID" value="<?php echo $row['artworkID']; ?>">
                        <button type="submit" class='btn1' style="margin-left:-150px;">Delete Listing <i class='fa-solid fa-trash'></i></button>
                    </form>
                </td>
            </tr>
            <?php
            echo "</table>";
        }
    } else {
        echo "Error fetching data.";
    }
    ?>
</body>

</html>