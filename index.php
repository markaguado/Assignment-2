<?php

    include("connection.php");
    include("functions.php");
    session_start();
    $_SESSION;

    $user_data = check_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>

    <a href="logout.php">Logout</a>
    <h1>Index Page</h1>

</body>
</html>