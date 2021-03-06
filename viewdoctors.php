<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Care</title>
</head>



<body>
    <?php
    include("include/header.php");
    include("include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h5 class="text-center">Total Doctors</h5>

                    <?php

                    $query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY data_reg ASC";

                    $res = mysqli_query($connect, $query);

                    $output = "";

                    $output .= "
                        <table class='table table-bordered'>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th>
                            </tr>
                    ";

                    if (mysqli_num_rows($res) < 1) {

                        $output .= "
                        <tr>
                        <td colspan='9' class='text-center'>No job request yet.</td>
                        </tr>
                        ";
                    }

                    while ($row = mysqli_fetch_array($res)) {

                        $output .= "
                        <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['firstname'] . "</td>
                            <td>" . $row['surname'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['gender'] . "</td>                       
                        ";
                    }

                    $output .= "
                        </tr>
                        </table>
                    ";
                    echo $output;

                    ?>

                </div>
            </div>
        </div>
    </div>


</body>

</html>