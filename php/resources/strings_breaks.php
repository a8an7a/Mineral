<?php
    function strings_breaks( array &$array ){
        for($i=0; $i<count($array); $i++){
            $str = mb_convert_case($array[$i]['Tags'], MB_CASE_LOWER, "UTF-8"); // mb_convert_case($array[$i]['Tags'], MB_CASE_LOWER, "UTF-8")
            $str = explode(', ', $str);
            $array[$i]['Tags'] = $str;
        }
    }
?>