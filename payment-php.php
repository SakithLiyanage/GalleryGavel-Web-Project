<?php

    include("config.php");
    

    //session_start();


    //$applicant_id = $_SESSION['applicant_id'];
    //$job_id=$_SESSION['job_id'];
       

    if(isset($_POST['submit']))
    {
            
            $name=$_POST['name'];
            $email=$_POST['email'];
            $card_number=$_POST['card_number'];
            $exp_date=$_POST['exp_date'];
            $cvv=$_POST['cvv'];
            $amount=$_POST['amount'];





            $query_application = "INSERT INTO payment (username,email,card_number,expire_date,cvv,amount)
            VALUES ('$name', '$email', '$card_number', '$exp_date','$cvv', '$amount')";
            $result_application = mysqli_query($con, $query_application);
        
            
        
            if ($result_application) {

                header("Location:view_payment.php");
                //echo"Date Saved";
            } else {
                echo "Error";
            }
        


            
    }
?>