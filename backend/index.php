<?php 
error_reporting(0);

require_once('Utils/ParametersExtractor.php');
require_once('Utils/Validator.php');
require_once('Utils/Checker.php');

function exitErrorMessage($errorMessage, $code = 400)
{
    http_response_code($code);
    echo '{"error":"' . $errorMessage . '"}';
    exit;
}

session_start();
header('Content-type: application/json');

// setup timer
date_default_timezone_set('Europe/Moscow');
$start_time = microtime(true);

if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
    exitErrorMessage('Метод не поддерживается. Ипользуйте POST.', 405);
}

// parse body
$jsonString = file_get_contents('php://input');
$jsonObject = json_decode($jsonString, true);
$x = ParametersExtractor::extractXFrom($jsonObject);
$y = ParametersExtractor::extractYFrom($jsonObject);
$r = ParametersExtractor::extractRFrom($jsonObject);

if(is_null($x) or is_null($y) or is_null($r))
{
    exitErrorMessage('Неверный формат запроса');
}

// validate coordinates
try
{
    $validated = Validator::validated($x, $y, $r);
}
catch(ValidationException $e)
{
    exitErrorMessage($e->getMessage());
}

// check coordinates
$status = Checker::check($validated);

// send response
http_response_code(200);
$resultString = '{' .
    '"x":' . $validated->x . ', ' .
    '"y":' . $validated->y . ', ' .
    '"r":' . $validated->r . ',' .
    '"result":' . ($status ? 'true' : 'false') . ',' .
    '"time":"' . date('h:i:s a', time()) . '", ' .
    '"working_time":' . (microtime(true) - $start_time) .
'}';

echo $resultString;
