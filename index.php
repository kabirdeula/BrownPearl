<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./admin/index.php");
    exit;
}

require_once "./assets/php/config.php";

$username = $password = "";
$usernameErr = $passwordErr = $loginErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["Username"]))){
        $usernameErr = "Please enter your username.";
    } else{
        $username = trim($_POST["Username"]);
    }

    if(empty(trim($_POST["Password"]))){
        $passwordErr = "Please enter your password.";
    } else{
        $password = trim($_POST["Password"]);
    }

    if(empty($usernameErr) && empty($passwordErr)){
        
        $sql = "SELECT UserID, Username, Password FROM users WHERE Username = :username";

        if($stmt = $pdo -> prepare($sql)){

            $stmt -> bindParam(":username", $param_username, PDO::PARAM_STR);

            $param_username = trim($_POST["Username"]);

            if($stmt -> execute()){

                if($stmt -> rowCount() == 1){

                    if($row = $stmt -> fetch()){

                        $id = $row["UserID"];
                        $username = $row["Username"];
                        $password = $row["Password"];

                        session_start();

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        header("location: ./admin/index.php");
                    }
                } else{

                    $loginErr = "Invalid Username or Password.";
                }
            } else{

                echo "Oops! Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }

    unset($pdo);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        body{font: 14px sans-serrif;}
        .wrapper{width:360px; padding: 20px;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if(!empty($loginErr)){
            echo '<div class="alert alert-danger">' . $loginErr . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-floating mb-3">
                <input type="text" name="Username" class="form-control <?php echo (!empty($usernameErr)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username">
                <label>Username</label>
                <span class="invalid-feedback">
                    <?php echo $usernameErr;?>
                </span>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="Password" class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>" placeholder="Password">
                <label>Password</label>
                <span class="invalid-feedback">
                    <?php echo $passwordErr;?>
                </span>
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>