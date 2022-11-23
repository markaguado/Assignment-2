<?php 
session_start();

	include("connection.php");
	include("functions/admin-function.php");

	$user_data_admin = check_admin($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>admin, <?php echo $user_data_admin['admin_user'] ?></h1>
    <table>
        <thead>
       
            <tr>
                <th>
                    Email
                </th>
                <th>
                    First Name
                </th>
                <th>
                    Last Name
                </th>
                <th>
                    Phone Number
                </th>
                <th>
                    Birth Date
                </th>
                <th>
                    Account Created
                </th>
            </tr>
         
        </thead>
        <tbody>
            <?php 
                    $query = "select * from users";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['first_name']; ?>
                </td>
                <td>
                    <?php echo $row['last_name']; ?>
                </td>
                <td>
                    <?php echo $row['phone_number']; ?>
                </td>
                <td>
                    <?php echo $row['birth_date']; ?>
                </td>
                <td>
                    <?php echo $row['data']; ?>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id'];?>">update</a>
                </td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</body>
</html>