<?php

define("READFILE", "true");
require_once 'app/config/config.php';
//require_once $corePath; 
//require_once $modelPath;
//require_once $controllerPath;
//require_once $file_controlerPath;
//require_once $pageModelPath;
//require_once $pageControllerPath;
//
////echo "start ";
////$serv_uri = $_SERVER['REQUEST_URI'];
$arr_url = explode("/", $_SERVER['REQUEST_URI']);
echo count($arr_url)."\n<br>";
print_r($arr_url);

/* End of file  */