
<?php
    session_start();

    // file require
    include("functions/functions.php");
    include("connection.php");
    
    if(!isset($_GET['id'])) { //check if we get the id
        header("Location:  administrator.php");
    }
    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $birth_date = $_POST['birth_date'];

        // $query = "UPDATE `users` SET `email`='$email',`first_name`='$first_name',`last_name`='$last_name',`phone_number`='$last_name',`birth_date`='$birth_date' WHERE id =$id";

        $query = "UPDATE users SET email='$email', first_name='$first_name', last_name='$last_name', phone_number='$phone_number', birth_date='$birth_date' WHERE id=$id";

        $result = mysqli_query($con, $query);

        if($result){
            echo "updated";
            header("Location: administrator.php");
        } else{
            echo "Failed: " . mysqli_error($con);
        }

    }

    // check if user has click post button
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update</title>
    </head>
    <body>
        <?php
            $sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <p>ID, <?php echo $row['first_name'] ?></p>
        <h1>Update Student Info</h1>
        <a href="addnew.php">
            Create new account
        </a>
        <form method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo $row['email']?>">
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

            <button type="submit">Update</button>

            <a href="administrator.php">Cancel</a>
        </form>
    </body>
</html>