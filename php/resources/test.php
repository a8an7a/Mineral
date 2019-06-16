<?php

    // $string = "https://pp.userapi.com/c849024/v849024999/13351d/rHwv3d2crHA.jpg";

    // echo $string.'<br>';

    // $width      = "";
    // $end_string = "";
    // $bool_width = false;
    // $bool_end_string = false;

    // for($i=0; $i<mb_strlen($string); $i++){
    //     if($string[$i-3] == '&' && $string[$i-2] == 'w' && $string[$i-1] == '='){
    //         $bool_width = true;
    //     }elseif($string[$i] == '&' && $string[$i+1] == 'q' && $string[$i+2] == '='){
    //         $bool_width = false;
    //         $bool_end_string = true;
    //     }
        
    //     if($bool_width){
    //         $width .= $string[$i];
    //     }

    //     if($bool_end_string){
    //         $end_string .= $string[$i];
    //     }
    // }

    // if($width > 0){
    //     $string = str_replace($width.$end_string, "", $string).($width/3).$end_string;
    // }

    // echo $string.'<br>';
    
    header('Content-Type: text/html; charset=utf-8');

    $count = 121;
    $div   = 10;
    echo $count.' ';

    // if($count % $div == 1 && $count != 11){
    //     echo 'изображение';
    // }else(($count % $div >=2  && $count % $div <= 4))

    switch ($count % 10) {
        case 1:
            if($count == 11){
                $ending = 'изображений';
            }else{
                $ending = 'изображение';
            }
            break;
        case 2:
            if($count == 12){
                $ending = 'изображений';
            }else{
                $ending = 'изображения';
            }
            break;
        case 3:
            if($count == 13){
                $ending = 'изображений';
            }else{
                $ending = 'изображения';
            }
            break;
        case 4:
            if($count == 14){
                $ending = 'изображений';
            }else{
                $ending = 'изображения';
            }
            break;
        case 5:
        case 6:
        case 7:
        case 8:
        case 9:
        case 0:
            $ending = 'изображений';
            break;
    }

    echo $img_name;
?>