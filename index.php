<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./admin/index.php");
    exit;
}

require_once "./assets/php/config.php";

$username = $password = "";
$usernameError = $passwordError = $loginError = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["Username"]))){
        $usernameError = "Please enter your username.";
    } else{
        $username = trim($_POST["Username"]);
    }

    if(empty(trim($_POST["Password"]))){
        $passwordError = "Please enter your password.";
    } else{
        $password = trim($_POST["Password"]);
    }

    if(empty($usernameError) && empty($passwordError)){
        
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

                    $loginError = "Invalid Username or Password.";
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
    <link rel="stylesheet" href="./css/style.min.css">
</head>
<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-6 d-flex flex-column py-4 px-5">

            <?php
                if(!empty($loginError)){
                    echo '<div class="alert alert-danger mx-5">' . $loginError . '</div>';
                }
            ?>
                <div class="py-3 ps-5">
                        <h3 class="h-25">Brown Pearl</h3>
                </div>
                <div class="py-3 px-5">
                    <h1 class="mb-4 font-weight-bold h3">Log In</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-floating mb-2">
                            <input type="text" name="Username" id="Username" class="form-control <?php echo (!empty($usernameErroror)) ? 'is-invalid' : '';?>" placeholder="Username" value="<?php echo $username;?>">
                            <label for="Username">Username</label>
                            <span class="invalid-feedback">
                                <?php echo $usernameError;?>
                            </span>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="Password" id="Password" class="form-control <?php echo (!empty($passwordError)) ? 'is-invalid' : '';?>" placeholder="Password">
                            <label for="Password">Password</label>
                            <span class="invalid-feedback">
                                <?php echo $passwordError;?>
                            </span>
                        </div>
                        <div class="d-grid gap2">
                            <input type="submit" value="Login" class="btn btn-warning">
                        </div>
                    </form>
                </div>
            </div>    
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="./images/login.jpg" alt="" class="w-100 vh-100">
            </div>
        </div>
    </div>
</body>
</html>