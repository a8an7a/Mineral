<?php
    function strings_merge( array $array ){

        $mas_merge = [];

        for($i=0; $i<count($array); $i++){
            $mas_merge = array_merge($mas_merge, $array[$i]['Tags']);
        }

        return $mas_merge;
    }
?>