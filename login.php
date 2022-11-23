<?php
    session_start();
    // file require
    include("functions/functions.php");
    include("connection.php");

    // check if user has click post button
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email)){
            //read from database
            
            // generate user id
            
            $query = "select * from users where email = '$email' limit 1";
        
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "wrong user name or password!";


            // die;

        }else{
            echo "wrong user name or password!";
        }


    }

    // user data
    // $user_data = check_login($con);
    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>

        <h1>Login</h1>
        <form method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <button type="submit">Login</button>
            <a href="signup.php">Create an account.</a>
        </form>
    </body>
</html>