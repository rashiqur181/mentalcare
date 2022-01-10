<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Invoice</title>
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

                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">View Prescription</h5>

                    <div class="col-md-12">
                        <div class="row" id="printTable">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php
                                if (isset($_GET['id'])) {

                                    $id = $_GET['id'];

                                    $query = "SELECT * FROM prescription WHERE id='$id'";

                                    $res = mysqli_query($connect, $query);

                                    $row = mysqli_fetch_array($res);
                                }


                                ?>

                                <table class="table table-bordered" border="2">
                                    <tr>
                                        <th colspan="2" class="text-center">Prescription Details</th>
                                    </tr>
                                    <tr>
                                        <td>Doctor</td>
                                        <td><?php echo $row['doctor']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Patient</td>
                                        <td><?php echo $row['patient']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Date Discharge</td>
                                        <td><?php echo $row['date_discharge']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Prescription</td>
                                        <td>
                                            <p><?php echo $row['prescription']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Advise</td>
                                        <td>
                                            <p><?php echo $row['advise']; ?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-3"></div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <h5 class="text-center my-1">Edit</h5>

                        <?php
                        if (isset($_POST['send'])) {


                            $adv = $_POST['advise'];

                            if (empty($adv)) {
                            } else {

                                $doc = $_SESSION['doctor'];

                                $uname = $row['username'];
                                $pr = $row['pres'];

                                $query = "INSERT INTO prescription(id,doctor,patient,date_discharge,prescription,advise) VALUES('$doc','$uname',NOW(),'$pr','$adv ')";

                                $res = mysqli_query($connect, $query);

                                if ($res) {
                                    echo "<script>alert('You have sent Invoice')</script";

                                    mysqli_query($connect, "UPDATE appointment SET status='Discharge' WHERE id='$id'");
                                }
                            }
                        }


                        ?>

                        <form method="post">

                            <label>Change Prescription</label>
                            <input type="text" name="pres" class="form-control" autocomplete="off"
                                placeholder="Enter Prescription">

                            <label>Change Advise</label>
                            <input type="text" name="advise" class="form-control" autocomplete="off"
                                placeholder="Enter Advise">

                            <input type="submit" name="send" class="btn btn-info my-2" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>