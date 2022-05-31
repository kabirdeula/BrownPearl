<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: ./index.php");
    exit;
}

$gender = [
    'male' => 'Male',
    'female' => 'Female'
];

require_once '../assets/php/config.php';

$FirstNameError = $LastNameError = $GenderError = $PermanentAddressError = $TemporaryAddressError = $MobileError = $EmailError = $DOBError = $ProfilePhotoError = $FatherNameError = $FatherOccupationError = $FatherMobileError = $MotherNameError = $MotherOccupationError = $MotherMobileError = '';

if(isset($_POST["register"])){
    $FirstName = $_POST["FirstName"];
    $MiddleName = $_POST["MiddleName"];
    $LastName = $_POST["LastName"];
    $Gender = $_POST["Gender"];
    $PermanentAddress = $_POST["PermanentAddress"];
    $TemporaryAddress = $_POST["TemporaryAddress"];
    $Mobile = $_POST["Mobile"];
    $Email = $_POST["Email"];
    $DOB = $_POST["DOB"];
    $ProfilePhoto = $_POST["ProfilePhoto"];
    $FatherName = $_POST["FatherName"];
    $FatherOccupation = $_POST["FatherOccupation"];
    $FatherMobile = $_POST["FatherMobile"];
    $MotherName = $_POST["MotherName"];
    $MotherOccupation = $_POST["MotherOccupation"];
    $MotherMobile = $_POST["MotherMobile"];
    $GuardianName = $_POST["GuardianName"];
    $GuardianOccupation = $_POST["GuardianOccupation"];
    $GuardianMobile = $_POST["GuardianMobile"];
    $SpouseName = $_POST["SpouseName"];
    $SpouseOccupation = $_POST["SpouseOccupation"];
    $SpouseMobile = $_POST["SpouseMobile"];

    if (empty(trim($FirstName))){
        $FirstNameError = "Name can't be empty";
        $Error = true;
    } elseif(strlen(trim($FirstName)) < 3){
        $FirstNameError = "First Name must be more than two alphabets.";
        $Error = true;
    } elseif (!preg_match("/^[a-zA-Z ]+$/",$FirstName)) {
        $FirstNameError = "First name must contain only alphabets";
        $Error = true;
    } else{
        $Error = false;
    }

    if (empty(trim($LastName))){
        $LastNameError = "Name can't be empty";
        $Error = true;
    } elseif(strlen(trim($LastName)) < 3){
        $LastNameError = "Last Name must be more than two alphabets.";
        $Error = true;
    } elseif (!preg_match("/^[a-zA-Z ]+$/",$LastName)) {
        $LastNameError = "Last name must contain only alphabet";
        $Error = true;
    }else{
        $Error = false;
    }

    if (empty(trim($PermanentAddress))){
        $PermanentAddressError = "Address can't be empty";
        $Error = true;
    } else{
        $Error = false;
    }

    if (empty(trim($TemporaryAddress))){
        $TemporaryAddressError = "Address can't be empty";
        $Error = true;
    } else{
        $Error = false;
    }

    if (empty(trim($Gender))){
        $GenderError = "Gender must be specified";
        $Error = true;
    } else{
        $Error = false;
    }

    if (empty(trim($Mobile))){
        $MobileError = "Mobile Number can't be empty";
        $Error = true;
    } elseif (strlen(trim($Mobile)) < 10){
        $MobileError = "Mobile Number must be of 10 numbers.";
        $Error = true;
    }else{
        $Error = false;
    }

    if (empty(trim($Email))){
        $EmailError = "Email can't be empty.";
        $Error = true;
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $EmailError = "Please enter a valid email.";
        $Error = true;
    }else{
        $Error = false;
    }

    if (empty(trim($DOB))){
        $DOBError = "Date can't be empty.";
        $Error = true;
    } else{
        $Error = false;
    }
    

    if(!$Error){
        echo $FirstName . ' ' . $MiddleName . ' ' . $LastName;
        echo "<br>\n" . $PermanentAddress . "<br>\n" . $TemporaryAddress;
        echo "<br>\n" . $Gender . "<br>\n" . $Mobile . "<br>\n" . $Email;
        echo "<br>\n" . $DOB . "<br>\n" . $FatherName . "<br>\n" . $FatherOccupation . "<br>\n" . $FatherMobile;
        echo "<br>\n" . $MotherName . "<br>\n" . $MotherOccupation . "<br>\n" . $MotherMobile;
        echo "<br>\n" . $GuardianName . "<br>\n" . $GuardianOccupation . "<br>\n" . $GuardianMobile;
        echo "<br>\n" . $SpouseName . "<br>\n" . $SpouseOccupation . "<br>\n" . $SpouseMobile;
    }
}

// if(isset($_POST['register'])){

//     if(strlen($password) < 6) {
//         $passwordError = "Password must be minimum of 6 characters";
//     }
    
//     if(!$error){
//         $sql = "INSERT INTO users(userName, firstName, lastName, email,userPassword)VALUES('$userName', '$firstName', '$lastName', '$email', '$userPassword')";
//         if (mysqli_query($conn, $sql)) {
//             echo '<script type ="text/JavaScript">';  
//             echo 'alert("Data Inserted Successfully")';  
//             echo '</script>';
//             header("location: ../users.php");  
            
//         } else {
//             echo "Error: " . $sql . ":-" . mysqli_error($conn);
//         }
//         mysqli_close($conn);
//     }
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
</head>
<body id="page-top">
    <?php include 'header.php';?>

    <!-- Beigin Page Content -->
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Add New Record</h1>

        <div class="card shadow mb-4">
            <div class="card-body p-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" class="my-4">

                    <h1 class="h4 text-secondary">Student Details</h1>
                    
                    <div class="form-group row">            
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="FirstName" class="form-control <?php echo (!empty($FirstNameError)) ? 'border-danger' : '';?>" value="<?php echo $FirstName;?>" placeholder="First Name">
                            <span class="text-danger"><?php echo $FirstNameError;?></span>
                        </div>
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="MiddleName" class="form-control" placeholder="Middle Name" value="<?php echo $MiddleName;?>">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="LastName" class="form-control <?php echo (!empty($LastNameError)) ? 'border-danger' : '';?>"  placeholder="Last Name" value="<?php echo $LastName;?>">
                            <span class="text-danger"><?php echo $LastNameError?></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="PermanentAddress" class="form-control <?php echo (!empty($PermanentAddressError)) ? 'border-danger' : '';?>" placeholder="Permanent Address" value="<?php echo $PermanentAddress;?>">
                            <span class="text-danger"><?php echo $PermanentAddressError;?></span>
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="TemporaryAddress" class="form-control <?php echo (!empty($TemporaryAddressError)) ? 'border-danger' : '';?>" placeholder="Temporary Address" value="<?php echo $TemporaryAddress;?>">
                            <span class="text-danger"><?php echo $TemporaryAddressError;?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            
                            <?php foreach ($gender as $key => $value):?>
                            <input type="radio" name="Gender" id="gender_<?php echo $key?>" value="<?php echo $key?>">
                            <label for="gender_<?php echo $key?>" class="mr-4 mt-2"><?php echo $value;?></label>
                            <?php endforeach ?>
                            <span class="text-danger"><?php echo $GenderError;?></span>
                        </div>
                        
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="number" name="Mobile" class="form-control <?php echo (!empty($MobileError)) ? 'border-danger' : '';?>" placeholder="Mobile Number">
                            <span class="text-danger"><?php echo $MobileError;?></span>
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="text" name="Email" class="form-control <?php echo (!empty($EmailError)) ? 'border-danger' : '';?>" placeholder="Email">
                            <span class="text-danger"><?php echo $EmailError;?></span>
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="date" name="DOB" class="form-control <?php echo (!empty($DOBError)) ? 'border-danger' : '';?>">
                            <span class="text-danger"><?php echo $DOBError?></span>
                        </div>

                    </div>

                    <hr>
                    <h1 class="h4 text-secondary">Parent Details</h1>
                    <div class="form-group row">
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="FatherName" class="form-control" placeholder="Father's Name">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="FatherOccupation" class="form-control" placeholder="Father's Occupation">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="number" name="FatherMobile" class="form-control" placeholder="Father's Mobile Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="MotherName" class="form-control" placeholder="Mother's Name">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="MotherOccupation" class="form-control" placeholder="Mother's Occupation">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="number" name="MotherMobile" class="form-control" placeholder="Mother's Mobile Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="GuardianName" class="form-control" placeholder="Guardian's Name">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="GuardianOccupation" class="form-control" placeholder="Guardian's Occupation">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="number" name="GuardianMobile" class="form-control" placeholder="Guardian's Mobile Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="SpouseName" class="form-control" placeholder="Spouse's Name">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="SpouseOccupation" class="form-control" placeholder="Spouse's Occupation">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="number" name="SpouseMobile" class="form-control" placeholder="Spouse's Mobile Number">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" value="Submit" name="register">
                </form>
            </div>
        </div>
    </div>
    
    <!-- End Page Content -->
</div>
    <?php include 'footer.php';?>
</body>
</html>