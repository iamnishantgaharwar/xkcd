<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["userName"];
    $useremail = $_POST["userEmail"];
    $userpass = $_POST["userPass"];
    $usercnfpass = $_POST["userCnfPass"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signupModel.inc.php';
        require_once 'signupContr.inc.php';

        // Error Handlers
        $errors = [];

        if (isInputEmpty($username, $useremail, $userpass, $usercnfpass)) {
            $errors["emptyInput"] = "Fill in all fields!";
        } else if (isEmailInvalid($useremail)) {
            $errors["emailInvalid"] = "Invalid Email!";
        }
        if (isEmailTaken($pdo, $useremail)) {
            $errors["emailTaken"] = "Email already taken!";
        }
        if (isPasswordIncorrect($userpass, $usercnfpass)) {
            $errors["incorrectPassword"] = "Incorrect Password!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errorSignup"] = $errors;
            $signData = [
                "username" => $username,
                "useremail" => $useremail
            ];
            $_SESSION["signupData"] = $signData;
            header("Location: ../signup.php");
            die();
        }

        create_user($pdo, $username, $useremail, $userpass);
        $_SESSION["signupSuccess"] = true;

        header("Location: ../signup.php");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../signup.php");
    die();
}
