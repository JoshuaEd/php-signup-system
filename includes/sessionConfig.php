<?php
ini_set("session.use_only_cookies", true);
ini_set("session.use_strict_mode", true);



session_set_cookie_params(
    [
        "lifetime" => 1800,
        "domain" => "localhost",
        "path" => "/",
        "secure" => true,
        "httponly" => true
    ]
);


session_start();

function sessionRegenerate()
{
    session_regenerate_id(true);
    $_SESSION["last_generation"] = time();
}

if (!isset($_SESSION["last_generation"])) {
    sessionRegenerate();
    // echo $_SESSION['last_generation'];
} else if (time() - $_SESSION["last_generation"] >= 1000) {
    sessionRegenerate();
}
