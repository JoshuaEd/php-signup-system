<?php

declare(strict_types=1);

require_once("dbh.inc.php");

function getUsername(object $pdo, string $username)
{

    $query = "SELECT username FROM desktop WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();

    $fetched = $stmt->fetch(PDO::FETCH_ASSOC);

    return $fetched;
}

function getEmail(object $pdo, string $email)
{

    $query = "SELECT email FROM desktop WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    $fetched = $stmt->fetch(PDO::FETCH_ASSOC);

    return $fetched;
}


function setUser(object $pdo, string $username, string $email, string $password)
{
    $query = "INSERT INTO desktop(username, email, pswd) VALUES (:username, :email, :pswd);";
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(":username", $username, PDO::PARAM_STR);
    $stmt->bindparam(":email", $email, PDO::PARAM_STR);
    $stmt->bindparam(":pswd", $password, PDO::PARAM_STR);

    $passCost = ["cost" => 12];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $passCost);
    $stmt->execute(["username" => $username, "email" => $email, "pswd" => $hashedPassword]);
}
