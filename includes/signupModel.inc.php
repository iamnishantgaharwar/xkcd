<?php

// Activating Strict type

declare(strict_types=1);

function getEmail(object $pdo, string $useremail)
{
    $query = "SELECT xkcd_email FROM users where xkcd_email = :useremail;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":useremail", $useremail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function setUser(object $pdo, string $username, string $useremail, string $userpass)
{
    $query = "INSERT INTO users (xkcd_username, xkcd_email, xkcd_pwd) VALUES(:username, :useremail, :userpass)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($userpass, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":useremail", $useremail);
    $stmt->bindParam(":userpass", $hashedPwd);
    $stmt->execute();
}
