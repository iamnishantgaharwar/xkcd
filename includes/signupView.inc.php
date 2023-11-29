<?php

// Activating Strict type

declare(strict_types=1);

function signupInputs() {
    if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<input class="input-item" type="text" name="userName" id="userNameID" placeholder="Name" size="30"><br>';
        echo '<input class="input-item" type="text" name="userEmail" id="userEmailID" placeholder="Email" size="30" autocomplete="off"><br>';
        unset($_SESSION["signupData"]);
    } else {
        if (isset($_SESSION["signupData"]["username"])) {
            echo '<input class="input-item" type="text" name="userName" id="userNameID" placeholder="Name" size="30" value="' . $_SESSION["signupData"]["username"] . '"><br>';
        } else{
            echo '<input class="input-item" type="text" name="userName" id="userNameID" placeholder="Name" size="30"><br>';
        }
        if (isset($_SESSION["signupData"]["useremail"]) && !isset($_SESSION["errorSignup"]["emailTaken"])) {
            echo '<input class="input-item" type="text" name="userEmail" id="userEmailID" placeholder="Email" size="30" autocomplete="off" value="' . $_SESSION["signupData"]["useremail"] . '"><br>';
        } else{
            echo '<input class="input-item" type="text" name="userEmail" id="userEmailID" placeholder="Email" size="30" autocomplete="off"><br>';
        }
        unset($_SESSION["signupData"]);
    }
}

function checkSignUpErrors()
{
    if (isset($_SESSION["errorSignup"])) {
        $errors = $_SESSION["errorSignup"];
        echo "<br>";
        foreach ($errors as $error) {
            echo "<p class='errors'>" . $error . "</p>";
        }
        unset($_SESSION["errorSignup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo "<p class='errors'>Signup success!</p>";
        header("Refresh: 3; URL= ./signin.php ");
    } 
}
