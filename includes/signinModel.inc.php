<?php 

declare(strict_types=1);

function getUserData(object $pdo, string $useremail){
    $query = "SELECT * FROM users WHERE xkcd_email = :useremail;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":useremail", $useremail);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}