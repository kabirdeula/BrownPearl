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

$FirstNameError = $LastNameError = $GenderError = $PermanentAddressError = $TemporaryAddressError = $MobileError = '';
$EmailError = $DOBError = $ProfilePhotoError = $FatherNameError = $FatherOccupationError = $FatherMobileError = '';
$MotherNameError = $MotherOccupationError = $MotherMobileError = ''; 

if(isset($_POST["register"])){
    $FirstName = $_POST["FirstName"];
}

// $userNameError = "Username";
// $firstNameError = "First Name";
// $lastNameError = "Last Name";
// $emailError = "Email Address";
// $passwordError = "Password";
// if(isset($_POST['register'])){
//     $userName = $_POST['userName'];
//     $firstName = $_POST['firstName'];
//     $lastName = $_POST['lastName'];
//     $email = $_POST['email'];
//     $userPassword = $_POST['userPassword'];

//     if (empty($userName)){
//         $userNameError = "Username can't be blank.";
//         $error = true;
//     }
//     if (empty($firstName)){
//         $firstNameError = "First Name can't be blank.";
//         $error = true;
//     }
//     if(empty($lastName)){
//         $lastNameError = "Last Name can't be blank.";
//         $error = true;
//     }

//     if(empty($email)){
//         $emailError = "Email can't be blank.";
//         $error = true;
//     }

//     if(empty($password)){
//         $passwordError = "Password can't be blank.";
//         $error = true;
//     }

//     if (!preg_match("/^[a-zA-Z ]+$/",$firstName)) {
//         $firstNameError = "First name must contain only alphabets and space";
//         $error = true;
//     }

//     if (!preg_match("/^[a-zA-Z ]+$/",$lastName)) {
//         $lastNameError = "Last name must contain only alphabets and space";
//         $error = true;
//     }

//     if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
//         $emailError = "Please Enter Valid Email ID";
//         $error = true;
//     }

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
                            <input type="text" name="FirstName" class="form-control" placeholder="First Name">
                        </div>
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="MiddleName" class="form-control" placeholder="Middle Name">
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="LastName" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="PermanentAddress" class="form-control" placeholder="Permanent Address">
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" name="TemporaryAddress" class="form-control" placeholder="Temporary Address">
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            
                            <?php foreach ($gender as $key => $value):?>
                            <input type="radio" name="Gender" id="gender_<?php echo $key?>" value="<?php echo $key?>">
                            <label for="gender_<?php echo $key?>" class="mr-4 mt-2"><?php echo $value;?></label>
                            <?php endforeach ?>
                        </div>
                        
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="number" name="Mobile" class="form-control" placeholder="Mobile Number">
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="email" name="Email" class="form-control" placeholder="Email">
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="date" name="DOB" class="form-control">
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