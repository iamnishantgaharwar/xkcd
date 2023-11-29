<?php
require_once "includes/config_session.inc.php";
require_once "includes/signupView.inc.php";
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
            <li class="item "><a class="btn-animation" href="signin.php">Sign In</a></li>
            <li class="item "><a class="btn-animation active" href="signup.php">Sign Up</a></li>
        </ul>
    </div>
    <!-- Form Section  -->
    <div class="form-container">
        <div class="form-card">
            <div class="login-card-logo">XKCD Register</div>
            <form action="./includes/signup.inc.php" method="post">
                <?php signupInputs() ?>
                <input class="input-item" type="password" name="userPass" id="userPassID" placeholder="Password" size="30"><br>
                <input class="input-item" type="password" name="userCnfPass" id="userCnfPassID" placeholder="Confirm Password" size="30"><br>
                <input class="btn btn-animation" name="submit" type="submit" value="Sign Up">
            </form>
            <a href="signin.php">Already have an account?</a>

            <?php
            checkSignUpErrors();
            ?>

        </div>
    </div>
</body>

</html>