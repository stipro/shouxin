<?php if (!empty($d->rows)) : ?>
    <ul class="timeline" id="cont-timeLine">
        <?php foreach ($d->rows as $t) : ?>
            <li class="timeline-item mb-5">
                <div class="row">
                    <div class="col-6" class="info">
                        <h5 class="fw-bold"><?php echo $t->nivelEstudio_estudioRealizado; ?></h5>
                        <p class="text-muted mb-2 fw-bold"><?php echo $t->centroEducativo_estudioRealizado; ?></p>
                        <p class="text-muted mb-2 fw-bold"><?php echo $t->inicio_estudiosrealizados . ' - ' . $t->final_estudiosrealizados; ?></p>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href="#" class="text-decoration-none m-2 btnRemove-studiesApplied"><i class="fa fa-trash-o"></i></a>
                        <a href="#" class="text-decoration-none m-2 btnEdit-studiesApplied"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        <li class="timeline-item mb-5">
            <a href="#" class="text-decoration-none" id="aAdd-studiesApplied"><i class="fa fa-plus"></i> Añadir</a>
        </li>
    </ul>
<?php else : ?>
    <ul class="timeline" id="cont-timeLine">
        <li class="timeline-item mb-5">
            <a href="#" class="text-decoration-none" id="aAdd-studiesApplied"><i class="fa fa-plus"></i> Añadir</a>
        </li>
    </ul>
<?php endif; ?>