<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>404 error</h1>

    <h2><?php session_start(); echo  $_SESSION["auth_error"];  ?></h2>
    <h2>go back to previous page</h2>
</body>

</html>