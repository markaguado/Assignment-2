<?php
    session_start();
    // file require
    include("functions/functions.php");
    include("connection.php");

    // error variable array
    $errors = array();

    // check if user has click post button
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // something was posted
        // variables declared 
        $admin_user = $_POST['admin_user'];
        $admin_pass = $_POST['admin_pass'];

        if(!empty($admin_user) && !empty($admin_pass)){
            
            //read from database
            $query = "select * from admin_db where admin_user = '$admin_user' limit 1";
        
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data_admin = mysqli_fetch_assoc($result);
                    // checks if the admin pass is equal to input from user
                    if($user_data_admin['admin_pass'] === $admin_pass){
                        $_SESSION['user_id_admin'] = $user_data_admin['user_id_admin'];
                        header("Location: administrator.php");
                        die;
                    }
                }
            }
            // the variable of error becomes true
            $errors[] = "Invalid username or password";
        }
    }

    
?>

<?php include("login-header.php")?>


    <section class="login-section">
        <div class="container-width">
            <form method="post" id="login-form">
                <h1>Login as Admin</h1>
                <?php 
                    // if error is true this will display error message
                    if ($errors) {
                        foreach ($errors as $error) {
                            echo "<span>$error</span>";
                        }
                    }
                ?>
                <div class="input-group">
                    <label for="admin_user">Username</label>
                    <input type="text" name="admin_user">
                </div>
                <div class="input-group">
                    <label for="admin_pass">Password</label>
                    <input type="password" name="admin_pass">
                </div>
        
                <div class="login-button-container">
                    <button type="submit" class="login-button">Login</button>
                </div>
            </form>
        </div>
    </section>

    </body>
</html>