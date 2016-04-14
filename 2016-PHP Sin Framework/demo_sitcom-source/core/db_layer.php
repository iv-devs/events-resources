<?php

function db($sql, $vars=array()) {
    # CONECTAR
    $conn_str = "mysql:host=". DB_HOST .";dbname=". DB_NAME;
    $pdo = new \PDO($conn_str, DB_USER, DB_PASS);

    # PREPARAR
    $stmt = $pdo->prepare($sql);
    for($i=0; $i<count($vars); $i++) $stmt->bindParam($i+1, $vars[$i]);

    # EJECUTAR
    $stmt->execute();

    # VALIDAR ERRORES
    $errores = $stmt->errorInfo();
    if(!is_null($errores[1])) exit(var_dump($errores));

    # RETURN
    $clean_sql = trim(strtoupper($sql));

    if(strpos($clean_sql, 'SELECT') === 0) {
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } elseif(strpos($clean_sql, 'INSERT') === 0) {
        $resultado = $pdo->lastInsertId();
    } else {
        $resultado = True;
    }

    $pdo = null;
    return $resultado;
}

?>