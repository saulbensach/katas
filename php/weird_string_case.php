<?php
function toWeirdCase($string) {
    $str_arr = explode(" ", strtolower($string));
    $WeIrD_StRiNg = array();

    for($i = 0; $i < sizeof($str_arr); $i++){
        $res = "";
        for($j = 0; $j < mb_strlen($str_arr[$i]); $j++){
            $res .= ($j % 2 == 0 ? strtoupper($str_arr[$i][$j]) : $str_arr[$i][$j]);
        }
        array_push($WeIrD_StRiNg, $res);
    }

    return implode(" ", $WeIrD_StRiNg);
}
?>