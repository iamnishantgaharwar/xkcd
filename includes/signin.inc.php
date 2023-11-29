<?php 

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Collecting data form form
    $useremail = $_POST["userEmail"];
    $userpass = $_POST["userPass"];


    try {
        //Required files
        require_once 'dbh.inc.php';
        require_once 'signinModel.inc.php';
        require_once 'signinContr.inc.php';
        
        //Error Handlers
        $errors = [];
        $result = getUserData($pdo, $useremail);
        if (isInputEmpty($useremail,  $userpass)) {
            $errors["emptyInput"] = "Fill in all fields!";
        } elseif (isEmailValid($useremail)) {
            $errors["invalidEmail"] =   "Invalid Email!";
        } elseif (useremailWrong($result)){
            $errors["loginIncorrect"] = "Invalid Credentials!";
        } elseif (!useremailWrong($result) && userpassWrong($userpass, $result["xkcd_pwd"])) {
            $errors["loginIncorrect"] = "Invalid Credentials!";
        }

        //Handling
        require_once 'config_session.inc.php';
        if ($errors) {
            $_SESSION["errorLogin"] = $errors;

            $newSessionId = session_create_id();
            $sessionId = $newSessionId . "_" . $result["xkcd_userid"];
            session_id($sessionId);
            header("Location: ../signin.php");
            die();

        } else {
            $_SESSION["loginSuccess"] = $result;
            header("Location: ../dashboard.php");
        }

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../signin.php");
    die();
}