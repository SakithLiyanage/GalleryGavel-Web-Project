<?php

include ("config.php");


session_start();


$username = $_SESSION['username'];

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number'];
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];


    $query_application = "UPDATE payment SET username='$name', email='$email', card_number='$card_number', expire_date='$exp_date', cvv='$cvv', amount='$amount' WHERE username='$username'";
    $result_application = mysqli_query($con, $query_application);
    $result_application = mysqli_query($con, $query_application);



    if ($result_application) {

        header("Location:view_payment.php");

    } else {
        echo "Error";
    }


}
?>