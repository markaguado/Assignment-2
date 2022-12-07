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
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email)){
            
            //read from database
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
            else{
                // the variable of error becomes true
                $errors[] = "Invalid Email or password";
            }
        }
        //if didn't type anything
        $errors;

    }
?>

<?php include("login-header.php")?>

    <section class="login-section">
        <div class="container-width">
            <form method="post" id="login-form">
               
                <h1>User Login Form</h1>
                <?php 
                    // if error is true this will display error message
                    if ($errors) {
                        foreach ($errors as $error) {
                            echo "<span>$error</span>";
                        }
                    }
                ?>
                <div class="input-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" class="">
                </div>
                <div class="input-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" class="">
                </div>

                <div class="login-button-container">
                    <button type="submit" class="login-button">Login</button>
                    <a href="signup.php" class="create-account">Create an account.</a>
                    <a href="admin.php" class="create-account">Login as admin</a>
                </div>
            </form>
            

        </div>
    </section>
    
<?php include('footer.php')?>