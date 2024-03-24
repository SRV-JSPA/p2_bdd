<?php

function conectarBD() {
    $host = "localhost"; 
    $dbname = "dbphp";
    $user = "postgres";
    $password = "16022004";

    try {
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        echo "Se conectó de manera exitosa";
    } catch (PDOException $e) {
        echo "No se pudo conectar a la base de datos: " . $e->getMessage();
    }

    return $db;
}




