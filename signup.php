<?php
    session_start();
    // file require
    include("functions/functions.php");
    include("connection.php");

    // check if user has click post button
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // something was posted
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $birth_date = $_POST['birth_date'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) &&!empty($first_name) &&!empty($last_name) && !empty($phone_number) && !empty($birth_date) && !is_numeric($email)){
            // save to database
            
            // generate user id
            $user_id = random_num(10);
            
            // $hashed = hash('sha512', $password);

            $query = "insert into users (user_id,email,first_name,last_name,phone_number,birth_date,password) values ('$user_id','$email','$first_name','$last_name','$phone_number','$birth_date','$password')";
        
            mysqli_query($con, $query);
 
            // goes to login page if created
            header("Location: login.php");
            die;

        }else{
            echo "enter a valid information!";
        }


    }
    
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