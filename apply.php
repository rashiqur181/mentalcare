<?php


include("include/connection.php");

if (isset($_POST['apply'])) {
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];


    $error = array();

    if (empty($firstname)) {
        $error['apply'] = "Enter Firstname";
    } elseif (empty($surname)) {
        $error['apply'] = "Enter Surname";
    } elseif (empty($username)) {
        $error['apply'] = "Enter Username";
    } elseif (empty($email)) {
        $error['apply'] = "Enter Email Address";
    } elseif (empty($gender)) {
        $error['apply'] = "Select Your Gender";
    } elseif (empty($phone)) {
        $error['apply'] = "Enter Phone";
    } elseif (empty($password)) {
        $error['apply'] = "Enter Password";
    } elseif (empty($confirm_password)) {
        $error['apply'] = "Enter Confirm Password";
    } elseif ($confirm_password != $password) {
        $error['apply'] = "Both Password do not match";
    }

    if (count($error) == 0) {
        $query = "INSERT INTO doctors(firstname,surname,username,email,gender,phone,password,salary,data_reg,status,profile) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$password','0',Now(), 'Pending','doctor.jpg' )";

        $result = mysqli_query($connect, $query);

        if ($result) {
            echo "<script>Alert('You have Successfully Applied')</script>";
            header("Location: doctorlogin.php");
        } else {
            echo "<script>Alert('Failed')</script>";
        }
    }
}

if (isset($error)) {
    $s = $error['apply'];

    $show = "<h5 class='text=center alert alert-danger'>$s</h5>";
} else {
    $show = "";
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apply Now!!!</title>
    <link rel="stylesheet" href="./css/apply.css">
</head>


<body>
    <?php

    include("include/header.php")

    ?>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5">
                    <h5 class="text-center" style="font-size: 30px;">Apply Now!!!</h5>
                    <div>
                        <?php echo $show; ?>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off"
                                placeholder="Enter Firstname"
                                value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">


                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off"
                                placeholder="Enter Surname"
                                value="<?php if (isset($_POST['sname'])) echo $_POST['sname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off"
                                placeholder="Enter Username"
                                value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" autocomplete="off"
                                placeholder="Enter Email"
                                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>


                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" autocomplete="off"
                                placeholder="Enter Phone Number"
                                value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off"
                                placeholder="Enter Confirm Password">
                        </div>
                        <br>
                        <input type="submit" name="apply" value="Apply Now" class="btn btn-primary">
                        <br><br>
                        <p>I already have an account <a href="doctorlogin.php">Click Here</a></p>

                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>