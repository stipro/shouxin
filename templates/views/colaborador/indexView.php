<?php require_once INCLUDES . 'inc_header.php'; ?>
<div class="container">
  <div class="card mt-4">
    <div class="card-header d-flex justify-content-between">
      <h3 class="card-title">Colaborador</h3>
    </div>
    <div class="card-body">
      <h5 class="text-justify fs-6 lh-sm">Por el presente documento declaro bajo juramento lo siguiente:</h5><br>
      <ol type="I" start="1">
        <li class="text-justify fs-6 fw-light lh-sm">Que los datos y demás información consignada en el presente documento son verdaderos y actuales, obligándome frente a MSP S.A. a presentarla anualmente, con los datos actualizados a la fecha de presentación, en concordnacia con la Resolución SBS N° 789-2018. Asimismo, autorizo a la empresa la verificación de la presente información.
      </ol>
      <div class="row m-3">

        <div class="row border m-2">
          <div class="text-primary mt-2">
            <h5>Datos Personales</h5>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <label for="insertIpt-lastNameFather-collaborator" class="control-label form-control-sm">Apellido Paterno<span class="text-danger">*</span></label>
            <input type="text" name="lastNameFather-collaborator" id="insertIpt-lastNameFather-collaborator" class="form-control form-control-sm disabled" placeholder="Apellido Paterno" value="">
            <div id="lastNameFather-collaborator-Help" class="form-text"></div>
          </div>

          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-lastNameMother-collaborator" class="control-label form-control-sm">Apellido Materno<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="text" name="lastNameMother-collaborator" id="insertIpt-lastNameMother-collaborator" class="form-control form-control-sm disabled" placeholder="Apellido Materno" value="">
              </div>
              <div id="lastNameMother-collaborator-help" class="form-text"></div>
            </div>
          </div>

          <div class="col-7 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-name-collaborator" class="control-label form-control-sm">Nombres<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="text" name="name-collaborator" id="insertIpt-name-collaborator" class="form-control form-control-sm disabled" placeholder="Nombres" value="">
              </div>
            </div>
          </div>

          <div class="col-5 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-nationality-collaborator" class="control-label form-control-sm">Nacionalidad<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertIpt-nationality-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Nacionalidad">
                  <option value=""></option>
                  <?php if (empty(get_all_nacionalidades())) : ?>
                    <option value="--0--">--No se obtuvo informacion--</option>
                  <?php else : ?>
                    <?php foreach (get_all_nacionalidades() as $cl) : ?>
                      <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $cl[0], $cl[1], $cl[2]); ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-statusMarital-collaborator" class="control-label form-control-sm">Estado Civil <span class="text-danger">*<br></span></label>
              <div class="input-group input-group-sm">
                <select id="insertIpt-statusMarital-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                  <option value="CASADO">CASADO</option>
                  <option value="CONVIVIENTE">CONVIVIENTE</option>
                  <option value="DIVORCIADO">DIVORCIADO</option>
                  <option value="SOLTERO">SOLTERO</option>
                  <option value="VIUDO">VIUDO</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-birthdate-collaborator" class="control-label form-control-sm">Fecha de Nacimiento<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="date" name="birthdate-collaborator" id="insertIpt-birthdate-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
            </div>
          </div>

          <div class="col-6 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-documentIdentity-collaborator" class="control-label form-control-sm">Doc. de Indentificación<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertIpt-documentIdentity-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                  <option value="DOC. NACIONAL DE IDENTIDAD">DOC. NACIONAL DE IDENTIDAD</option>
                  <option value="REG. UNICO DE CONTRIBUYENTES">REG. UNICO DE CONTRIBUYENTES</option>
                  <option value="CARNE DE EXTRANJERIA">CARNE DE EXTRANJERIA</option>
                  <option value="PASAPORTE">PASAPORTE</option>
                  <option value="PARTIDA DE NACIMIENTO">PARTIDA DE NACIMIENTO</option>
                </select>
                <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
              </div>
              <div id="documentIdentity-collaborator-Help" class="form-text">Adjunte su documento</div>
            </div>
          </div>

          <div class="col-6 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-documentNumber-collaborator" class="control-label form-control-sm">Numero de Indentificación<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="text" name="documentNumber-collaborator" id="insertIpt-documentNumber-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-profession-collaborator" class="control-label form-control-sm">Profesión, Arte u Oficio<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="text" name="profession-collaborator" id="insertIpt-profession-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
              <div id="profession-collaborator-Help" class="form-text">N° Colegio Profesional (si aplica)</div>
            </div>
          </div>

          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-conditionProperty-collaborator" class="control-label form-control-sm">Cond. del inmueble en el que vive<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertIpt-conditionProperty-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                  <option value="Casa Propia">Casa Propia</option>
                  <option value="De los Padres">De los Padres</option>
                  <option value="De la sociedad conyugal">De la sociedad conyugal</option>
                  <option value="De los convivientes">De los convivientes</option>
                  <option value="Alquilada">Alquilada</option>
                  <option value="Cedida en uso">Cedida en uso</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
              <label for="insertIpt-number-collaborator" class="control-label form-control-sm">Ocupación/ Cargo en la Empresa<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="text" name="number-collaborator" id="insertIpt-number-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
            </div>
          </div>
        </div>

        <div class="row border m-2">
          <div class="text-primary mt-2">
            <h5>Lugar de nacimiento</h5>
          </div>
          <div class="col-12 col-sm-12 mb-3">
            <div class="form-group countryBirth-wrapper">
              <label for="insertSlt-countryBirth-collaborator" class="control-label form-control-sm">Pais<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertSlt-countryBirth-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Pais">
                  <option value=""></option>
                  <?php if (empty(get_all_paises())) : ?>
                    <option value="--0--">--No se obtuvo informacion--</option>
                  <?php else : ?>
                    <?php foreach (get_all_paises() as $cl) : ?>
                      <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $cl[0], $cl[1], $cl[2]); ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group departmentBirth-wrapper">
              <label for="insertSlt-departmentBirth-collaborator" class="control-label form-control-sm">Departamento<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertSlt-departmentBirth-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Pais">
                  <option value=""></option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group provinceBirth-wrapper">
              <label for="insertSlt-provinceBirth-collaborator" class="control-label form-control-sm">Provincia<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertSlt-provinceBirth-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Departamento">
                  <option value=""></option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group districtBirth-wrapper">
              <label for="insertSlt-districtBirth-collaborator" class="control-label form-control-sm">Distrito<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertSlt-districtBirth-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Provincia">
                  <<option value="">
                    </option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row border m-2">
          <div class="text-primary mt-2">
            <h5>Dirección Domiciliaria Actual</h5>
          </div>
          <div class="col-12 col-sm-5 mb-3">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <select id="insertIpt-product-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                  <option value="-">-</option>
                  <option value="Avenida">Avenida</option>
                  <option value="Jiron">Jiron</option>
                  <option value="Calle">Calle</option>
                  <option value="Alameda">Alameda</option>
                  <option value="Malecon">Malecon</option>
                  <option value="Ovalo">Ovalo</option>
                  <option value="Parque">Parque</option>
                  <option value="Plaza">Plaza</option>
                  <option value="Carretera">Carretera</option>
                  <option value="Bloque">Bloque</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-7 mb-3">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <input type="text" name="number-collaborator" id="insertIpt-number-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-5 mb-3">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <select id="insertIpt-product-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                  <option value="-">-</option>
                  <option value="Urb. - Urbanización">Urb. - Urbanización</option>
                  <option value="P.J. - Pueblo Joven">P.J. - Pueblo Joven</option>
                  <option value="U.v. - Unidad Vecinal">U.v. - Unidad Vecinal</option>
                  <option value="C.H. Conjunto Habitaciónal">C.H. Conjunto Habitaciónal</option>
                  <option value="A.H Asentamiento Humano">A.H Asentamiento Humano</option>
                  <option value="COO. Cooperativa">COO. Cooperativa</option>
                  <option value="Res. Residencial">Res. Residencial</option>
                  <option value="Z.I. Zona Industrial">Z.I. Zona Industrial</option>
                  <option value="GRU. Grupo">GRU. Grupo</option>
                  <option value="CAS. Caserio">CAS. Caserio</option>
                  <option value="FND. FUNDO">FND. FUNDO</option>
                  <option value="P.T Pueblo tradiciónal">FND. Pueblo tradiciónal</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-7 mb-3">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <input type="text" name="number-collaborator" id="insertIpt-number-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group departmentHome-wrapper">
              <label for="insertSlt-departmentHome-collaborator" class="control-label form-control-sm">Departamento<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertSlt-departmentHome-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Departamento">
                  <option value=""></option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group provinceHome-wrapper">
              <label for="insertSlt-provinceHome-collaborator" class="control-label form-control-sm">Provincia<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertSlt-provinceHome-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Provincia">
                  <option value=""></option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 mb-3">
            <div class="form-group districtHome-wrapper">
              <label for="insertSlt-districtHome-collaborator" class="control-label form-control-sm">Distrito<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertSlt-districtHome-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Distrito">
                  <option value=""></option>
                </select>
              </div>
            </div>
          </div>
        </div>


        <div class="row border m-2">
          <div class="text-primary mt-2">
            <h5>Cónyuge o Coviviente</h5>
          </div>
          <div class="col-12 col-sm-6 mb-3">
            <div class="form-group">
              <label for="insertIpt-number-collaborator" class="control-label form-control-sm">Doc. de Indentificación<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertIpt-product-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                  <option value="DOC. NACIONAL DE IDENTIDAD">DOC. NACIONAL DE IDENTIDAD</option>
                  <option value="REG. UNICO DE CONTRIBUYENTES">REG. UNICO DE CONTRIBUYENTES</option>
                  <option value="CARNE DE EXTRANJERIA">CARNE DE EXTRANJERIA</option>
                  <option value="PASAPORTE">PASAPORTE</option>
                  <option value="PARTIDA DE NACIMIENTO">PARTIDA DE NACIMIENTO</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 mb-3">
            <div class="form-group">
              <label for="insertIpt-number-collaborator" class="control-label form-control-sm">Numero de Indentificación<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="text" name="number-collaborator" id="insertIpt-number-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
            </div>
          </div>
        </div>

        <div class="row border m-2">
          <div class="text-primary mt-2">
            <h5>Dependientes</h5>
          </div>
          <div class="col-12 col-sm-3 mb-3">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <input type="number" name="number-collaborator" id="insertIpt-number-collaborator" class="form-control form-control-sm disabled" value="">
              </div>
            </div>
          </div>
        </div>

        <div class="row border m-2">
          <div class="text-primary mt-2">
            <h5>Registro Sunat</h5>
          </div>
          <div class="col-12 col-sm-6 mb-3">
            <div class="form-group">
              <label for="insertIpt-number-collaborator" class="control-label form-control-sm">Tipo de registro<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <select id="insertIpt-product-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                  <option value="R.U.C.">R.U.C.</option>
                  <option value="R.U.S.">R.U.S.</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 mb-3">
            <div class="form-group">
              <label for="insertIpt-number-collaborator" class="control-label form-control-sm">Numero de registro<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <input type="text" name="number-collaborator" id="insertIpt-number-collaborator" class="form-control form-control-sm" value="">
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 mb-3">
            <div class="form-group">
              <label for="insertIpt-number-collaborator" class="control-label form-control-sm">Información complementaria<span class="text-danger">*</span></label>
              <div class="input-group input-group-sm">
                <textarea class="form-control form-control-sm" rows="4" cols="50" name="comment" form="usrform">Enter text here...    
                      </textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="row border m-2">
          <div class="text-primary mt-2 mb-2">
            <h5>Éstudios Realizádos</h5>
          </div>
          <!-- Section: Timeline -->
          <section class="">
            <ul class="timeline">
              <li class="timeline-item mb-5">
                <div class="row">
                  <div class="col-6">
                    <h5 class="fw-bold">[Nivel de estudio]</h5>
                    <p class="text-muted mb-2 fw-bold">[Centro educativo]</p>
                    <p class="text-muted mb-2 fw-bold">[F. Inicio - F. Conclusión]</p>
                  </div>
                  <div class="col-6 d-flex justify-content-end">
                    <a href="#" class="text-decoration-none"><i class="fa fa-pencil"></i></a>
                  </div>
                </div>
              </li>

              <li class="timeline-item mb-5">
                <a href="#" class="text-decoration-none" id="aAdd-experienceWork"><i class="fa fa-plus"></i> Añadir</a>
              </li>
            </ul>
          </section>
          <!-- Section: Timeline -->
        </div>

        <div class="row border m-2">
          <div class="text-primary mt-2 mb-2">
            <h5>Experiencia laboral</h5>
          </div>
          <!-- Section: Timeline -->
          <section class="">
            <ul class="timeline">
              <li class="timeline-item mb-5">
                <div class="row">
                  <div class="col-6">
                    <h5 class="fw-bold">[Cargo]</h5>
                    <p class="text-muted mb-2 fw-bold">[Empresa]</p>
                    <p class="text-muted mb-2 fw-bold">[F. Inicio - F. Conclusión]</p>
                  </div>
                  <div class="col-6 d-flex justify-content-end">
                    <a href="#" class="text-decoration-none"><i class="fa fa-pencil"></i></a>
                  </div>
                </div>
              </li>
              <li class="timeline-item mb-5">
                <a href="#" class="text-decoration-none" id="aAdd-studiesApplied"><i class="fa fa-plus"></i> Añadir</a>
              </li>
            </ul>
          </section>
          <!-- Section: Timeline -->
        </div>

        <div class="row border m-2">
          <div class="text-primary mt-2 mb-2">
            <h5>CAPACITACIÓN</h5>
          </div>
          <!-- Section: Timeline -->
          <section class="">
            <ul class="timeline">
              <li class="timeline-item mb-5">
                <div class="row">
                  <div class="col-6">
                    <h5 class="fw-bold">[Curso o Evento]</h5>
                    <p class="text-muted mb-2 fw-bold">[institución o organizad@]</p>
                    <p class="text-muted mb-2 fw-bold">[F. Curso o Evento]</p>
                  </div>
                  <div class="col-6 d-flex justify-content-end">
                    <a href="#" class="text-decoration-none"><i class="fa fa-pencil"></i></a>
                  </div>
                </div>

              </li>
              <li class="timeline-item mb-5">
                <a href="#" class="text-decoration-none" id="aAdd-trainings"><i class="fa fa-plus"></i> Añadir</a>
              </li>
            </ul>
          </section>
          <!-- Section: Timeline -->
        </div>

        <div class="row border m-2">
          <div class="text-primary mt-2 mb-2">
            <h5>INFORMACIÓN PATRIMONIAL</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer clearfix">
      <a href="./home/flash" class="btn btn-danger float-start">Regresar</a>
      <a href="#" class="btn btn-success float-end">Registrar</a>
      <!-- <a href="logout" class="btn btn-danger float-end confirmar">Cerrar sesión</a> -->
    </div>
  </div>
</div>

<?php require_once INCLUDES . 'inc_footer.php'; ?>
<?php require_once VIEWS . 'colaborador/modals/create_experienceWork.php'; ?>
<?php require_once VIEWS . 'colaborador/modals/create_studiesApplied.php'; ?>
<?php require_once VIEWS . 'colaborador/modals/create_trainings.php'; ?>