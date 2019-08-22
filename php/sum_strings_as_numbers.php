<?php
function sum_strings($a, $b) {
    if($a == "") $a = 0;
    if($b == "") $b = 0;
    return floatval($a) + floatval($b);
}
?>