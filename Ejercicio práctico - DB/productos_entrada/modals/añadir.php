<div class="modal fade" id="nuevo" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="my_title">Añadir Producto</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"></div>
            </div>
            
            <div class="modal-body py-lg-10 px-lg-10">
                <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="insert">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="p-1">Nombre</label>
                            <input class="form-control form-control-sm bg-light " type="text" name="name" required minlength="4" maxlength="16">
                        </div>
                        <div class="col-sm-6">
                            <label class="p-1">Precio</label>
                            <input class="form-control form-control-sm bg-light " type="number" name="cost"required min="1">
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