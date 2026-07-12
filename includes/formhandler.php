<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    try {
        require_once("dbh.inc.php"); // Connection
        require_once("modal.inc.php"); // DB Query
        require_once("contr.inc.php"); // Form controler

        // ERROR HANDLERS
        $errors = [];
        if (isEmpty($username, $email, $password)) {
            $errors["inputEmpty"] = "Fill in all field.";
        }

        if (invalidEmail($email)) {
            $errors["invalidEmail"] = "Please enter a valid email.";
        }

        if (isUsernameTaken($pdo, $username)) {
            $errors["usernameTaken"] = "Sorry, username is taken.";
        }

        if (existingEmail($pdo, $email)) {
            $errors["emailExists"] = "Email already exist.";
        }

        require_once("sessionConfig.php");

        // EFFOR LOOPS FROM VIEW FILE
        if ($errors) {
            $_SESSION["error"] = $errors;

            $userData = [
                "username" => $username,
                "email" => $email,
               
            ];
            $_SESSION["userData"] = $userData;
            header("Location: ../pages/signup.php?signup=error ");
            die();
        }

        createUser($pdo, $username, $email, $password);
        header("Location: ../pages/signup.php?signup=success");

        $stmt = null;
        $pdo = null;
    } catch (PDOException $e) {
        die("Something went wrong... " . $e->getMessage());
    }
} else {
    header("Location: ../pages/signup.php");
    die();
}
