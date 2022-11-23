<?php


function check_admin($con){
    if(isset($_SESSION['user_id_admin'])){
        $uid = $_SESSION['user_id_admin'];
        $qry = "select * from admin_db where user_id_admin = '$uid' limit 1";

        $rslt = mysqli_query($con,$qry);
        if($rslt && mysqli_num_rows($rslt)>0){
            $user_data_admin = mysqli_fetch_assoc($rslt);
            return $user_data_admin;
        }
    }
    // redirect to login
    echo "check login not working";
    // header("Location: admin.php");
    // die;
}