<?php
$time_start = microtime(true);
var_dump(dblLinear(60000));
$time_end = microtime(true);
$execution_time = ($time_end - $time_start);
echo 'Total Execution Time: '.$execution_time.' secs' . "\n";

function dblLinear($n){
    $tmp = [1];
    $pointer = $y = $z = 0;
    for($i = 0; $i < $n; $i++){
        $next_y = $tmp[$y] * 2 + 1;
        $next_z = $tmp[$z] * 3 + 1;
        if($next_y <= $next_z){
            if($next_y == $next_z)$z++;
            $y++;
            $tmp[] = $next_y;
        } else {
            $z++;
            $tmp[] = $next_z;
        }
    }
    return $tmp[$n];
}

?>