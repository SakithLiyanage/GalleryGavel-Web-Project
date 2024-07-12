
<?php
    include 'config.php';

    $username=$_GET['username'];

    $query="DELETE FROM payment WHERE username='$username'";
    $data=mysqli_query($con,$query);

    if($data)
    {
        header("Location:payment.php");
    }
    else
    {
        echo "Delete unSuccessfully"; 
    }
?>