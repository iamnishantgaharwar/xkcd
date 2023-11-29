<?php

// Activating Strict type

declare(strict_types=1);

//Function for checking empty fields
function isInputEmpty(string $username, string $useremail, string $userpass, string $usercnfpass)
{
    if (empty($username) || empty($useremail) || empty($userpass) || empty($usercnfpass)) {
        return true;
    } else {
        return false;
    }
}

// Function for checking valid email
function isEmailInvalid($useremail)
{
    if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Function to check if email is already registered
function isEmailTaken($pdo, $useremail)
{
    if (getEmail($pdo, $useremail)) {
        return true;
    } else {
        return false;
    }
}

// Function for checking password is correct
function isPasswordIncorrect($userpass, $usercnfpass)
{
    if ($userpass != $usercnfpass) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $username, string $useremail, string $userpass)
{
    setUser($pdo, $username, $useremail, $userpass);
}
