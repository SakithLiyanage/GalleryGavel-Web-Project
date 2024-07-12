<?php
include 'config.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Update Payment
    </title>
    <link rel="stylesheet" type="text/css" href="styles/view.css">
</head>

<body>


    <center>
        <div class="header">

            <h1>CONFIRM PAYMENT</h1>
            <hr width="400px">


            <table class="payment-info" width="70%">





                <?php

                //session_start();
                //$applicant_id=$_SESSION['applicant_id'];
                
                $query = "SELECT * from payment ;";

                $data = mysqli_query($con, $query);
                $result = mysqli_num_rows($data);

                if ($row = mysqli_fetch_array($data)) {
                    ?>


                    <tr>
                        <td>Username</td>
                        <td><?php echo $row["username"] ?></td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $row["email"] ?></td>


                    </tr>
                    <tr>
                        <td>Card Number</td>
                        <td><?php echo $row["card_number"] ?></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td><?php echo $row["amount"] ?></td>

                    </tr>
                    <tr>

                        <td>
                            <button class="update-btn">
                                <a href="update_payment.php?username=<?php echo $row["username"]; ?>">Update</a></button>
                            <button class="delete-btn">
                                <a href="payment_delete.php?username=<?php echo $row["username"]; ?>">Delete</a>
                            </button>
                            <button class ="pay-btn">
                                <a href="payment-sucess.php">Pay Now</a>
                            </button>
                        </td>
                        <td>



                        </td>

                    </tr>

                    <?php
                }
                ?>

    </center>







    </div>

</body>

</html>