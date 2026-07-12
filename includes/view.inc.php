<?php

declare(strict_types=1);

function getError()
{
    if (isset($_SESSION["erorr"])) {
        $error = $_SESSION["error"];
        foreach ($error as $error) {
            echo "<p class='error'>$error</p>";
        }
        unset($_SESSION['error']);
    }
}

getError();
