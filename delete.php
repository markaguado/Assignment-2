<?php
    include ("connection.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
        header("Location: administrator.php");

    } else{
        echo "failed" . mysqli_error($con);
    }
?>