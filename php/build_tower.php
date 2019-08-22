<?php
function tower_builder(int $n): array {
    $white_spaces = $n - 1;
    $walls = 1;
    $tower = array();
    for($j = 0; $j < $n; $j++){
        $row = "";
        for($i = 0; $i < $white_spaces; $i++){
            $row .= " ";
        }
        for($i = 0; $i < $walls; $i++) {
            $row .= "*";
        }
        for($i = 0; $i < $white_spaces; $i++){
            $row .= " ";
        }
        $walls += 2;
        $white_spaces -= 1;
        array_push($tower, $row);
    }
    return $tower;
}
?>