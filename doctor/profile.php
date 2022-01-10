<?php
session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <title>Doctor's Profile</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php

                    include("sidenav.php");

                    $doctor = $_SESSION['doctor'];

                    $query = "SELECT * FROM doctors WHERE username='$doctor'";

                    $res = mysqli_query($connect, $query);

                    while ($row = mysqli_fetch_array($res)) {

                        $username = $row['username'];
                        $fname = $row['firstname'];
                        $sname = $row['surname'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $gender = $row['gender'];
                        $salary = $row['salary'];
                        $profiles = $row['profile'];
                    }


                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php

                                if (isset($_POST['upload'])) {
                                    $img = $_FILES['img']['name'];

                                    if (empty($img)) {
                                    } else {
                                        $query = "UPDATE doctors SET profile='$img' WHERE username='$doctor'";

                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                            echo "<script>window.open('profile.php','_self') </script>";
                                        }
                                    }
                                }

                                ?>


                                <h5><?php echo $username; ?>'s Profile</h5>
                                <form method="post" enctype="multipart/form-data">


                                    <img src="img/<?php echo $profiles; ?>" class="col-md-12" style="height: 450px">


                                    <input type="file" name="img" class="form-control my-2">
                                    <input type="submit" name="upload" class="btn btn-info" value="Update Profile">

                                </form>

                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">Details</th>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $fname; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $sname; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $email; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Phone No.</td>
                                        <td><?php echo $phone; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $gender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Salary</td>
                                        <td>$<?php echo $salary; ?></td>
                                    </tr>

                                </table>

                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Change Username</h5>
                                <?php
                                if (isset($_POST['change_uname'])) {
                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {
                                    } else {

                                        $query = "UPDATE doctors SET username='$uname' WHERE username='$doctor'";

                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            $_SESSION['doctor'] = $uname;
                                            echo "<script>window.open('profile.php','_self') </script>";
                                        }
                                    }
                                }

                                ?>
                                <form method="post">
                                    <label>Enter Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off"
                                        placeholder="Enter Username">
                                    <br>
                                    <input type="submit" name="change_uname" class="btn btn-info my-2"
                                        value="Update Username">
                                </form>


                                <h5 class="my-4 text-center my-2">Change Password</h5>
                                <?php

                                if (isset($_POST['change_pass'])) {

                                    $old = $_POST['old_pass'];
                                    $new = $_POST['new_pass'];
                                    $con = $_POST['con_pass'];

                                    $q = "SELECT * FROM doctors WHERE username='$doctor'";

                                    $re = mysqli_query($connect, $q);
                                    $row = mysqli_fetch_array($re);

                                    if (empty($old)) {
                                        echo "<script>alert('Enter Old Password')</script>";
                                    } elseif (empty($new)) {
                                        echo "<script>alert('Enter New Password')</script>";
                                    } elseif ($con != $new) {
                                        echo "<script>alert('Both passwords do not match')</script>";
                                    } elseif ($old != $row['password']) {
                                        echo "<script>alert('Check the Password')</script>";
                                    } else {
                                        $query = "UPDATE doctors SET password='$new' WHERE username='$doctor'";

                                        mysqli_query($connect, $query);
                                    }
                                }

                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control" autocomplete="off"
                                            placeholder="Enter Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control" autocomplete="off"
                                            placeholder="Enter New Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control" autocomplete="off"
                                            placeholder="Enter Confirm Password">
                                    </div>

                                    <input type="submit" name="change_pass" class="btn btn-info my-2"
                                        value="Change Password">

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>