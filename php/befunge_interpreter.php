<?php
function interpret(string $code): string {
    $stack = array(); 
    $output = "";
    $pointerX = 0;
    $pointerY = 0;
    $instruction = null;
    $direction = ">";
    $string_mode = false;
    $grid = explode("\n", $code);
    $start = microtime(true);
    $skip = false;
    $storeX = -1;
    $storeY = -1;
    $storedVal = null;
    for($i = 0;  $i < sizeof($grid); $i++){
        $grid[$i] = str_split($grid[$i]);
        for($j = 0; $j < sizeof($grid[$i]); $j++){
            $grid[$i][$j] = ord($grid[$i][$j]);
        }
    }
    var_dump($code);
    while($instruction != "@"){
    
        $instruction = chr($grid[$pointerY][$pointerX]);
    
        if($skip == true){
            $instruction = " ";
            $skip = false;
        }
        
        if($string_mode == true){
            if($instruction == "\""){
                $string_mode = false;
            } else {
                array_push($stack, ord($instruction));
            }
        } else {
            switch($instruction){
                case " ": break;
                case "0":
                case "1":
                case "2":
                case "3":
                case "4":
                case "5":
                case "6":
                case "7":
                case "8":
                case "9":
                    $value = $instruction;
                    array_push($stack, intval($value));
                    break;
                case ">": 
                case "v":
                case "<":
                case "^":
                    $direction = $instruction;
                    break;
                case "|":
                    $value = array_pop($stack);
                    if($value === 0){
                        $direction = "v";
                    } else {
                        $direction = "^";
                    }
                    break;
                case "_":
                    $value = array_pop($stack);
                    if($value === 0){
                        $direction = ">";
                    } else {
                        $direction = "<";
                    }
                    break;
                case ":":
                    if(sizeof($stack) == 0){
                        array_push($stack, 0);
                    } else {
                        $value = $stack[sizeof($stack) - 1];
                        array_push($stack, $value);
                    }
                    break;
                case ".":
                    $value = array_pop($stack);
                    $output .= strval($value);
                    break;
                case "+":
                    $a = array_pop($stack);
                    $b = array_pop($stack);
                    $sum = $a + $b;
                    array_push($stack, $sum);
                    break;
                case "-":
                    $a = array_pop($stack);
                    $b = array_pop($stack);
                    $sub = $b - $a;
                    array_push($stack, $sub);
                    break;
                case "*":
                    $a = array_pop($stack);
                    $b = array_pop($stack);
                    $mul = $a * $b;
                    array_push($stack, $mul);
                    break;
                case "?":
                    $dir = [">","<", "^", "v"];
                    $direction = $dir[rand(0, 4)];
                    break;
                case "/":
                    $a = array_pop($stack);
                    $b = array_pop($stack);
                    if($a === 0){
                        array_push($stack, 0);
                    } else {
                        $div = intdiv($b, $a);
                        array_push($stack, $div);
                    }
                    break;
                case "%":
                    $a = array_pop($stack);
                    $b = array_pop($stack);
                    if($b % $a == 0){
                        array_push($stack, 0);
                    }
                    break;
                case "!":
                    $value = array_pop($stack);
                    if($value === 0){
                        array_push($stack, 1);
                    } else {
                        array_push($stack, 0);
                    }
                    break;
                case "`":
                    $a = array_pop($stack);
                    $b = array_pop($stack);
                    if($b > $a){
                        array_push($stack, 1);
                    } else {
                        array_push($stack, 0);
                    }
                    break;
                case "\"":
                    $string_mode = true;
                    break;
                case "\\":
                    if(sizeof($stack) === 1){
                        $a = array_pop($stack);
                        $b = 0;
                        array_push($stack, $a);
                        array_push($stack, $b);
                    } else {
                        $a = array_pop($stack);
                        $b = array_pop($stack);
                        array_push($stack, $a);
                        array_push($stack, $b);
                    }
                    break;
                case "$":
                    array_pop($stack);
                    break;
                case ",":
                    $value = array_pop($stack);
                    $output .= chr($value);
                    break;
                case "#":
                    $skip = true;
                    break;
                case "p":
                    $y = array_pop($stack);
                    $x = array_pop($stack);
                    $v = array_pop($stack);
                    $grid[$y][$x] = $v;
                    break;
                case "g":
                    $y = array_pop($stack);
                    $x = array_pop($stack);
                    $val = $grid[$y][$x];
                    array_push($stack, $val);
                    break;
            }
        
            
        }
    
        switch($direction){
            case ">": 
                $pointerX++;
                break;
            case "v":
                $pointerY++;            
                break;
            case "<":
                $pointerX--;
                break;
            case "^":
                $pointerY--;
                break;
        }
        
    }
    return $output;
}

?>