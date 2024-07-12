<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
    <link rel="icon" href="images/fav-01-01.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/stylelogin.css">
</head>

<body>
    <img class="logo" src="images/navlogo-01.png" width="500px" alt="logo of the web site">
    <form action="login.php" method="post">
        <div class="container">
            <h1>Sign In</h1><hr style="width:150px; color:#3b4f6e; margin-top:-10px;">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <h6><a href="#">Forgot Password</a></h6>
            <button type="submit">Login</button><br><br>
            <label>
                <input type="checkbox" checked="checked" name="remember">Remember me
            </label>
            <br>
            <br><b>Don't have an account </b><a href="registerform.php">Sign Up</a>
        </div>
    </form>
</body>

</html>
