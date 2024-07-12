<!DOCTYPE html>
<html>

<head>
    <title>
        Update Profile
    </title>

    <link rel="stylesheet" href="styles/register.css">

    <style>
        input[type="text"],
        [type="email"],
        [type=date],
        [type=password] {
            width: 60%;
            padding: 10px 10px 10px 10px;
            margin: 6px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 90px;
            border-radius: 10px;

        }
    </style>

</head>

<body>
    <?php
    session_start();
    require 'config.php';

    // Check if user ID is provided
    if (isset($_POST['userID'])) {
        $userID = $_POST['userID'];

        $result = mysqli_query($con, "SELECT * FROM users WHERE userID = $userID");
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="container" style="margin-top:50px">

                <div class="column">
                    <div>
                        <h2>Update Profile</h2>
                        <form method="POST" action="update_account.php">

                            <table width="100%">
                                <tr>
                                    <td>
                                        <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                                        <label for="fname"> First Name</label><br>
                                        <input type="text" id="fname" name="firstname" value="<?php echo $row['Fname']; ?>"><br>
                                    </td>
                                    <td>
                                        <label for="lname"> Last Name</label><br>
                                        <input type="text" id="fname" name="lastname" value="<?php echo $row['Lname']; ?>"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="number">Phone Number</label><br>
                                        <input type="text" id="lname" name="pnumber"
                                            value="<?php echo $row['Phone_no']; ?>"><br>
                                    </td>
                                    <td>
                                        <label for="mail"> Email </label><br>
                                        <input type="text" id="mail" name="email" value="<?php echo $row['Email']; ?>"> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="DOB"> DOB </label><br>
                                        <input type="date" id="mail" name="DOB" value="<?php echo $row['DOB']; ?>">
                                        <br>
                                    </td>
                                    <td>
                                    </td>

                                <tr>
                                    <td>
                                        <label for="pw"> Password </label><br>
                                        <input type="password" id="mail" name="pw" value="<?php echo $row['Password']; ?>">
                                        <br>
                                    </td>
                                    <td>
                                        <label for="rpw">Re-enter Password </label><br>
                                        <input type="password" id="mail" name="rpw" value="<?php echo $row['Rpassword']; ?>">
                                        <br>
                                    </td>
                                </tr>

                                <td>
                                    <input type="submit" style="font-size: medium;font-weight: bold;margin-left:200px;padding:15px 15px 15px 15px;backgroud-color:#ccc;" value="Update Profile">
                                </td>
                                <td></td>
                            </table>
                    </div>
                </div>
            </div>

            </form>
            <?php
        } else {
            echo "Account not found.";
        }
    } else {
        echo "User ID not provided.";
    }
    ?>
</body>

</html>