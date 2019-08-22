<?php
function generateHashtag($str) {

    if(mb_strlen($str) < 1){
      return false;
    }
    
    $new_str = str_replace(" ", "", ucwords($str));
    
    if(mb_strlen($new_str) >= 140 || mb_strlen($new_str) < 1){
      return false;
    }
    
    return "#" . $new_str;
}
?>