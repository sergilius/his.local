<?php

define("READFILE", "true");
require_once 'app/config/config.php';
require_once $corePath;
require_once $controllerPath;
require_once $modelPath;
require_once $commonModel;

$arr_url = explode("/", $_SERVER['REQUEST_URI']);

//echo count($arr_url)."\n<br>";
//echo '<pre>';
//print_r($arr_url);
//echo '</pre>';

if (count($arr_url) == 2 or ( isset($arr_url[3]) and $arr_url[3] == 'index.php')) {
    require_once $catalogControllerPath;
    require_once $catalogModel;
    catalog_controller::index();
}elseif (( isset($arr_url[1]) and $arr_url[1] == 'converjson') and ( isset($arr_url[2]) and $arr_url[2] == 'phones_preview')) {
    require_once $converjsonController;
    require_once $converjsonModel;
    converjson_controller::phones_preview();
    
}else{
    echo'not found';
}

/* End of file  */