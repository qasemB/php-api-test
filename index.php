<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
require(__DIR__ . "/core.php");
require(__DIR__ . "/rest.php");

if (!isset($_GET['action'])) {
    apiError('No action specified');
    die;
}

if (!isset($_GET['type'])) {
    apiError('Either action is missing or not allowed');
    die;
}
if (!in_array($_GET['type'],$allow_methods)) {
    apiError('That method is not allowed');
    die;
}

$action = $_GET['action'];
$type = $_GET['type'];

try {
    call_user_func(camelcase($action).'::'.camelcase($type));
} catch (Exception $e) {
    apiError($e);
}
?>