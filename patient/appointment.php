<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Book Appointment</title>
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
                    <h5 class="text-center my-4">Book Appointment</h5>

                    <?php
                    $pat = $_SESSION['patient'];
                    $sel = mysqli_query($connect, "SELECT * FROM patient WHERE username='$pat'");

                    $row = mysqli_fetch_array($sel);

                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $username = $row['username'];
                    $gender = $row['gender'];
                    $phone = $row['phone'];


                    if (isset($_POST['book'])) {
                        $date = $_POST['date'];
                        $sym = $_POST['sym'];
                        $doc = $_POST['doctor_name'];


                        if (empty($sym)) {
                        } else {
                            $query = "INSERT INTO appointment(firstname,surname,username,gender,phone,doctor,appointment_date,symptoms,status,date_booked) VALUES('$firstname','$surname','$username','$gender','$phone','$doc','$date','$sym','Paid', NOW())";

                            $res = mysqli_query($connect, $query);

                            if ($res) {
                                echo "<script>window.open('pay.php','_self') </script>";
                            }
                        }
                    }

                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron">
                                <form method="post">
                                    <label>Appointment Date</label>
                                    <input type="Date" name="date" class="form-control">

                                    <label>Symptoms</label>
                                    <input type="text" name="sym" class="form-control" autocomplete="off"
                                        placeholder="Enter Symptoms">

                                    <div class="form-group">
                                        <label>Select Doctor</label>
                                        <select name="doctor_name" class="form-control">
                                            <?php $query = "SELECT * FROM `doctors`";
                                            $result1 = mysqli_query($connect, $query);
                                            while ($row1 = mysqli_fetch_array($result1)) { ?>

                                            <option value="<?php echo $row1['id']; ?>">
                                                <?php echo $row1['firstname'] . " " . $row1['surname']; ?></option>

                                            <?php } ?>

                                        </select>
                                    </div>



                                    <input type="submit" name="book" class="btn btn-info my-2" value="Book Appointment">
                                </form>

                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>