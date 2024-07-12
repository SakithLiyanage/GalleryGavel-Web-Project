<?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gallerygavel"; // Corrected variable name

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct SQL query to delete the last bid amount
    $sql_delete_last_bid = "DELETE FROM bidd ORDER BY bidamount DESC LIMIT 1";

    if (mysqli_query($conn, $sql_delete_last_bid)) {
        echo "<script>alert('Last bid amount deleted'); window.location.href='auction_login.php'; </script>";
    } else {
        echo "Error deleting last bid amount: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
