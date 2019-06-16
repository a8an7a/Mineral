<?php

    function checks_end ( $count ){
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

        return $ending;
    }

?>