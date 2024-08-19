<div class="modal fade" id="editar" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="my_title">Salida de Producto</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"></div>
            </div>
            
            <div class="modal-body py-lg-10 px-lg-10">
                <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="user" value="0">
                    <input type="hidden" name="cantidad_nueva" value="0">

                    <input type="hidden" name="id" value="0" class="my_input">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="p-1">Producto</label>
                            <input class="form-control form-control-sm bg-light my_input" type="text" name="nombre" required readonly>
                        </div>
                        <div class="col-sm-6">
                            <label class="p-1">Cantidad</label>
                            <input class="form-control form-control-sm bg-light my_input" type="number" name="cantidad" min="1" required onchange="F_validateNum(this)">
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center pt-4">
                        <button type="submit" class="btn bnt-sm btn-primary">Guardar <i class="bi bi-floppy2-fill"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    function F_validateNum(tag) {
        const min = parseInt( tag.getAttribute('max'));
        const value = parseInt(tag.value);
        
        if ( value >= min || min <= 0) {
            Swal.fire({icon:"error",title:"Cantidad no permitida",text: "No se permite colocar una cantidad mayor a la existente"});
            tag.value = min;
        }
    }
    function F_fillForm(btn){
        const json = JSON.parse(btn.getAttribute('data-modal'));
        for (var j in json) {
            $(`.my_input[name="${j}"]`).val(json[j]);
        }
        $('input[name="cantidad"]').prop('max', json['cantidad']);
        $('input[name="cantidad"]').val(1);
        $('input[name="user"]').val(data[0]['idUsuario']);
        $('input[name="cantidad_nueva"]').val(json['cantidad']);
    }
</script>