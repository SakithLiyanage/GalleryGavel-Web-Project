<?php

require 'config.php';

$Sql="SELECT  Full Name,Phone Number,Email,Message FROM customer1";

$result=$con->query($Sql);

if($result->num_rows >0){

while($row=$result->fetch_assoc())
{
 
    echo $row["Full Name"]." ".$row["Phone Number"]." ".$row["Email"]." ".$row["Message"]."<br>";

}

}

else{

    echo "no result";
}

$con->close();

?>