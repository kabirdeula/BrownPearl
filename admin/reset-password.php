<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    header("location: ./index.php");
    exit;
}

require_once "../assets/php/config.php";

$newPassword = $confirmPassword = "";
$newPasswordErr = $confirmPasswordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["newPassword"]))){
        
        $newPasswordErr = "Please enter the new password.";
    } elseif(strlen(trim($_POST["newPassword"])) < 6){
        
        $newPasswordErr = "Password must have atleast 6 characters.";
    } else{
        
        $newPassword = trim($_POST["newPassword"]);
    }

    if(empty(trim($_POST["confirmPassword"]))){
        
        $confirmPasswordErr = "Please confirm the password.";
    } else{
        
        $confirmPassword = trim($_POST["confirmPassword"]);
        
        if(empty($newPasswordErr) && ($newPassword != $confirmPassword)){
            
            $confirmPasswordErr = "Password did not match.";
        }
    }

    if(empty($newPasswordErr) && empty($confirmPasswordErr)){

        $sql = "UPDATE users SET Password = :password WHERE UserID = :id";

        if ($stmt = $pdo -> prepare($sql)) {
            
            $stmt -> bindParam(":password", $paramPassword, PDO::PARAM_STR);
            $stmt -> bindParam(":id", $paramID, PDO::PARAM_INT);

            $paramPassword = $newPassword;
            $paramID = $_SESSION["id"];

            if($stmt -> execute()){

                session_destroy();
                header("location: ../index.php");
                exit;
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
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-floating mb-3">
                <input type="password" name="newPassword" class="form-control <?php echo (!empty($newPasswordErr)) ? 'is-invalid' : '';?>" value="<?php echo $newPassword;?>" placeholder="New Password">
                <label>New Password</label>
                <span class="invalid-feedback"><?php echo $newPasswordErr;?></span>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="confirmPassword" class="form-control <?php echo (!empty($confirmPasswordErr)) ? 'is-invalid' : ''; ?>" placeholder="Confirm Password">
                <label>Confirm Password</label>
                <span class="invalid-feedback"><?php echo $confirmPasswordErr;?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
                <a href="./index.php" class="btn btn-link ml-2">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>