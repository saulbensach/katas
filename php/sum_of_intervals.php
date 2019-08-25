<?php

var_dump(sum_intervals([
    [1,5],
   [10, 20],
   [1, 6],
   [16, 19],
   [5, 11]
  ]));

function sum_intervals(array $intervals): int {
    $sum = 0;
    $arr = [];
    $master_overlap = false;
    do {
        $master_overlap = false;
        for($i = 0; $i < count($intervals); $i++){
            $overlap = false;
            for($j = 0; $j < count($intervals); $j++){
                if($j == $i)continue;
                $x1 = $intervals[$i][0];
                $x2 = $intervals[$i][1];
                $y1 = $intervals[$j][0];
                $y2 = $intervals[$j][1];
                if(overlaps($x1, $x2, $y1, $y2)){
                    $min = min($x1, $y1);
                    $max = max($x2, $y2);
                    if(!exists($min, $max, $arr)){
                        $arr[] = [$min, $max];
                    }
                    $overlap = true;
                    $master_overlap = true;
                }
            }
            if($overlap == false){
                $arr[] = $intervals[$i];
            }
        }
        $intervals = $arr;
        $arr = [];
    }while($master_overlap);
    
    for($i = 0; $i < count($intervals); $i++){
        $sum += length($intervals[$i][0], $intervals[$i][1]);
    }
    return $sum;
}

function overlaps(int $x1, int $x2, int $y1, int $y2){
    if($x1 <= $y2 && $y1 <= $x2) return true;
    return false;
}

function exists(int $min, int $max, &$arr) {
    for($i = 0; $i < count($arr); $i++){
        if($arr[$i][0] == $min && $arr[$i][1] == $max) return true;
    }
    return false;
}

function length(int $a, int $b): int {
    return $b - $a;
}

?>