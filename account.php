<?php


include("include/connection.php");

if (isset($_POST['create'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['pass'];
    $con_password = $_POST['con_pass'];


    $error = array();

    if (empty($fname)) {
        $error['ac'] = "Enter Firstname";
    } elseif (empty($sname)) {
        $error['ac'] = "Enter Surname";
    } elseif (empty($uname)) {
        $error['ac'] = "Enter Username";
    } elseif (empty($email)) {
        $error['ac'] = "Enter Email Address";
    } elseif (empty($phone)) {
        $error['ac'] = "Enter Phone";
    } elseif ($gender == "") {
        $error['ac'] = "Select Your Gender";
    } elseif (empty($password)) {
        $error['ac'] = "Enter Password";
    } elseif ($con_password != $password) {
        $error['ac'] = "Both Password do not match";
    }

    if (count($error) == 0) {
        $query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,password,data_reg,profile) VALUES('$fname','$sname','$uname','$email','$phone','$gender','$password',Now(),'patient.jpg')";

        $res = mysqli_query($connect, $query);

        if ($res) {
            echo "<script>Alert('You have Successfully Created Account')</script>";
            header("Location:patientlogin.php");
        } else {
            echo "<script>Alert('username taken')</script>";
        }
    }
}

if (isset($error)) {
    $s = $error['ac'];

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
    <title>Create Account</title>
    <link rel="stylesheet" href="./css/account.css">
</head>



<body>
    <?php
    include("include/header.php")
    ?>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center" style="font-size: 30px;">Create Account</h5>
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
                        <div class=" form-group">
                            <label>Phone No.</label>
                            <input type="text" name="phone" class="form-control" autocomplete="off"
                                placeholder="Enter Phone Number"
                                value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Your Gender</option>
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
                        <input type="submit" name="create" value="Create Account" class="btn btn-primary">
                        <br><br>
                        <p>I already have an account <a href="patientlogin.php">Click Here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>