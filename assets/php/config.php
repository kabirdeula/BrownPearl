<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'kabirdeula');
define('DB_PASSWORD', 'lunala');
define('DB_NAME', 'brownpearl');

try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error: Could not connect. " . $e -> getMessage());
}
?>