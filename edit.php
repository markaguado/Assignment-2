
<?php
    session_start();
    $successful = array();

    // file require
    include("functions/functions.php");
    include("connection.php");
    
    //check if we get the id
    if(!isset($_GET['id'])) { 
        header("Location:  administrator.php");
    }
    // declare id variable
    $id = $_GET['id'];

    // post request for update
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $birth_date = $_POST['birth_date'];

        $query = "UPDATE users SET email='$email',password='$password', first_name='$first_name', last_name='$last_name', phone_number='$phone_number', birth_date='$birth_date' WHERE id=$id";

        $result = mysqli_query($con, $query);

        if($result){
              // prompt successful
              $successful[] = "Info is/are now updated";
        } 

    }

    
?>

<?php include("custom-header.php")?>

    <section class="edit-info">
        <div class="container-width">
            <?php
                $sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            <h1>Update Student Info</h1>
            <a href="addnew.php">
                Create new account
            </a>
            <form method="post" id="login-form" class="edit-form">
                <?php 
                    // success will display
                    if ($successful) {
                        foreach ($successful as $success) {
                            echo "<span>$success</span>";
                        }
                    }
                ?>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo $row['email']?>">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="pass" value="<?php echo $row['password']?>">
                </div>
                <div class="input-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" value="<?php echo $row['first_name']?>">
                </div>
                <div class="input-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $row['last_name']?>">
                </div>
                <div class="input-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" value="<?php echo $row['phone_number']?>">
                </div>
                
                <div class="input-group">
                    <label for="birth_date">Birth Day</label>
                    <input type="date" name="birth_date" value="<?php echo $row['birth_date']?>">
                </div>
                <div class="login-button-container">
                    <button type="submit" class="login-button">Update</button>
                    <!-- if cancel sends back to admin page -->
                    <a href="administrator.php">Cancel</a>
                </div>
            </form>
        </div>
    </section>

<?php include("footer.php")?>
