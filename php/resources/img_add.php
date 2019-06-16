<?php

    include "../db/db.php";
    
    $id   = $_POST['id'];
    $url  = $_POST['url'];
    $tags = $_POST['tags'];

    $query  = "INSERT INTO img (`UserID`, `LinkImg`, `Tags`) VALUES ('$id', '$url', '$tags')";
    $result =  mysqli_query($link, $query);

    echo json_encode($result);

?>