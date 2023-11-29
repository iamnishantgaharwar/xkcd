<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signinView.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>XKCD | rtCamp</title>
</head>

<body>
    <!-- Navbar Section -->
    <div class="container">
        <nav class="nav-logo"><a href="index.php">XKCD</a></nav>
        <ul class="list-items">
            <li class="item "><a class="btn-animation active" href="signin.php">Sign In</a></li>
            <li class="item "><a class="btn-animation" href="signup.php">Sign Up</a></li>
        </ul>
    </div>
    <!-- Form Section  -->
    <div class="form-container">
        <div class="form-card">
            <div class="login-card-logo">XKCD Login</div>
            <form action="./includes/signin.inc.php" method="post">
                <input class="input-item" type="text" name="userEmail" placeholder="Email" size="30" autocomplete="off"><br>
                <input class="input-item" type="password" name="userPass" id="" placeholder="Password" size="30"><br>
                <input class="btn btn-animation" type="submit" value="Sign In">
            </form>
            <a href="signup.php">Create Account</a>
            <?php checkLoginErrors(); ?>
        </div>
    </div>
</body>

</html>