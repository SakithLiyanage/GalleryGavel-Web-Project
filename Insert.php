<?php
    // Connect to the database PHP
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bidding"; // Corrected variable name

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to get the maximum value in bidamount
    $max_bid_sql = "SELECT MAX(bidamount) AS max_bid FROM bidd";
    $max_bid_result = mysqli_query($conn, $max_bid_sql);

    if ($max_bid_result) {
        $row = mysqli_fetch_assoc($max_bid_result);
        $max_bid = $row['max_bid'];
        echo "<p>Maximum bid amount: $max_bid$</p>";
    } else {
        echo "<p>Error retrieving maximum bid amount: " . mysqli_error($conn) . "</p>";
    }

    // Close connection
    mysqli_close($conn);
?><