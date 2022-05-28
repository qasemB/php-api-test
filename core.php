<?php 
function JSON($arr = []){
    return json_encode($arr);
}
function apiError($msg){
    echo JSON([
        'error' => true,
        'reason' => $msg
    ]);
}
function camelcase($str, $delimeter = "_"){
    return str_replace($delimeter,"",ucwords($str, $delimeter));
}

?>