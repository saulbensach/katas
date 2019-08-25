<?php

var_dump(multiply("12331234", "9871231236"));

function multiply(string $a, string $b): string {
    // I WILL REFACTOR DON'T KILL ME!
    if($a == 0 || $b == 0) return "0";
    $a = ltrim($a, "0");
    $b = ltrim($b, "0");
    $top_matrix = str_split($a);
    $right_matrix = str_split($b);
    $WIDTH = strlen($a);
    $HEIGHT = strlen($b);
    $matrix = [];
    for($i = 0;  $i < sizeof($top_matrix); $i++){
        $tmp =[];
        for($j = 0;  $j < sizeof($right_matrix); $j++){
            $mul = intval($top_matrix[$i]) * intval($right_matrix[$j]);
            ($mul < 10) ? array_push($tmp,"0" . strval($mul)) : array_push($tmp, strval($mul));
        }
        array_push($matrix, $tmp);
    }

    $sums = [];
    $tmp = [];
    $entered = false;

    for($i = 0; $i <= $WIDTH + $HEIGHT - 2; $i++){
        $sum = 0;
        if($tmp != []) $sum = array_sum($tmp);
        $tmp = [];
        for($j = 0; $j <= $i; $j++){
            $entered = true;
            $x = $i - $j;
            if($x < $HEIGHT && $j < $WIDTH){
                $sum += (int)$matrix[$j][$x][0];
                array_push($tmp, (int)$matrix[$j][$x][1]);
            }
            
        }
        array_push($sums, $sum);
    }
    array_push($sums, array_sum($tmp));
    
    $result = [];
    $remainder = 0;
    $sums = array_reverse($sums);
    for($i = 0; $i < sizeof($sums); $i++){
        $current_value = $sums[$i] + $remainder;
        $remainder = 0;
        if($current_value > 9){
            $val = $current_value."";
            $sums[$i] = (int)substr($val, -1);
            $remainder = (int)substr($val, 0, -1);
        }else{
            $sums[$i] = $current_value;
        }
    }
    $sums = array_reverse($sums);

    return ltrim(implode("", $sums), "0");
}
?>