<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js"
        integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/include/header.css">
    <link rel="stylesheet" href="../css/include/header.css">



</head>

<body>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <i class="fas fa-user-md"></i>
                        Mental Care</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="ms-auto"></div>
                        <ul class="navbar-nav">
                            <?php

                            if (isset($_SESSION['admin'])) {

                                $user = $_SESSION['admin'];
                                echo '
                                    <list class="nav-item"><a href="" class="nav-link text-white">', $user, '</a></list>
                                    <list class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></list>';
                            } elseif (isset($_SESSION['doctor'])) {
                                $user = $_SESSION['doctor'];
                                echo '
                                <list class="nav-item"><a href="" class="nav-link text-white">', $user, '</a></list>
                                <list class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></list>
                                ';
                            } elseif (isset($_SESSION['patient'])) {
                                $user = $_SESSION['patient'];
                                echo '
                                    <list class="nav-item"><a href="patient/profile.php" class="nav-link text-white">', $user, '</a></list>
                                    <list class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></list>
                                ';
                            } else {
                                echo '
                                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="adminlogin.php">Admin</a></li>
                                    <li class="nav-item"><a class="nav-link" href="doctorlogin.php">Doctor</a></li>
                                    <li class="nav-item"><a class="nav-link" href="patientlogin.php">Patient</a></li>
                                ';
                            }

                            ?>
                        </ul>
                    </div>

                </div>
            </nav>
        </div>


    </header>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>