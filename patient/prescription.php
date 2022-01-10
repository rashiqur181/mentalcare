<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Prescription</title>
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
                    <?php include("sidenav.php") ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Prescriptions</h5>

                    <?php

                    $pat = $_SESSION['patient'];

                    $query = "SELECT * FROM patient WHERE username='$pat'";

                    $res = mysqli_query($connect, $query);

                    $row = mysqli_fetch_array($res);

                    $uname = $row['username'];

                    $querys = mysqli_query($connect, "SELECT * FROM prescription WHERE patient='$uname'");

                    $output = "";

                    $output .= "

							<table class='table table-bordered'>
								<tr>
									<td>ID</td>
									<td>Doctor</td>
									<td>Patient</td>
									<td>Date Discharge</td>
                                    <td>Prescription</td>
                                    <td>Advise</td>
									<td>Action</td>
								</tr>
							


						";

                    if (mysqli_num_rows($querys) < 1) {

                        $output .= "
								<tr>
								<td colspan='10' class='text-center'>No Prescription yet.</td>
								</tr>
							";
                    }

                    while ($row = mysqli_fetch_array($querys)) {

                        $output .= "
							<tr>
								<td>" . $row['id'] . "</td>
								<td>" . $row['doctor'] . "</td>
								<td>" . $row['patient'] . "</td>
								<td>" . $row['date_discharge'] . "</td>
								<td>....</td>
                                <td>" . $row['advise'] . "</td>
								<td>
									<a href='presview.php?id=" . $row['id'] . "'>
										<button class='btn btn-info'>View</button>
									</a>
							</tr>

							";
                    }
                    $output .= "</tr></table>";

                    echo $output;

                    ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>