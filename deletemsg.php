<?php

require "config.php";


$sql = "DELETE FROM message WHERE msgID ='{$_POST["msgID"]}'";

if ($con->query($sql)) {

    echo "<link rel='stylesheet' href='styles/contactUs.css'><div class='success'>Message Deleted successfully!<br><img src='https://www.icegif.com/wp-content/uploads/2023/08/icegif-727.gif' style='width:60%;border-radius:20px;'><br>
        
        <a href='contact.php'><button class='goback'>Go Back</button></a>";
} else {

    echo "Not successful";
}




?>