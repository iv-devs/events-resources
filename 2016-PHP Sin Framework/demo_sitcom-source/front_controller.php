<?php
require_once "core/db_layer.php";
require_once "core/collector.php";
require_once "settings.php";

$peticion = $_SERVER['REQUEST_URI'];

$array = explode('/', $peticion);

$modulo = $array[1];
$recurso = $array[2];
$arg = (isset($array[3])) ? $array[3] : 0 ;

require_once "modules/".strtolower($modulo).".php";

$controller = ucwords($modulo)."Controller";

$controlador = new $controller();
$controlador->$recurso($arg);


?>