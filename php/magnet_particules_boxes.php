<?php
$time_start = microtime(true); 
var_dump(doubles(1000, 10000));
$time_end = microtime(true);
$execution_time = ($time_end - $time_start);
echo 'Total Execution Time: '.$execution_time.' secs\n';

function a($k, $n){
    $sigma = 0;
    for($i = 1; $i <= $k; $i++)
        for($j = 1; $j <= $n; $j++)
            $sigma += (1 / ($i * (pow($j + 1, 2 * $i))));
    return $sigma;
}

function doubles($maxk, $maxn) {
    return S($maxk, $maxn);
}

function S($K, $N) {
    $sigma = 0;
    for($i = 1; $i <= $K; $i++){
        $sigma += u($i, $N);
    }
    return $sigma;
}

function u($k, $n){
    $sigma = 0;
    for($i = 1; $i <= $n; $i++){
        $sigma += v($k, $i);
    }
    return $sigma;
}

function v($k, $n) {
    return 1 / ($k * (pow($n + 1, 2 * $k)));
}

?>