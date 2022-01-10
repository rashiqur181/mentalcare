<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])) {

    $uname = $_POST['uname'];
    $password = $_POST['pass'];


    $error = array();


    if (count($error) == 0) {
        $query = "SELECT id FROM doctors WHERE username='$uname' AND password='$password'";
        $res = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($res);
        $query2 = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
        $res2 = mysqli_query($connect, $query2);
        $row2 = mysqli_fetch_array($res2);

        if (empty($uname)) {
            $error['login'] = "Enter Username";
        } elseif (empty($password)) {
            $error['login'] = "Enter Password";
        } elseif ($row2['status'] == "Pending") {
            $error['login'] = "Please wait for the admin to confirm";
        } elseif ($row2['status'] == "Rejected") {
            $error['login'] = "Try again later";
        }



        if (mysqli_num_rows($res)) {
            echo "<script>alert('done')</script>";
            $_SESSION['doctor'] = $uname;
            $_SESSION['doctor_id'] = $row['id'];

            header("Location:doctor/index.php");
        } else {
            echo "<script>alert('Invalid Acocunt')</script>";
        }
    }
}

if (isset($error['login'])) {
    $l = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else {
    $show = "";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
    <link rel="stylesheet" href="./css/doctorlogin.css">

</head>



<body>

    <?php
    include("include/header.php");
    ?>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3">
                    <h5 class="text-center my-5" style="font-size: 30px;">Doctors Login</h5>
                    <div>
                        <?php echo $show; ?>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off"
                                placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off"
                                placeholder="*****">
                        </div>
                        <br>
                        <input type="submit" name="login" class="btn btn-primary" value="Login">
                        <br><br>
                        <p>I dont have an account<a href="apply.php">">Apply Now!!!</a></p>
                        <div class="my-5"></div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>