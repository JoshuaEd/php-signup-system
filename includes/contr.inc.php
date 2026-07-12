<?php

declare(strict_types=1);
require_once("dbh.inc.php");
require_once("modal.inc.php");
require_once("view.inc.php");
function isEmpty(string $username, string $email, string $password)
{
    if (empty($username) || empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}
function invalidEmail(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function isUsernameTaken(object $pdo, string $username)
{
    if (getUsername($pdo,  $username)) {
        return true;
    } else {
        return false;
    }
}

function existingEmail(object $pdo, string $email)
{

    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function createUser(object $pdo, string $username, string $email, string $password)
{
    setUser($pdo,  $username, $email,  $password);
}
