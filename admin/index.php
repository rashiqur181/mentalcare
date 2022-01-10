<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>



    <?php
    include("../include/header.php");

    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -20px;">

                    <?php
                    include("sidenav.php")
                    ?>

                </div>
                <div class="col-md-10">

                    <h4 class="my-2">Admin Dashboard</h4>

                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $ad = mysqli_query($connect, "SELECT * FROM admin");

                                            $num = mysqli_num_rows($ad);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?>
                                            </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4"
                                                    style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php

                                            $doctor = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Approved'");

                                            $num2 = mysqli_num_rows($doctor);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?>
                                            </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="doctor.php"><i class="fa fa-user-md fa-3x my-4"
                                                    style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php

                                            $patient = mysqli_query($connect, "SELECT * FROM patient");

                                            $num3 = mysqli_num_rows($patient);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num3; ?>
                                            </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="patient.php"><i class="fa fa-procedures fa-3x my-4"
                                                    style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $report = mysqli_query($connect, "SELECT * FROM report");

                                            $num4 = mysqli_num_rows($report);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num4 ?>
                                            </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Reports</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="report.php"><i class="fa fa-flag fa-3x my-4"
                                                    style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php

                                            $job = mysqli_query($connect, "SELECT * FROM doctors WHERE status ='Pending'");

                                            $num1 = mysqli_num_rows($job);

                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1 ?>
                                            </h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Job Request</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="job_request.php"><i class="fa fa-book-open fa-3x my-4"
                                                    style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>