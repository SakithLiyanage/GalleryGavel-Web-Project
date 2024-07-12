<?php

$con=new mysqli("localhost","root","","gallerygavel");

if($con->connect_error)
{
  die("connection failed".$con->connect_error);
}




?>