<?php
    $photoID = mt_rand(1, 26);

    $query = "SELECT user.UserID, user.Name, user.Fname, img.ImgID, img.LinkImg FROM img, user WHERE img.UserID=user.UserID AND img.ImgID = $photoID";
    $result = mysqli_query($link, $query);

    if ($result){
        $mainImg = [];
        while($item = mysqli_fetch_assoc($result)){
            $mainImg[] = $item;
        }
        mysqli_free_result($result);
    }
?>