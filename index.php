<?php 
session_start();

	include("connection.php");
	include("functions/functions.php");

	$user_data = check_login($con);

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
    <p>hello, <?php echo $user_data['first_name'];?></p>
</body>
</html>