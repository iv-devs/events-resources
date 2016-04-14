<?php

# Inicialización de constantes de la aplicación
$config = parse_ini_file('config.ini', true);
foreach($config as $seccion=>$array) {
    foreach($array as $constante=>$valor) {
        define($constante, $valor);
    }
}

if(!PRODUCTION) {
    #Establece el nivel de notificación de errores
    ini_set('error_reporting', E_ALL | E_NOTICE | E_STRICT); 
    #Determina que los errores deberían ser impresos en pantalla
    ini_set('display_errors','1');
    ini_set('track_errors', 'On');
} else {
    // ocultar todo
    ini_set('display_errors','0'); #Determina que los errores NO deberían ser impresos en pantalla
}

# Ruta de includes x defecto (php.ini)
ini_set('include_path', APP_DIR);


?>