<?php
use LDAP\Result;
include 'model.php';
$model = new productos_salida();
date_default_timezone_set('America/Mexico_City');
$productos = json_decode('[]');
$msg = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'update') {
        $result = $model->update($_POST['id'], $_POST['user'],$_POST['cantidad_nueva'],$_POST['cantidad']);
        if ($result) {
            $msg = 'Swal.fire({icon: "success",title: "Elemento Retirado"});';
        }else{
            $msg = 'Swal.fire({icon: "error",title: "Error al retirar"});';
        }
    }
    $productos = $model->select();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productos = $model->select();
}
include 'view.php';
?>