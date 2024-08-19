<?php
use LDAP\Result;
include 'model.php';
$model = new historial();
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_ES.UTF-8');
$movimientos = json_decode('[]');
$msg = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productos = $model->select();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $movimientos = $model->select();
}
include 'view.php';
?>