<?php
include 'model.php';
$model = new Model();
$sesion = json_decode('[]');
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['pass'])) {
        $sesion = $model->login($_POST['email'],$_POST['pass']);

        if (count($sesion) == 1) {
            $msg = '
                Swal.fire({
                    icon: "success",
                    title: "Bienvenido",
                }).then((result) => {
                    localStorage.setItem("login_user", JSON.stringify('.json_encode($sesion).'));
                    window.location = "../";
                });
                
                ';
        }else{
            $msg = '
                Swal.fire({
                    icon: "error",
                    title: "Inicio de sesión fallido",
                    text: "Email o contraseña incorrectas"
                })
                ';
        }
    }

}

include 'view.php';
?>