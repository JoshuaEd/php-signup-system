<?php
$dsn = "mysql:host=localhost; dbname=rerun";
$dbusername = "root";
$dbpassword = "Keoshua@1Ed";

try {

    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo " Connection Faild" . $e->getMessage();
}
