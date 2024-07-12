
<?php

    session_start();
    include 'config.php';

    



    $username=$_GET['username'];
    


     $select="SELECT  * FROM payment WHERE username='$username'";
     $data=mysqli_query($con,$select);
     $row=mysqli_fetch_array($data);

     $_SESSION['username'] = $username;

    


?>







<!DOCTYPE html>
<html>
    <head>
        <style>
            form{
                width: 30%;
                background-color: lightgray;
            }
            form h2{
                text-align: center;
            }
            .form{
                display: flex;
                justify-content: flex-end;
            }
            .form label{
                text-align: left;
            }
            #i{
                align-items: center;
            }
        </style>
        <title>Payment Form</title>
        <link rel="stylesheet" href="styles/payment_method.css">  </head>
    </head>
    <body>
       
        <form action="update-php.php" method="post">
             <h2>Payment Form</h2>
            <div class="form">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" value="<?php echo $row["username"]?>"><br><br></div>
            <div class="form">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $row["email"]?>"><br><br></div>
            <div class="form">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" value="<?php echo $row["card_number"]?>"><br><br></div>
            <div class="form">
                <label for="exp_date">Expiry Date</label>
                <input type="text" id="exp_date" name="exp_date" placeholder="MM/YYYY" value="<?php echo $row["expire_date"]?>"> <br><br></div>
            <div class="form">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" value="<?php echo $row["cvv"]?>"><br><br></div>
            <div class="form">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" value="<?php echo $row["amount"]?>"><br><br></div>
            <img src="payment.png" alt="" width="40%"><br>
            <input type="submit" class="submit" name ="submit" value="Update Payment" id="i">

        </form>
    </body>
</html>