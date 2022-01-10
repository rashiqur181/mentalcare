<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])) {

    $uname = $_POST['uname'];
    $password = $_POST['pass'];


    $error = array();

    $q = "SELECT * FROM admin WHERE username='$uname' AND password='$password'";

    $qq = mysqli_query($connect, $q);

    $row = mysqli_fetch_array($qq);

    if (empty($uname)) {
        $error['admin'] = "Enter Username";
    } elseif (empty($password)) {
        $error['admin'] = "Enter Password";
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username='$uname' AND password='$password'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res)) {
            echo "<script>alert('done')</script>";
            $_SESSION['admin'] = $uname;

            header("Location:admin/index.php");
        } else {
            $error['admin'] = "Invalid account";
        }
    }
}

if (isset($error['admin'])) {
    $l = $error['admin'];
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
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="./css/adminlogin.css">

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
                    <h5 class="text-center my-5" style="font-size: 30px;">Admin Login</h5>
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
                        <div class="my-5"></div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </div>


</body>

</html>