<?php
    include "../db/db.php";
    session_start();

    $_SESSION['ProfileImg'] = $_POST['profile_img'];
    
    $user_id     = $_POST['user_id'];
    $profile_img = $_POST['profile_img'];

    $query  = "UPDATE `user` SET `ProfileImg`='$profile_img' WHERE `user`.`UserID`=$user_id";
    $result =  mysqli_query($link, $query);

    echo json_encode($result);

?>