<?php

    include "../db/db.php";
    
    $ImgID   = $_POST['ImgID'];

    $query  = "DELETE FROM `img` WHERE img.ImgID = $ImgID";
    $result =  mysqli_query($link, $query);

    echo json_encode($result);

?>