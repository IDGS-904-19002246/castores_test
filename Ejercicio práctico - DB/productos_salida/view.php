<!DOCTYPE html>
<html lang="en">

<head>
    <title>SALIDA DE PRODUCTOS</title>
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
                <h4>Salida de productos</h4>
                <a href="../"><button class="btn btn-sm btn-light" onclick="logout()">Cerrar Sesión</button></a>
                <a href="../"><button class="btn btn-sm btn-light">Volver</button></a>
            </div>
            <div class="bg-light pt-1 my-2"></div>

            <table id="MyTable" class="table table-striped py-4">
                <thead class="bg-dark  text-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th style="width:100px;">Estado</th>
                        <th style="width:200px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($productos as $P):?>
                    <tr>
                        <td><?php echo $P['id']; ?></td>
                        <td><?php echo $P['nombre']; ?></td>
                        <td>$ <?php echo $P['precio']; ?></td>
                        <td><?php echo $P['cantidad']; ?> unidades</td>
                        <td><?php echo ($P['estado'] == 0? 'Inactivo': 'Disponible'); ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editar" data-modal='<?php echo json_encode($P)?>' onclick="F_fillForm(this)"
                            >Sacar Producto <i class="bi bi-basket3-fill"></i></button>                      
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>

</body>
<?php
include 'modals/salida.php';
include '../componentes/sesion_activa_comun.php';
?>
<script>
    <?php 
    echo ($msg == '' ? '':$msg);
    ?>
    $('#MyTable').DataTable();
    if (data[0]['idRol'] != 2) {
        $('button.btn').prop('disabled', true);
    }
    function F_goTo(btn){
        const url = btn.getAttribute('data-href');
        window.location.href = url;
    }
    
    
</script>
</html>