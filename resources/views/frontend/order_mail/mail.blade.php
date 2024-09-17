<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Mail</title>
</head>
<body>
    <h3>Dear Customer, Your order has been successfully submitted.</h3>
    <p>Your phone number: <span>{{  $data['c_phone'] }}</span></p>
    <p>Your  email: {{  $data['c_email'] }}</p>
    <p>Your order total: {{  $data['total'] }}</p>
    <p>Thank You...</p>
</body>
</html>
