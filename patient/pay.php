<!DOCTYPE html>
<html>

<head>
    <title>Book Appointment</title>
</head>

<body>

    <?php
    include("../include/connection.php");
    require('../config.php');

    $query = "SELECT * FROM `doctors`";
    $result1 = mysqli_query($connect, $query);
    $result2 = mysqli_query($connect, $query);
    $options = "";

    while ($row2 = mysqli_fetch_array($result2)) {
        $options = $options . "<option>$row2[1]</option>";
    }


    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -20px;">

                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-4">Pay for your appointment</h5>


                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron">
                                <form action="../patient/submit.php" method="post">
                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="<?php echo $publishableKey ?>" data-amount="50000"
                                        data-name="Paymet System" data-description="Payment System Desc" data-image=""
                                        data-currency="bdt">
                                    </script>
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