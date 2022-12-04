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

        }
        // else{
        //     echo "enter a valid information!";
        // }


    }
    
?>

    <?php include("login-header.php")?>

    <section class="signup-section">
        <div class="container-width">
            <h1 class="h1-signup">Signup</h1>
            <form method="post" id="signup-form" onsubmit="validate(); return false">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="pass">
                </div>
                <div class="input-group">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="firstname">
                </div>
                <div class="input-group">
                    <label for="last_name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="lastname">
                </div>
                <div class="input-group">
                    <label for="phone_number">Phone Number</label>
                    <input class="form-control" type="text" name="phone_number" id="phonenumber">
                </div>
                <div class="input-group">
                    <label for="birth_date">Birth Day</label>
                    <input class="form-control" type="date" name="birth_date" id="birthdate">
                </div>

                <div class="login-button-container">
                    <button type="submit" class="login-button">Create Account</button>
                    <a href="login.php" class="create">Already have an account?</a>
                </div>
            </form>
        </div>
    </section>
    
<?php include('footer.php')?>