<?php
function conectarDB() {
    // DB->LOCAL
    $mysqli = new mysqli("localhost", "root", "", "db_castores");

    // Verificar conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }
    return $mysqli;
}
?>