<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: ../index.php");
    exit;
}

require_once "../assets/php/config.php";

$sqlStudent = $pdo -> prepare("SELECT * FROM student");
$sqlStudent -> execute();
$studentCount = $sqlStudent -> rowCount();

$counter = $pdo -> prepare("SELECT * FROM student WHERE Program = :program");
$counter -> bindParam(':program', $program);

$program = "BCA";
$counter -> execute();
$bcaCount = $counter -> rowCount();

$program = "BIM";
$counter -> execute();
$bimCount = $counter -> rowCount();


$program = "Bsc.CSIT";
$counter -> execute();
$csitCount = $counter -> rowCount();

$program = "BBM";
$counter -> execute();
$bbmCount = $counter -> rowCount();

$program = "BHM";
$counter -> execute();
$bhmCount = $counter -> rowCount();

$genderCount = $pdo -> prepare("SELECT * FROM student WHERE Gender = :gender");
$genderCount -> bindParam(':gender', $gender);

$gender = "Male";
$genderCount -> execute();
$maleCount = $genderCount -> rowCount();

$gender = "Female";
$genderCount -> execute();
$femaleCount = $genderCount -> rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>
<body id="page-top">
    <?php include 'header.php';?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">

            <!-- Student Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Students
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $studentCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BCA Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    BCA
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $bcaCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-desktop fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BIM Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    BIM
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $bimCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-laptop fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bsc CSIT Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Bsc CSIT
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $csitCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-robot fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BBM Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    BBM
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $bbmCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BHM Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    BHM
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $bhmCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cocktail fa-2x text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Male Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Male
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $maleCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-2x text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Female Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Female
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $femaleCount;?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-female fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- DataTables Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Students Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Faculty</th>
                                <th>Program</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Faculty</th>
                                <th>Program</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                while ($row = $sqlStudent -> fetch()){
                            ?>
                            <tr>
                                <td><?php echo '<a href="./viewStudent.php?RegNo=' . $row["RegNo"] . '" title="View Student"> '?>
                                    <?php echo $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["LastName"]?>
                                    <?php echo '</a>'?>
                                </td>
                                <td><?php echo $row["Gender"]?></td>
                                <td><?php echo $row["Mobile"];?></td>
                                <td><?php echo $row["Email"];?></td>
                                <td><?php echo $row["Level"];?></td>
                                <td><?php echo $row["Faculty"];?></td>
                                <td><?php echo $row["Program"];?></td>
                                <td>
                                    <?php echo '<a href="./editStudent.php?RegNo=' . $row["RegNo"] . '" title="Edit Student" class="btn btn-success btn-sm m-1"><i class="fa fa-pencil-alt"></i></a>';?>
                                    <?php echo '<a href="./deleteStudent.php?RegNo=' . $row["RegNo"] . '" title="Delete Student" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i></a>';?>
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- DataTables End -->

    </div>
</div>
    <?php include 'footer.php';?>
    <!-- Page Level Plugins -->
    <script src="./vendor/datatables/jquery.dataTables.js"></script>
    <script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page Level custom scripts -->
    <script src="./js/demo/datatables-demo.js"></script>
</body>
</html>