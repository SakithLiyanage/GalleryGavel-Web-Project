<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $Rpassword = $_POST['Rpassword'];
    $role = $_POST['role'];

    // Insert user data into database
    $sql = "INSERT INTO users (Fname, Lname, Email, Phone_no, DOB, Username, Gender, Password,Rpassword, role) 
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$dob', '$username', '$gender', '$password','$Rpassword', '$role')";
    if (mysqli_query($con, $sql)) {
        echo "<link rel='stylesheet'href='styles/addnew.css'><div class='success'>Registration Successfull!<br><iframe src='https://gifer.com/embed/7efs' width=300 height=300.000 frameBorder='0'style='border-radius:20%';></iframe><br><a href='loginform.php'><button class='back'>Log In</button></a>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
