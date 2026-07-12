<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    try {
        require_once("dbh.inc.php"); // Connection
        require_once("modal.inc.php"); // DB Query
        require_once("view.inc.php"); // Error
        require_once("contr.inc.php"); // Form controler

        $error = [];
        if (isEmpty($username, $email, $password)) {
            $error["inputEmpty"] = "Fill all field.";
        }

        if (invalidEmail($email)) {
            $error["invalidEmail"] = "Please enter a valid email.";
        }

        if (isUsernameTaken($pdo, $username)) {
            $error["usernameTaken"] = "Sorry, username is taken.";
        }

        if (existingEmail($pdo, $email)) {
            $error["emailExists"] = "Email already exist.";
        }

        require_once("sessionConfig.php");

        if (empty($error)) {
            $_SESSION["error"] = $error;

            header("Location: ../pages/signup.php");
        }
        header("Location: ../pages/signup.php");
        createUser($pdo, $username, $email, $password);
    } catch (PDOException $e) {
        die("Something went wrong... " . $e->getMessage());
    }
} else {
    header("Location: ../pages/login.php");
}
