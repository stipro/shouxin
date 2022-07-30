<?php require_once INCLUDES . 'inc_header.php'; ?>
<?php require_once INCLUDES . 'inc_navbar.php'; ?>
<div class="container py-3">
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h3 class="card-title">Lista de <?php echo $d->title; ?></h3>
      <div>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#mdAdd-shopping" id="btnAdd-compras">Agregar nuevo</button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-6 align-self-center d-flex justify-content-center">
          <button type="button" class="btn btn-primary">Generar Reporte</button>
        </div>
        <div class="col-12 col-sm-6 mb-3">
          <div class="form-group">
            <label for="insertSlt-documentIdentity-collaborator" class="control-label form-control-sm">Formato<span class="text-danger">*</span></label>
            <div class="input-group input-group-sm">
              <select id="insertSlt-documentIdentity-collaborator" class="form-select form-select-sm custom-select" data-placeholder="Seleccióne Doc. de Indentificación">
                <option value=""></option>
                <option value="PDF">PDF</option>
                <option value="Excel">Excel</option>
                <option value="CSV">CSV</option>
              </select>
              <div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php require_once INCLUDES . 'inc_footer.php'; ?>