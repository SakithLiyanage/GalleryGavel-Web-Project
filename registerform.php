<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="icon" href="images/fav-01-01.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/register.css">
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var reenterPassword = document.getElementById("reenterpassword").value;
            if (password != reenterPassword) {
                alert("Passwords do not match");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <img class="logo" src="images/navlogo-01.png" width="400px" alt="logo of the web site">
    <form action="register.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="container">
            <h1 class="title">Sign up</h1><hr style="width:200px; color:#3b4f6e;margin-top:-15px">
            <label for="firstname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="firstname" required>
            <label for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lastname" required>
            <br>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            <label for="phone"><b>Phone No</b></label>
            <input type="text" placeholder="Enter Phone no" name="phone" required>
            <br>
            <label for="dob"><b>Date of Birth</b></label>
            <input type="date" placeholder="Enter Date of Birth" name="dob" required>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <br><br>
            <label for="gender"><b>Gender</b></label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Password" name="password" id="password" required>

            <label for="reenterpassword"><b>Re-enter Password</b></label>
            <input type="password" placeholder="Re-enter Password" name="Rpassword" id="reenterpassword" required>
            <br>
            <h4>Register as a (select one)</h4>
            <input type="radio" name="role" value="buyer" required><b>Buyer</b>
            <input type="radio" name="role" value="seller" required><b>Seller</b>
            <br>
            <button type="submit">Sign Up</button>
            <br><br>
            <b>Already have an account </b><a href="loginform.php">Sign In</a>
        </div>
    </form>
</body>

</html>