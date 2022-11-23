<?php
    session_start();
    // file require
    include("functions/functions.php");
    include("connection.php");

    // check if user has click post button
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // something was posted
        $admin_user = $_POST['admin_user'];
        $admin_pass = $_POST['admin_pass'];

        if(!empty($admin_user) && !empty($admin_pass)){
            //read from database
            
            // generate user id
            
            $query = "select * from admin_db where admin_user = '$admin_user' limit 1";
        
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data_admin = mysqli_fetch_assoc($result);
                    
                    if($user_data_admin['admin_pass'] === $admin_pass){
                        $_SESSION['user_id_admin'] = $user_data_admin['user_id_admin'];
                        header("Location: administrator.php");
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
        <title>Admin</title>
    </head>
    <body>

        <h1>Admin</h1>
        <form method="post">
            <div class="input-group">
                <label for="admin_user">Username</label>
                <input type="text" name="admin_user">
            </div>
            <div class="input-group">
                <label for="admin_pass">Password</label>
                <input type="password" name="admin_pass">
            </div>

            <button type="submit">Login</button>
        </form>
    </body>
</html>