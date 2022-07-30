<div class="table-responsive">
  <?php if (empty($d->rows)) : ?>
    <div class="text-center">
      <p class="text-muted">
        No se encontro registros
      </p>
    </div>
  <?php else : ?>
    <table class="table table-sm table-hover table-striped table-bordered caption-top">
      <caption>Lista</caption>
      <thead class="table-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tipo Usuario</th>
          <th scope="col">Correo</th>
          <th scope="col">Acciónes</th>
        </tr>
      </thead>
      <?php $i = 1 ?>
      <tbody class="table-group-divider">
        <?php foreach ($d->rows as $t) : ?>
          <tr>
            <th scope="row"><?php echo ($i); ?></th>
            <td><?php echo $t->tipoColaborador_colaborador;
                $i++; ?></td>
            <td><?php echo $t->correo_colaborador; ?></td>
            <td class="text-center" style="width:15rem;">
              <button type="button" data-bs-toggle="modal" data-bs-target="#mdView-provider" class="btn btn-info btn-sm btnView_provider" data-id="<?php echo $t->id_colaborador; ?>">
                <i class="fas fa-eye"></i>
              </button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#mdEdit-provider" class="btn btn-warning btn-sm btnEdit_provider" data-id="<?php echo $t->id_colaborador; ?>">
                <i class="fa fa-pencil"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm btnDelete_provider" data-id="<?php echo $t->id_proveedor; ?>"><i class="fas fa-trash"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php echo $d->pagination; ?>
  <?php endif; ?>
</div>