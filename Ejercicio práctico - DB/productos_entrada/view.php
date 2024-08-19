<!DOCTYPE html>
<html lang="en">

<head>
    <title>INVENTARIO</title>
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
                <h4>Inventario</h4>
                <button class="btn btn-sm btn-light" data-bs-toggle="modal"
                    data-bs-target="#nuevo">Añadir <i class="bi bi-plus-circle-fill"></i></button>
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
                            >Surtir <i class="bi bi-bag-plus-fill"></i></button>

                            <?php
                            if ($P['estado'] == 0):?>
                                    <button
                                    data-href="index.php?id=<?php echo $P['id'];?>&new=1"
                                    onclick="F_goTo(this)"
                                    class="btn btn-sm btn-primary">Activar <i class="bi bi-folder-plus"></i></button>
                            <?php else:?>
                                    <button
                                    data-href="index.php?id=<?php echo $P['id'];?>&new=0"
                                    onclick="F_goTo(this)"
                                    class="btn btn-sm btn-primary">Desactivar <i class="bi bi-trash-fill"></i></button>
                            <?php endif;?>                            
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>

</body>
<?php
include 'modals/añadir.php';
include 'modals/surtir.php';
include '../componentes/sesion_activa.php';
?>
<script>
    <?php 
    echo ($msg == '' ? '':$msg);
    ?>
    $('#MyTable').DataTable();
    if (data[0]['idRol'] != 1) {
        $('button.btn').prop('disabled', true);
    }
    function F_goTo(btn){
        const url = btn.getAttribute('data-href');
        window.location.href = url;
    }
    
    
</script>
</html>