<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    header("location: ./index.php");
    exit();
}

require_once "../assets/php/config.php";

$RegNo = $_GET["RegNo"];
// 
$sql = $pdo -> prepare("SELECT * FROM student WHERE RegNo = :RegNo LIMIT 1");
$sql -> bindParam(':RegNo', $RegNo);
$sql -> execute();
$row = $sql -> fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["LastName"];?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>
<body id="page-top">
    <?php include 'header.php';?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            
            <div class="col-lg-4">
                
                <div class="card mb-4">
                    
                    <div class="card-body text-center">
                        
                        <img src="img/undraw_profile.svg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?php echo $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["LastName"];?></h5>
                        <p class="text-muted mb-1"><?php echo $row["Gender"];?></p>
                        <p class="text-muted mb-1"><?php echo $row["PermanentAddress"];?></p>
                        
                        <!-- <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary">Follow</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                        </div> -->
                    </div>
                </div>

                <div class="card mb-4 mb-lg-0">

                    <div class="card-body p-3">
                        <p class="mb-4">Father Details</p>
                        
                        <div class="row">

                            <div class="col-sm-5">
                                <p class="mb-0">Name</p>
                            </div>

                            <div class="col-sm-7">
                                <p class="text-muted mb-0"><?php echo $row["FatherName"];?></p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-sm-5">
                                <p class="mb-0">Occupation</p>
                            </div>

                            <div class="col-sm-7">
                                <p class="text-muted mb-0"><?php echo $row["FatherOccupation"];?></p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-sm-5">
                                <p class="mb-0">Mobile</p>
                            </div>

                            <div class="col-sm-7">
                                <p class="text-muted mb-0"><?php echo $row["FatherMobile"];?></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                
                <div class="card mb-4">
                    
                    <div class="card-body">
                        
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["LastName"];?></p>
                            </div>
                        </div>
                        
                        <hr>
                  
                        <div class="row">
                            
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                    
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["Email"];?></p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                          
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["Mobile"];?></p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>

                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["PermanentAddress"];?></p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-sm-3">
                                <p class="mb-0">Profile Created</p>
                            </div>

                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row["CreatedAt"];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Mother Details</p>
                        
                                <div class="row">

                                    <div class="col-sm-5">
                                        <p class="mb-0">Name</p>
                                    </div>

                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0"><?php echo $row["MotherName"];?></p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col-sm-5">
                                        <p class="mb-0">Occupation</p>
                                    </div>

                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0"><?php echo $row["MotherOccupation"];?></p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col-sm-5">
                                        <p class="mb-0">Mobile</p>
                                    </div>

                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0"><?php echo $row["MotherMobile"];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Education Details</p>
                        
                                <div class="row">

                                    <div class="col-sm-5">
                                        <p class="mb-0">Faculty</p>
                                    </div>

                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0"><?php echo $row["Faculty"];?></p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col-sm-5">
                                        <p class="mb-0">Level</p>
                                    </div>

                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0"><?php echo $row["Level"];?></p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col-sm-5">
                                        <p class="mb-0">Program</p>
                                    </div>

                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0"><?php echo $row["Program"];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

            </div>

        </div>

    </div>
    <!-- End Page Content -->

</div>

    <?php include'footer.php';?>
    
</body>
</html>