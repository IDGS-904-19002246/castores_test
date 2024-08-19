<?php
use LDAP\Result;
include 'model.php';
$model = new productos_entrada();
$productos = json_decode('[]');
$msg = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'insert') {
        $result = $model->insert($_POST['name'], $_POST['cost']);
        if ($result) {
            $msg = 'Swal.fire({icon: "success",title: "Elemento Añadido"});';
        }else{
            $msg = 'Swal.fire({icon: "error",title: "Error al añadir"});';
        }
    }
    if ($_POST['action'] == 'update') {
        $result = $model->update($_POST['id'], $_POST['user'],$_POST['cantidad_nueva'],$_POST['cantidad']);
        if ($result) {
            $msg = 'Swal.fire({icon: "success",title: "Elemento Surtido"});';
        }else{
            $msg = 'Swal.fire({icon: "error",title: "Error al surtir"});';
        }
    }
    $productos = $model->select();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    if (isset($_GET['id']) && isset($_GET['new'])) {
        $result = $model->update_status($_GET['id'], $_GET['new']);
        if ($result) {
            $status = ($_GET['new']==0?'Eliminado':'Activado');
            $msg = 'Swal.fire({icon: "success",title: "Elemento '.$status.'"});';
        }else{
            $msg = 'Swal.fire({icon: "error",title: "Error al editar"});';
        }
    }
    $productos = $model->select();
}
include 'view.php';
?>