<!DOCTYPE html>
<html lang="en">

<head>
    <title>HISTORIAL</title>
    <?php include '../componentes/head.php'; ?>
    <style>
        #MyTable_filter, #MyTable_filter input, #MyTable_length,#MyTable_info,
        #MyTable_previous, #MyTable_next{
            color:white !important;
        }
        #MyTable_length select{
            background-color: white;
        }
    </style>
</head>
<body>

    <div class="row py-4">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 bg-primary rounded p-4 text-light">
            <div class="d-flex justify-content-between">
                <h4>Historial</h4>
            </div>
            <div class="bg-light pt-1 my-2"></div>

            <table id="MyTable" class="table table-striped py-4">
                <thead class="bg-dark  text-light">
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Movimiento</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cantidad</th>
                        <th>Cantidad Anterior</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($movimientos as $p):?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?php echo $p['producto']; ?></td>
                        <td><?php echo ($p['tipo_movimiento'] == 1 ? 'Entrada':'Salida'); ?></td>

                        <td><?php echo substr($p['fecha'],0,10); ?></td>
                        <td><?php echo substr($p['fecha'],10,6); ?></td>

                        <td><?php echo $p['cantidad_nueva']; ?></td>
                        <td><?php echo $p['cantidad']; ?></td>
                        <td><?php echo $p['usuario']; ?></td>
                        <td>
                            <span class="badge rounded-pill bg-primary"><?php echo $p['correo']; ?></span>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>

</body>
<?php
include '../componentes/sesion_activa.php';
?>
<script>
    $('#MyTable').DataTable();    
</script>
</html>