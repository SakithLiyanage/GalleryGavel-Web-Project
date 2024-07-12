<?php

require 'config.php';

$cname=$_POST["firstname"];
$pnum=$_POST["pnumber"] ;
$mail=$_POST["email"];
$message=$_POST["msg"];


$sql="INSERT INTO Message(Name, Tel_No, Email, msg) VALUES('$cname','$pnum','$mail','$message ')";

if($con->query($sql))
{

    echo "<link rel='stylesheet' href='styles/contactUs.css'><div class='success'>Message Sent successfully!<br><img src='https://www.icegif.com/wp-content/uploads/2023/08/icegif-727.gif' style='width:60%;border-radius:20px;'><br>Your Message : $message<br>";
    ?>
    <form action="updatemsg.php" method="POST">
        <input type="hidden" name="msgID" value="<?php echo mysqli_insert_id($con); ?>">
        <button type="submit" class='submit'>Edit Message <i class='fa-solid fa-trash'></i></button>
    </form>
    <form action="deletemsg.php" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this message?');">
        <input type="hidden" name="msgID" value="<?php echo mysqli_insert_id($con); ?>">
        <button type="submit" class='back'>Delete Message <i class='fa-solid fa-trash'></i></button>
    </form>
    <a href='contact.php'><button class='goback'>Go Back</button></a>
<?php
}

else{

    echo "error".$con->error;
}

$con->close();?>