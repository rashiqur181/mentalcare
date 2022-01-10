<?php
require('../config.php');
if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);

    $token = $_POST['stripeToken'];

    $data = \Stripe\Charge::create(array(
        "amount" => 50000,
        "currency" => "bdt",
        "description" => "Payment System Desc",
        "source" => $token,
    ));

    header("Location: index.php");
    exit();
}