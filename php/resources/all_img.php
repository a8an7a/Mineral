<?php

    /* Изображения на главной странице */

    $query = "SELECT USER.UserID, USER.Name, USER.Fname, USER.ProfileImg, IMG.LinkImg MiniImg, IMG.LinkImg LinkImg, IMG.ImgID, IMG.Tags, IMG.Tags ImgTags FROM img as IMG, user as USER WHERE IMG.UserID = USER.UserID";
    $result = mysqli_query($link, $query);

    if ($result){
        $allImg = [];
        while($item = mysqli_fetch_assoc($result)){
            $allImg[] = $item;
        }
        mysqli_free_result($result);
    }

    
    include 'resize_img.php';
    include 'strings_merge.php';
    include 'strings_breaks.php';

    resize_img($allImg);
    strings_breaks($allImg);
    $merge = strings_merge($allImg);

    $sort_mas = array_count_values($merge);
    arsort($sort_mas);

?>