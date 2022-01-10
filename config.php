<?php
require('stripe-php-master/init.php');

$publishableKey = "pk_test_51KEaXtGgeeChnhNB7eRDUZEscezSmAECRwGFfuMau72aOy2DIQlVEraA5ggroWNGQNtJpok61zojI3gvNGA8SOH400u99OCNpa";

$secretKey = "sk_test_51KEaXtGgeeChnhNB4yH1BefubLjq2L6YUNHIR88HM75IuXTdT2m3NSwG9IzlKawNXmR9lIkGn5EYrxueykE7aniE00JU63YJOQ";

\Stripe\Stripe::setApikey($secretKey);