<?php
include '../componentes/conexion.php';
class Model
{
    public function login($email, $pass)
    {
        $mysqli = conectarDB();
        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }
        $sql = "SELECT * FROM tbl_usuarios u
            WHERE
                u.correo='{$email}'
                AND u.contrasena = '{$pass}'
                AND u.estatus != 0
            LIMIT 1";

        $result = $mysqli->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return json_decode('[]');
        }
    }

}
?>