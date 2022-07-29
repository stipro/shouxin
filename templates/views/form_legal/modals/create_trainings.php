<!-- Modal -->
<div class="modal fade" id="mdAdd-trainings" tabindex="-1" aria-labelledby="mdAdd-trainingsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdAdd-trainingsLabel">Añadir Capacitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label class="control-label form-control-sm">Nombre de Curso ó Evento<span class="text-danger">*</span></label>
                            <input type="text" name="courseorevent-trainings" class="form-control form-control-sm disabled" placeholder="Nombre de Curso ó Evento" value="">
                            <div id="courseorevent-trainings-Help" class="form-text"></div>
                        </div>
                    </div>
                    <div id="trainings-collaborator-Help" class="form-text">* Complete los datos de las capacitaciones recibidas, de la más reciente a la más antigua.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>