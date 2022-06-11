<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    header("location: ./index.php");
    exit();
}

require_once "../assets/php/config.php";

$sqlStudent = $pdo -> query("SELECT * FROM student WHERE Program = 'Bsc.CSIT'");

$csitCount = $sqlStudent -> rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bsc CSIT Students</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../vendor/datatables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>
<body id="page-top">
    <?php include 'header.php';?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Bsc CSIT Students</h1>
        </div>

        <!-- Row Start -->
        <div class="row">
            <!-- Bsc CSIT Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                    Bsc CSIT
                                </div>
                                <div class="h5 mb-0 fw-bold text-gray-800">
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
        </div>
        <!-- Row End -->

        <!-- DataTables Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 fw-bold text-primary">Students Data
                <a href="./addStudent.php" class="btn btn-secondary float-end"><i class="fa fa-user-plus"></i> Add New Student</a>   
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
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
                                    <?php echo '</a>'?><i class="fa <?php echo ($row["Gender"] == "Male") ? 'fa-mars text-primary' : 'fa-venus text-danger' ;?>"></i>
                                </td>
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
    <!-- End of Page Content -->

</div>
    <?php include 'footer.php';?>

    <!-- Page Level Plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap5.min.js"></script>

    <!-- Page Level custom scripts -->
    <script src="./js/demo/datatables-demo.js"></script>
</body>
</html>