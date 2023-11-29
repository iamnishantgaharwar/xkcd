<?php

declare(strict_types=1);

function isInputEmpty(string $useremail, string $userpass) {
    if (empty($useremail) || empty($userpass)) {
        return true;
    } else {
        return false;
    }
}

function isEmailValid(string $useremail) {
    if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function getUser(object $pdo, string $useremail, string $userpass ) {
    getUserData($pdo,  $useremail,  $userpass);
}

function useremailWrong(bool|array $reuslt){
    if(!$reuslt){
        return true;
    } else {
        return false;
    }
}

function userpassWrong(string $userpass, string $hashedpwd) {
    if (!password_verify($userpass, $hashedpwd)) {
        return true;
    } else {
        return false;
    }
}