<!-- function to be called when deleting from database-->
<?php
    include ("connection.php");
    // gets the id of the variable that selected
    $id = $_GET['id'];
    // pass the value of id to use in the query
    $sql = "DELETE FROM users WHERE id = $id";
    $sql = "DELETE FROM course_db WHERE id = $id";
    // variable that queries with parameter of connection to db and sql command
    $result = mysqli_query($con, $sql);
    if($result){
        header("Location: administrator.php");

    } else{
        // for debug purposes if failed in querying database this will show
        echo "failed" . mysqli_error($con);
    }
?>