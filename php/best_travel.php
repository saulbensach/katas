<?php
function chooseBestSum($t, $k, $ls) {
    $subsets = subsets_n($ls, $k);

    $arr_sum = array();

    foreach($subsets as $sub_array) {
        array_push($arr_sum, array_sum($sub_array));
    }

    $closest = null;

    for($i = 0; $i < sizeof($arr_sum); $i++){
        if($arr_sum[$i] > $t) continue;
        if($arr_sum[$i] > $closest) {
            $closest = $arr_sum[$i];
        }
    }
  
    return $closest;
}

function subsets_n($arr, $k){
    if (count($arr) < $k) return array();
    if (count($arr) == $k) return array(0 => $arr);

    $x = array_pop($arr);
    if (is_null($x)) return array();

    return array_merge(subsets_n($arr, $k), merge_into_each($x, subsets_n($arr, $k-1)));
}

function merge_into_each($x, $arr) {
    foreach ($arr as &$a) array_push($a, $x);
    return $arr;
}
?>