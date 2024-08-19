<?php
include '../componentes/conexion.php';
class historial
{
    public function select()
    {
        $mysqli = conectarDB();
        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }
        $sql = "SELECT
                h.*,
                p.nombre 'producto',
                u.nombre 'usuario',
                u.correo
            FROM tbl_historial h
            INNER JOIN tbl_productos p ON h.fk_producto = p.id
            INNER JOIN tbl_usuarios u ON h.fk_usuario = u.idUsuario";

        $result = $mysqli->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return json_decode('[]');
        }
    }

}
?>