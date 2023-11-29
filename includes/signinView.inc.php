<?php

declare(strict_types=1);

function checkLoginErrors() {
    if (isset($_SESSION["errorLogin"])) {
        $errors = $_SESSION["errorLogin"];
        unset($_SESSION["errorLogin"]);
        echo "<br>";
        foreach ($errors as $error) {
            echo "<p class='errors'>" . $error . "</p>";
        }
    }
}