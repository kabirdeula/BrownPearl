<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: ./index.php");
    exit;
}

$gender = [
    'Male' => 'Male',
    'Female' => 'Female'
];

require_once '../assets/php/config.php';

$FirstNameError = $LastNameError = $GenderError = $PermanentAddressError = $TemporaryAddressError = $MobileError = $EmailError = $DOBError = $ProfilePhotoError = $FatherNameError = $FatherOccupationError = $FatherMobileError = $MotherNameError = $MotherOccupationError = $MotherMobileError = $FacultyError = $LevelError = $ProgramError = $SemesterError = '';

if(isset($_POST["register"])){

    try{
        $FirstName = $_POST["FirstName"];
        $MiddleName = $_POST["MiddleName"];
        $LastName = $_POST["LastName"];
        $Gender = $_POST["Gender"];
        $PermanentAddress = $_POST["PermanentAddress"];
        $TemporaryAddress = $_POST["TemporaryAddress"];
        $Mobile = $_POST["Mobile"];
        $Email = $_POST["Email"];
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
        $Faculty = $_POST["Faculty"];
        $Level = $_POST["Level"];
        $Program = $_POST["Program"];
        $Semester = $_POST["Semester"];

        if (empty(trim($FirstName))){
            $FirstNameError = "Name can't be empty.";
            $Error = true;
        } elseif(strlen(trim($FirstName)) < 3){
            $FirstNameError = "First Name must be more than two alphabets.";
            $Error = true;
        } elseif (!preg_match("/^[a-zA-Z ]+$/",$FirstName)) {
            $FirstNameError = "First name must contain only alphabets.";
            $Error = true;
        } else{
            $FirstNameError = '';
            $Error = false;
        }

        if (empty(trim($LastName))){
            $LastNameError = "Name can't be empty.";
            $Error = true;
        } elseif(strlen(trim($LastName)) < 3){
            $LastNameError = "Last Name must be more than two alphabets.";
            $Error = true;
        } elseif (!preg_match("/^[a-zA-Z ]+$/",$LastName)) {
            $LastNameError = "Last name must contain only alphabet.";
            $Error = true;
        }else{
            $Error = false;
        }

        if (empty(trim($PermanentAddress))){
            $PermanentAddressError = "Address can't be empty.";
            $Error = true;
        } else{
            $Error = false;
        }

        if (empty(trim($TemporaryAddress))){
            $TemporaryAddressError = "Address can't be empty.";
            $Error = true;
        } else{
            $Error = false;
        }

        if (empty(trim($Gender))){
            $GenderError = "Gender must be specified.";
            $Error = true;
        } else{
            $Error = false;
        }

        if (empty(trim($Mobile))){
            $MobileError = "Mobile Number can't be empty.";
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
    
        if (empty(trim($FatherName))){
            $FatherNameError = "Father Name can't be empty.";
            $Error = true;
        } elseif (!preg_match("/^[a-zA-Z ]+$/",$FatherName)) {
            $FatherNameError = "Father name must contain only alphabet.";
            $Error = true;
        }else{
            $Error = false;
        }

        if (empty(trim($FatherOccupation))){
            $FatherOccupationError = "Father Occupation can't be empty.";
            $Error = true;
        } elseif (!preg_match("/^[a-zA-Z ]+$/",$FatherOccupation)) {
            $FatherOccupationError = "Father Occupation must contain only alphabet.";
            $Error = true;
        }else{
            $Error = false;
        }

        if (empty(trim($FatherMobile))){
            $FatherMobileError = "Mobile Number can't be empty.";
            $Error = true;
        } elseif (strlen(trim($FatherMobile)) < 10){
            $FatherMobileError = "Mobile Number must be of 10 numbers.";
            $Error = true;
        }else{
            $Error = false;
        }
    
        if (empty(trim($MotherName))){
            $MotherNameError = "Mother Name can't be empty.";
            $Error = true;
        } elseif (!preg_match("/^[a-zA-Z ]+$/",$MotherName)) {
            $FatherNameError = "Mother name must contain only alphabet.";
            $Error = true;
        }else{
            $Error = false;
        }

        if (empty(trim($MotherOccupation))){
            $MotherOccupationError = "Mother Occupation can't be empty.";
            $Error = true;
        } elseif (!preg_match("/^[a-zA-Z ]+$/",$MotherOccupation)) {
            $MotherOccupationError = "Mother Occupation must contain only alphabet.";
            $Error = true;
        }else{
            $Error = false;
        }

        if (empty(trim($MotherMobile))){
            $MotherMobileError = "Mobile Number can't be empty.";
            $Error = true;
        } elseif (strlen(trim($MotherMobile)) < 10){
            $MotherMobileError = "Mobile Number must be of 10 numbers.";
            $Error = true;
        }else{
            $Error = false;
        }

        if (empty(trim($Faculty))){
            $FacultyError = "Faculty can't be empty.";
            $Error = true;
        } else{
            $Error = false;
        }

        if (empty(trim($Level))){
            $LevelError = "Level can't be empty.";
            $Error = true;
        } else{
            $Error = false;
        }

        if (empty(trim($Program))){
            $ProgramError = "Program can't be empty.";
            $Error = true;
        } else{
            $Error = false;
        }

        if (empty(trim($Semester))){
            $SemesterError = "Semester can't be empty.";
            $Error = true;
        } else{
            $Error = false;
        }
    
        $stmt = $pdo -> prepare("SELECT * FROM student WHERE email=?");
        $stmt -> execute([$Email]);

        $EmailCheck = $stmt -> fetch();

        if ($EmailCheck){
            $EmailError = "Email Already Exists.";
            $Error = true;
        } elseif (!$Error){
        
            $sql = $pdo -> prepare("INSERT INTO student(FirstName, MiddleName, LastName, Gender, PermanentAddress, TemporaryAddress, Mobile, Email, FatherName, FatherOccupation, FatherMobile, MotherName, MotherOccupation, MotherMobile, GuardianName, GuardianOccupation, GuardianMobile, SpouseName, SpouseOccupation, SpouseMobile, Faculty, Level, Program, Semester) VALUES (:FirstName, :MiddleName, :LastName, :Gender, :PermanentAddress, :TemporaryAddress, :Mobile, :Email, :FatherName, :FatherOccupation, :FatherMobile, :MotherName, :MotherOccupation, :MotherMobile, :GuardianName, :GuardianOccupation, :GuardianMobile, :SpouseName, :SpouseOccupation, :SpouseMobile, :Faculty, :Level, :Program, :Semester)");

            $sql -> bindParam(':FirstName', $FirstName);
            $sql -> bindParam(':MiddleName', $MiddleName);
            $sql -> bindParam(':LastName', $LastName);
            $sql -> bindParam(':Gender', $Gender);
            $sql -> bindParam(':PermanentAddress', $PermanentAddress);
            $sql -> bindParam(':TemporaryAddress', $TemporaryAddress);
            $sql -> bindParam(':Mobile', $Mobile);
            $sql -> bindParam(':Email', $Email);
            $sql -> bindParam(':FatherName', $FatherName);
            $sql -> bindParam(':FatherOccupation', $FatherOccupation);
            $sql -> bindParam(':FatherMobile', $FatherMobile);
            $sql -> bindParam(':MotherName', $MotherName);
            $sql -> bindParam(':MotherOccupation', $MotherOccupation);
            $sql -> bindParam(':MotherMobile', $MotherMobile);
            $sql -> bindParam(':GuardianName', $GuardianName);
            $sql -> bindParam(':GuardianOccupation', $GuardianOccupation);
            $sql -> bindParam(':GuardianMobile', $GuardianMobile);
            $sql -> bindParam(':SpouseName', $SpouseName);
            $sql -> bindParam(':SpouseOccupation', $SpouseOccupation);
            $sql -> bindParam(':SpouseMobile', $SpouseMobile);
            $sql -> bindParam(':Faculty',$Faculty);        
            $sql -> bindParam(':Level',$Level);
            $sql -> bindParam(':Program',$Program);
            $sql -> bindParam(':Semester',$Semester);        

            $sql -> execute();

            header("location: ./students.php");
        }
    } catch(PDOException $e){
        die($e -> getMessage());
    }
    
    
}

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
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
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            
                            <?php foreach ($gender as $key => $value):?>
                            <input type="radio" name="Gender" id="gender_<?php echo $key?>" value="<?php echo $key?>">
                            <label for="gender_<?php echo $key?>" class="mr-4 mt-2"><?php echo $value;?></label>
                            <?php endforeach ?>
                            <span class="text-danger"><?php echo $GenderError;?></span>
                        </div>
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="number" name="Mobile" class="form-control <?php echo (!empty($MobileError)) ? 'border-danger' : '';?>" placeholder="Mobile Number" value="<?php echo $Mobile;?>">
                            <span class="text-danger"><?php echo $MobileError;?></span>
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="Email" class="form-control <?php echo (!empty($EmailError)) ? 'border-danger' : '';?>" placeholder="Email" value="<?php echo $Email;?>">
                            <span class="text-danger"><?php echo $EmailError;?></span>
                        </div>

                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="text" name="Faculty" class="form-control <?php echo (!empty($FacultyError)) ? 'border-danger' : '';?>" placeholder="Faculty" value="<?php echo $Faculty;?>">
                            <span class="text-danger"><?php echo $FacultyError?></span>
                        </div>
                        
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="text" name="Level" class="form-control <?php echo (!empty($LevelError)) ? 'border-danger' : '';?>" placeholder="Level" value="<?php echo $Level;?>">
                            <span class="text-danger"><?php echo $LevelError;?></span>
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="text" name="Program" class="form-control <?php echo (!empty($ProgramError)) ? 'border-danger' : '';?>" placeholder="Program" value="<?php echo $Program;?>">
                            <span class="text-danger"><?php echo $ProgramError;?></span>
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="text" name="Semester" class="form-control <?php echo (!empty($SemesterError)) ? 'border-danger' : '';?>" placeholder="Semester" value="<?php echo $Semester;?>">
                            <span class="text-danger"><?php echo $SemesterError;?></span>
                        </div>

                    </div>

                    <hr>
                    <h1 class="h4 text-secondary">Parent Details</h1>
                    <div class="form-group row">
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="FatherName" class="form-control <?php echo (!empty($FatherNameError)) ? 'border-danger' : '';?>" placeholder="Father's Name" value="<?php echo $FatherName;?>">
                            <span class="text-danger"><?php echo $FatherNameError;?></span>
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="FatherOccupation" class="form-control <?php echo (!empty($FatherOccupationError)) ? 'border-danger' : '';?>" placeholder="Father's Occupation" value="<?php echo $FatherOccupation;?>">
                            <span class="text-danger"><?php echo $FatherOccupationError;?></span>
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="number" name="FatherMobile" class="form-control <?php echo (!empty($FatherMobileError)) ? 'border-danger' : '';?>" placeholder="Father's Mobile Number" value="<?php echo $FatherMobile;?>">
                            <span class="text-danger"><?php echo $FatherMobileError;?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="MotherName" class="form-control <?php echo (!empty($MotherNameError)) ? 'border-danger' : '';?>" placeholder="Mother's Name" value="<?php echo $MotherName;?>">
                            <span class="text-danger"><?php echo $MotherNameError;?></span>
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" name="MotherOccupation" class="form-control <?php echo (!empty($MotherOccupationError)) ? 'border-danger' : '';?>" placeholder="Mother's Occupation" value="<?php echo $MotherOccupation;?>">
                            <span class="text-danger"><?php echo $MotherOccupationError;?></span>
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="number" name="MotherMobile" class="form-control <?php echo (!empty($MotherMobileError)) ? 'border-danger' : '';?>" placeholder="Mother's Mobile Number" value="<?php echo $MotherMobile;?>">
                            <span class="text-danger"><?php echo $MotherMobileError;?></span>
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