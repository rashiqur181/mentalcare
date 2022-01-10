<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Patient</title>
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

                    include("sidenav.php");

                    ?>

                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Total Patient</h5>

                    <?php

                    $query = "SELECT * FROM patient";

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
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Data Registered</th>
                            </tr>
                    ";

                    if (mysqli_num_rows($res) < 1) {

                        $output .= "
                        <tr>
                        <td colspan='10' class='text-center'>No patient yet.</td>
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
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['gender'] . "</td>
                            <td>" . $row['data_reg'] . "</td>
                            <td>
                                <a href='view.php?id=" . $row['id'] . "'>
                                <button class='btn btn-info'>View</button>
                                </a>
                            </td>
                        
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