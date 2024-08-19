<?php
include '../componentes/conexion.php';
class productos_entrada
{
    public function select()
    {
        $mysqli = conectarDB();
        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }
        $sql = "SELECT * FROM tbl_productos";

        $result = $mysqli->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return json_decode('[]');
        }
    }

    public function insert($nom,$pre)
    {
        $mysqli = conectarDB();
        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }
        $sql = "INSERT INTO tbl_productos (
                `estado`,`cantidad`,
                `nombre`,`precio`
            ) VALUES(
                1, 0,
                '{$nom}','{$pre}'
            )";
        return $mysqli->query($sql) ? true : false;
    }

    public function update($id,$user,$can,$can_nueva)
    {
        $mysqli = conectarDB();
        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }
        $sql = "UPDATE tbl_productos SET
            cantidad = {$can_nueva}
            WHERE id = {$id}";

        $hoy = date('Y-m-d H:m');
        $sql_historial = "INSERT INTO tbl_historial (
                `fk_producto`,
                `fk_usuario`,

                `fecha`,
                `tipo_movimiento`,
                `cantidad`,
                `cantidad_nueva`
            ) VALUES (
                {$id},
                {$user},

                '{$hoy}',
                1,
                {$can},
                {$can_nueva})";
        
        if ($mysqli->query($sql)) {
            $mysqli->query($sql_historial);
            return true;
        } else {
            return false;
        }
        // return $mysqli->query($sql) ? true : false;
    }
    public function update_status($id,$new)
    {
        $mysqli = conectarDB();
        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }
        $sql = "UPDATE tbl_productos SET
            estado = {$new}
            WHERE id = {$id}";
        return $mysqli->query($sql) ? true : false;
    }
}
?>