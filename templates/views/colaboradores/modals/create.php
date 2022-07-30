<!-- Modal -->
<div class="modal fade" id="mdAdd-collaborator" tabindex="-1" aria-labelledby="mdAdd-collaboratorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdAdd-collaboratorLabel">Añadir Colaborador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="insertSlt-documentIdentity-collaborator" class="control-label form-control-sm">Tipo Permiso<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <select id="insertSlt-documentIdentity-collaborator" class="form-select form-select-sm custom-select" data-placeholder="Seleccióne Doc. de Indentificación">
                                    <option value=""></option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Normal">Normal</option>
                                </select>
                                <div>
                                </div>
                            </div>
                            <div id="documentIdentity-collaborator-Help" class="form-text">Adjunte su Indentificación</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="insertIpt-documentNumber-collaborator" class="control-label form-control-sm">Correo<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="documentNumber-collaborator" id="insertIpt-documentNumber-collaborator" class="form-control form-control-sm" value="">
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
</div>