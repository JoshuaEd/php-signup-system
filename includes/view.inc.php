<?php

declare(strict_types=1);

function signupData()
{
    // <label for="username">Username:</label>
    //         <input type="text" name="username" placeholder="Username">
    //         <label for="email">Email:</label>
    //         <input type="email" name="email" placeholder="Email">
    //         <label for="password">Password:</label>
    //         <input type="password" name="password" placeholder="Password">
    if (isset($_SESSION["userData"]["username"]) && !isset($_SESSION["errors"]['userData'])) {
        $userData = $_SESSION["userData"];
        $username = $userData["username"];
        $email = $userData["email"];


        echo "<label for='username'>Username:</label>";
        echo "<input type='text' name='username' placeholder='Username' value='$username'>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' name='email' placeholder='Email' value='$email'>";
        echo "<label for='password'>Password:</label>";
        echo "<input type='password' name='password' placeholder='Password' value=''>";

        unset($_SESSION['userData']);
    } else {
        echo "<label for='username'>Username:</label>";
        echo "<input type='text' name='username' placeholder='Username'>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' name='email' placeholder='Email'>";
        echo "<label for='password'>Password:</label>";
        echo "<input type='password' name='password' placeholder='Password'>";
    }
}


function getError()
{
    if (isset($_SESSION["error"])) {
        $errors = $_SESSION["error"];
        foreach ($errors as $error) {
            echo "<p class='error'>$error </p>";
        }
        unset($_SESSION['error']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<p class='success'>You have successfully signed up!</p>";
    }
}
