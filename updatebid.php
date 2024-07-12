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
    $bidamount=mysqli_real_escape_string($conn,$_POST['bidamount']);

    $sql="UPDATE bidd  SET bidamount='$bidamount' ORDER BY bidamount DESC LIMIT 1";

    if (mysqli_query($conn, $sql) === TRUE) {
        echo "<script>alert('Details Added'); window.location.href='Bidding.php'; </script>";
        } else {
        echo "Error: " . $sql. "<br>". mysqli_error($conn);
        }
        mysqli_close($conn);

    ?>
