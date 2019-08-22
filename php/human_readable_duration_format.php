<?php
function format_duration($seconds) {
    if($seconds == 0) return "now";
    $final_string = "";
    $arr = [
        "year" => (int)floor($seconds / 31536000), 
        "day" => (int)floor(($seconds % 31536000) / 86400), 
        "hour" => (int)floor(($seconds % 86400) / 3600),
        "minute" => (int)floor($seconds / 60 % 60), 
        "second" => (int)floor($seconds % 60)
    ];
    //removes 0s from array
    $arr = array_filter($arr, function($k) {return $k != 0;});
    
    $len = sizeof($arr);
    if($len > 2){
        for($i = 0; $i < $len; $i++){
            $final_string .= to_string(key($arr), current($arr));
            if($i < $len - 2) $final_string .= ", ";
            else if($i < $len -1) $final_string .= " and ";
            next($arr);
        }
    }
    if($len < 3) $final_string .= to_string(key($arr), current($arr));
    if($len == 2){
        next($arr);
        $final_string .= " and " . to_string(key($arr), current($arr));
    }
    return $final_string;
}
function zero_value($var) {return ($var != 0);}
function to_string($key, $value) {
    return $value . " " . ($value > 1 ? $key ."s" : $key);
}

?>