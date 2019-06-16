<?php
    /*Ресайз изображения для вывода в главное меню*/
    function resize_img ( array &$array ){
        for($i=0; $i<count($array); $i++){
            $string = $array[$i]['MiniImg'];
    
            $width      = "";
            $end_string = "";
            $bool_width = false;
            $bool_end_string = false;
    
            for($k=0; $k<mb_strlen($string); $k++){
                if($string[$k-3] == '&' && $string[$k-2] == 'w' && $string[$k-1] == '='){
                    $bool_width = true;
                }elseif($string[$k] == '&' && $string[$k+1] == 'q' && $string[$k+2] == '='){
                    $bool_width = false;
                    $bool_end_string = true;
                }
                
                if($bool_width){
                    $width .= $string[$k];
                }
    
                if($bool_end_string){
                    $end_string .= $string[$k];
                }
            }
    
            if($width > 0 && $width < 1000){
                $string = str_replace($width.$end_string, "", $string).($width/2).$end_string;
            }elseif($width > 0 && $width > 1000){
                $string = str_replace($width.$end_string, "", $string).($width/3).$end_string;
            }
    
            $array[$i]['MiniImg'] = $string;
        }
    }
?>