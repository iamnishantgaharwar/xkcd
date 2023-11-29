<?php
require_once "includes/config_session.inc.php";

if (isset($_SESSION["loginSuccess"])) {
    echo "Hello " . $_SESSION["loginSuccess"]["xkcd_username"] ;
    echo "<br>";
    echo $_SESSION["loginSuccess"]["xkcd_email"] ;
} else {
    header("Location: signin.php");
}

?>

<a href="logout.php">Logout</a>