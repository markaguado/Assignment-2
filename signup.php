<?php
    session_start();
    // file require
    include("connection.php");
    // include("functions/functions.php");

    // user data
    // $user_data = check_login($con);
    
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>
    </head>
    <body>

        <h1>Signup</h1>
        <form method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name">
            </div>
            <div class="input-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name">
            </div>
            <div class="input-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number">
            </div>
            <div class="input-group">
                <label for="birth_date">Birth Day</label>
                <input type="date" name="birth_date">
            </div>

            <button type="submit">Create Account</button>

            <a href="login.php">Login</a>
        </form>
    </body>
</html>