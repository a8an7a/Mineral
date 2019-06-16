<?php

    include "../db/db.php";
    
    $imgID   = $_POST['imgID'];
    $tags    = $_POST['tags'];

    $query  = "UPDATE `img` SET `Tags` = '$tags' WHERE `img`.`ImgID` = $imgID";
    $result =  mysqli_query($link, $query);

    echo json_encode($result);

?>