<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    header("location: ./index.php");
    exit();
}

require_once "../assets/php/config.php";

if(isset($_GET["RegNo"]) && !empty(trim($_GET["RegNo"]))){

    $RegNo = $_GET["RegNo"];
    $sql = $pdo -> prepare("DELETE FROM student WHERE RegNo = :RegNo");
    $sql -> bindParam(':RegNo', $RegNo);

    if($sql -> execute()){
        header("location: ./students.php");
        exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>