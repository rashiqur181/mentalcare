<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js"
        integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php
    include("include/header.php");
    include("include/connection.php");
    ?>
    <header>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <h1>Mental Care</h1>
                    <h4>Virtual primary care and mental health treatment when you need it. Speak to a top doctor and get
                        personalized, high-quality healthcare from your desktop.</h4>
                    <p>Do not hesitate to seek help if you are having difficulties or are suffering from mental
                        health-related symptoms. Visit this site and make an appointment to receive the therapy you
                        require. Please see the link below for further information.</p>
                    <a href="patientlogin.php" class="btn btn-light px-5 py-2">Book an Appointment</a>
                </div>
                <div class="col-md-5 col-sm-12">
                    <img src="img/homepage05.png" style="width: 100%">
                </div>
            </div>
        </div>
    </header>

    <main>
        <!--Section-1-->
        <section class="section-3 container-fluid p-0">
            <div class="cover">

                <div class="content text-center">
                    <h1>Total doctors and patients</h1>
                </div>
            </div>
            <div class="container-fluid text-center">
                <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
                    <div class="rect">
                        <?php

                        $doctor = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Approved'");

                        $num1 = mysqli_num_rows($doctor);
                        ?>
                        <h1><?php echo $num1; ?></h1>
                        <p>Doctors</p>
                    </div>
                    <div class="rect">
                        <?php

                        $patient = mysqli_query($connect, "SELECT * FROM patient");

                        $num2 = mysqli_num_rows($patient);
                        ?>
                        <h1><?php echo $num2; ?></h1>
                        <p>Patients</p>
                    </div>
                </div>
            </div>

        </section>
        <br>

        <!--Section-2-->
        <section class="section-1">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pray">
                            <img src="img/homepage02.png" style="width: 100%">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel text-left">
                            <h1>Doctors</h1>
                            <p class="pt-4">
                                Our highly qualified online specialists have acquired professional qualifications from
                                different medical institutions and have many years of experience. Our mental health
                                specialists provide the best treatment for you.
                            </p>
                            <a href="viewdoctors.php" class="btn btn-light px-5 py-2">Our
                                Doctors</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Section-3-->
        <section class="section-2">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pray">
                            <img src="img/homepage06.webp" style="width: 100%">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel text-left">
                            <h1>About Us</h1>
                            <p class="pt-4">
                                COVID-19 encircled us, putting our lives at risk. Mental diseases are also on the
                                rise.So, We've planned to create this service where people can communicate their
                                difficulties with well-known specialists regarding mental health problems to fix this
                                problem by keeping at home due to this condition.
                            </p>
                            <button class="btn btn-light px-5 py-2">Our Hospitals</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
    <?php
    include("include/footer.php")
    ?>
</body>

</html>