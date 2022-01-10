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
                    <div class="col-md-6">
                        <h5 class="text-center my-1">Prescription Form</h5>

                        <?php
                        if (isset($_POST['send'])) {


                            $doc = $_POST['doctor'];
                            $pat = $_POST['patient'];
                            $pres = $_POST['pres'];
                            $adv = $_POST['advise'];


                            if (empty($doc)) {
                            } elseif (empty($pat)) {
                            } elseif (empty($pres)) {
                            } elseif (empty($adv)) {
                            } else {


                                $query = "INSERT INTO prescription(id,doctor,patient,date_discharge,prescription,advise) VALUES('$doc','$pat',NOW(),'$pres','$adv ')";

                                $res = mysqli_query($connect, $query);

                                if ($res) {
                                    echo "<script>alert('You have sent Invoice')</script";

                                    mysqli_query($connect, "UPDATE appointment SET status='Discharge' WHERE id='$id'");
                                }
                            }
                        }


                        ?>

                        <form method="post">

                            <label>Add Doctor Username</label>
                            <input type="text" name="doctor" class="form-control" autocomplete="off"
                                placeholder="Add Doctor Username">

                            <label>Add Patient Username</label>
                            <input type="text" name="patient" class="form-control" autocomplete="off"
                                placeholder="Add Patient Username">


                            <label>Add Prescription</label>
                            <input type="text" name="pres" class="form-control" autocomplete="off"
                                placeholder="Add Prescription">

                            <label>Add Advise</label>
                            <input type="text" name="advise" class="form-control" autocomplete="off"
                                placeholder="Add Advise">

                            <input type="submit" name="send" class="btn btn-info my-2" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>