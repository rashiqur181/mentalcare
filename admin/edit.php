<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <h5 class="text-center">Edit Doctor</h5>

                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT * FROM doctors WHERE id='$id'";
                        $res = mysqli_query($connect, $query);

                        $row = mysqli_fetch_array($res);
                    }

                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Doctors Details</h5>
                            <?php

                            echo "<img src='../doctor/img/" . $row['profile'] . "' class='col-md-14 my-2' height='350px;'>";

                            ?>
                            <h5>ID : <?php echo $row['id']; ?></h5>
                            <h5>Firstname : <?php echo $row['firstname']; ?></h5>
                            <h5>Surname : <?php echo $row['surname']; ?></h5>
                            <h5>Username : <?php echo $row['username']; ?></h5>
                            <h5>Email : <?php echo $row['email']; ?></h5>
                            <h5>Phone : <?php echo $row['phone']; ?></h5>
                            <h5>Gender : <?php echo $row['gender']; ?></h5>
                            <h5>Data Registered : <?php echo $row['data_reg']; ?></h5>
                            <h5>Salary : <?php echo $row['salary']; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update Salary</h5>
                            <?php

                            if (isset($_POST['update_sal'])) {

                                $new_sal = $_POST['sal'];

                                $error = array();

                                $doc = $row['username'];
                                $q = mysqli_query($connect, "SELECT * FROM doctors WHERE username='$doc'");

                                $row = mysqli_fetch_array($q);
                                $sal = $row['salary'];

                                if (empty($new_sal)) {
                                    $error['p'] = "Please enter salary amount";
                                }

                                if (count($error) == 0) {
                                    $query = "UPDATE doctors SET salary='$new_sal' WHERE username='$doc'";
                                    mysqli_query($connect, $query);
                                    echo "<script>window.open('doctor.php','_self') </script>";
                                }
                            }
                            if (isset($error['p'])) {
                                $e = $error['p'];
                                $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                            } else {
                                $show = "";
                            }
                            ?>
                            <form method="POST">
                                <div class="form-group">
                                    <label>Enter Doctor's Salary</label>
                                    <input type="number" name="sal" class="form-control"
                                        placeholder="Enter Doctor's Salary">
                                </div>
                                <br>
                                <input type="submit" name="update_sal" value="Update Salary" class="btn btn-info">
                            </form>

                            <br>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>


</body>

</html>