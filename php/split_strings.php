<?php
function solution($str) {
    $text_arr = str_split($str);
    $text_arr_chunk = array_chunk($text_arr, 2);
    if(sizeof(end($text_arr_chunk)) == 1) {
        array_push($text_arr_chunk[sizeof($text_arr_chunk) -1], "_");
    }
  
    $res = array();
    for($i = 0; $i < sizeof($text_arr_chunk); $i++){
        array_push($res, implode($text_arr_chunk[$i]));
    }
    return $res;
}
?>