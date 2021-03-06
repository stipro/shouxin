<?php require_once INCLUDES . 'inc_header.php'; ?>
<div class="container">
  <form id="form-collaborator">
    <div class="card mt-4">
      <?php echo Flasher::flash(); ?>
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
            <div class="col-6 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertSlt-documentIdentity-collaborator" class="control-label form-control-sm">Doc. de Indentificación<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertSlt-documentIdentity-collaborator" class="form-select form-select-sm custom-select" data-placeholder="Seleccióne Doc. de Indentificación">
                    <option value="DOC. NACIONAL DE IDENTIDAD">DOC. NACIONAL DE IDENTIDAD</option>
                    <option value="REG. UNICO DE CONTRIBUYENTES">REG. UNICO DE CONTRIBUYENTES</option>
                    <option value="CARNE DE EXTRANJERIA">CARNE DE EXTRANJERIA</option>
                    <option value="PASAPORTE">PASAPORTE</option>
                    <option value="PARTIDA DE NACIMIENTO">PARTIDA DE NACIMIENTO</option>
                  </select>
                  <input type="file" class="input-group-text form-control" id="documentIdentityArchive-collaborator" aria-describedby="documentIdentityArchive" aria-label="Upload">
                  <div>
                  </div>
                </div>
                <div id="documentIdentity-collaborator-Help" class="form-text">Adjunte su Indentificación</div>
              </div>
            </div>
            <div class="col-6 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-documentNumber-collaborator" class="control-label form-control-sm">Numero de Indentificación<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <button class="btn btn-primary" type="button" id="btnSearch-collaboratorDni"><i class="fa fa-search"></i></button>
                  <input type="text" name="documentNumber-collaborator" id="insertIpt-documentNumber-collaborator" class="form-control form-control-sm" value="">
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-lastNameFather-collaborator" class="control-label form-control-sm form-label">Apellido Paterno<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="lastNameFather-collaborator" id="insertIpt-lastNameFather-collaborator" class="form-control form-control-sm" placeholder="Apellido Paterno" value="">
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-lastNameMother-collaborator" class="control-label form-control-sm form-label">Apellido Materno<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="lastNameMother-collaborator" id="insertIpt-lastNameMother-collaborator" class="form-control form-control-sm" placeholder="Apellido Materno" value="">
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-name-collaborator" class="control-label form-control-sm form-label">Nombres<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="name-collaborator" id="insertIpt-name-collaborator" class="form-control form-control-sm" placeholder="Nombres" value="">
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertSlt-gender-collaborator" class="control-label form-control-sm">Género<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertSlt-gender-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Nacionalidad">
                    <option value=""></option>
                    <option value="Masculino" data-id="M">Masculino</option>
                    <option value="Femenino" data-id="F">Femenino</option>
                  </select>
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertSlt-nationality-collaborator" class="control-label form-control-sm">Nacionalidad<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertSlt-nationality-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Nacionalidad">
                    <option value=""></option>
                    <?php if (empty(get_all_nacionalidades())) : ?>
                      <option value="--0--">--No se obtuvo informacion--</option>
                    <?php else : ?>
                      <?php foreach (get_all_nacionalidades() as $cl) : ?>
                        <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $cl[0], $cl[1], $cl[2]); ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertSlt-statusMarital-collaborator" class="control-label form-control-sm">Estado Civil <span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertSlt-statusMarital-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne Estado Civil">
                    <option value=""></option>
                    <option value="CASADO">CASADO</option>
                    <option value="CONVIVIENTE">CONVIVIENTE</option>
                    <option value="DIVORCIADO">DIVORCIADO</option>
                    <option value="SOLTERO">SOLTERO</option>
                    <option value="VIUDO">VIUDO</option>
                  </select>
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-birthdate-collaborator" class="control-label form-control-sm">Fecha de Nacimiento<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="date" name="birthdate-collaborator" id="insertIpt-birthdate-collaborator" class="form-control form-control-sm disabled" value="">
                  <div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-profession-collaborator" class="control-label form-control-sm">Profesión, Arte u Oficio<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="profession-collaborator" id="insertIpt-profession-collaborator" class="form-control form-control-sm" value="">
                  <div>
                  </div>
                </div>
                <div id="profession-collaborator-Help" class="form-text">N° Colegio Profesional (si aplica)</div>
              </div>
            </div>

            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-conditionProperty-collaborator" class="control-label form-control-sm">Cond. del inmueble en el que vive<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertIpt-conditionProperty-collaborator" class="form-select form-select-sm" data-placeholder="Seleccióne opción">
                    <option value=""></option>
                    <option value="Casa Propia">Casa Propia</option>
                    <option value="De los Padres">De los Padres</option>
                    <option value="De la sociedad conyugal">De la sociedad conyugal</option>
                    <option value="De los convivientes">De los convivientes</option>
                    <option value="Alquilada">Alquilada</option>
                    <option value="Cedida en uso">Cedida en uso</option>
                    <option value="Otro">Otro</option>
                  </select>
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-position-collaborator" class="control-label form-control-sm">Ocupación/ Cargo en la Empresa<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="position-collaborator" id="insertIpt-position-collaborator" class="form-control form-control-sm" value="">
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-phone-collaborator" class="control-label form-control-sm">Numero de Celular<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="phone-collaborator" id="insertIpt-phone-collaborator" class="form-control form-control-sm" value="">
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <div class="form-group">
                <label for="insertIpt-email-collaborator" class="control-label form-control-sm">Correo Electronico<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="email-collaborator" id="insertIpt-email-collaborator" class="form-control form-control-sm" value="<?php echo $_SESSION['user_session_shouxin']['user']['email'] ?>">
                  <div>
                  </div>
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
                <label for="insertIpt-documentIdentity-spouseorpartner" class="control-label form-control-sm">Doc. de Indentificación<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertIpt-documentIdentity-spouseorpartner" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                    <option value=""></option>
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
                <label for="insertIpt-documentNumber-spouseorpartner" class="control-label form-control-sm">Numero de Indentificación<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="documentNumber-spouseorpartner" id="insertIpt-documentNumber-spouseorpartner" class="form-control form-control-sm" value="">
                  <div></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row border m-2">
            <div class="text-primary mt-2">
              <h5>Dependientes</h5>
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <div class="form-group">
                <label for="insertSlt-kindofdependents-collaborator" class="control-label form-control-sm">Dependientes<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertSlt-kindofdependents-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                    <option value=""></option>
                    <option value="Hijos">Hijos</option>
                    <option value="Padres">Padres</option>
                    <option value="Otros">Otros</option>
                  </select>
                  <div></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <div class="form-group">
                <label for="insertIpt-kindofdependentsAmount-collaborator" class="control-label form-control-sm">Cantidad<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="number" name="kindofdependentsAmount-collaborator" id="insertIpt-kindofdependentsAmount-collaborator" class="form-control form-control-sm" value="">
                  <div></div>
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
                <label for="insertIpt-contributorType-collaborator" class="control-label form-control-sm">Tipo de registro<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <select id="insertIpt-contributorType-collaborator" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                    <option value=""></option>
                    <option value="R.U.C.">R.U.C.</option>
                    <option value="R.U.S.">R.U.S.</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 mb-3">
              <div class="form-group">
                <label for="insertIpt-contributorNumber-collaborator" class="control-label form-control-sm">Numero de registro<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <input type="text" name="contributorNumber-collaborator" id="insertIpt-contributorNumber-collaborator" class="form-control form-control-sm" value="">
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 mb-3">
              <div class="form-group">
                <label for="insertIpt-complementaryInformation-collaborator" class="control-label form-control-sm">Información complementaria<span class="text-danger">*</span></label>
                <div class="input-group input-group-sm">
                  <textarea id="insertIpt-complementaryInformation-collaborator" class="form-control form-control-sm" rows="4" cols="50" name="comment" form="usrform">Introducir texto aquí...    
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
            <section class="wrapper_studiesApplied">
              <ul class="timeline" id="cont-timeLine">
                <li class="timeline-item mb-5">
                  <div class="row">
                    <div class="col-6" class="info">
                      <h5 class="fw-bold">[Nivel de estudio]</h5>
                      <p class="text-muted mb-2 fw-bold">[Centro educativo]</p>
                      <p class="text-muted mb-2 fw-bold">[F. Inicio - F. Conclusión]</p>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                      <a href="#" class="text-decoration-none m-2 btnRemove-studiesApplied"><i class="fa fa-trash-o"></i></a>
                      <a href="#" class="text-decoration-none m-2 btnEdit-studiesApplied"><i class="fa fa-pencil"></i></a>
                    </div>
                  </div>
                </li>
                <template id="template-studiesApplied">
                  <li class="timeline-item mb-5">
                    <div class="row">
                      <div class="col-6 info">
                        <h5 class="fw-bold">[Nivel de estudio]</h5>
                        <p class="text-muted mb-2 fw-bold centerEducational">[Centro educativo]</p>
                        <p class="text-muted mb-2 fw-bold">[F. Inicio - F. Conclusión]</p>
                      </div>
                      <div class="col-6 d-flex justify-content-end">
                        <a href="#" class="text-decoration-none"><i class="fa fa-pencil"></i></a>
                      </div>
                    </div>
                  </li>
                </template>
                <li class="timeline-item mb-5">
                  <a href="#" class="text-decoration-none" id="aAdd-studiesApplied"><i class="fa fa-plus"></i> Añadir</a>
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
            <section class="wrapper_experienceWork">
              <ul class="timeline">
                <li class="timeline-item mb-5">
                  <div class="row">
                    <div class="col-6">
                      <h5 class="fw-bold">[Cargo]</h5>
                      <p class="text-muted mb-2 fw-bold">[Empresa]</p>
                      <p class="text-muted mb-2 fw-bold">[F. Inicio - F. Conclusión]</p>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                      <a href="#" class="text-decoration-none m-2 btnRemove-experienceWork"><i class="fa fa-trash-o"></i></a>
                      <a href="#" class="text-decoration-none m-2 btnEdit-experienceWork"><i class="fa fa-pencil"></i></a>
                    </div>
                  </div>
                </li>
                <li class="timeline-item mb-5">
                  <a href="#" class="text-decoration-none" id="aAdd-experienceWork"><i class="fa fa-plus"></i> Añadir</a>
                  <div id="trainings-collaborator-Help" class="form-text">* Complete los datos de su experiencia laboral, de la más reciente a la más antigua. Adicione más filas si lo requiere..</div>
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
            <section class="wrapper_trainings">
              <ul class="timeline">
                <li class="timeline-item mb-5">
                  <div class="row">
                    <div class="col-6">
                      <h5 class="fw-bold">[Curso o Evento]</h5>
                      <p class="text-muted mb-2 fw-bold">[institución o organizad@]</p>
                      <p class="text-muted mb-2 fw-bold">[F. Curso o Evento]</p>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                      <a href="#" class="text-decoration-none m-2 btnRemove-trainings"><i class="fa fa-trash-o"></i></a>
                      <a href="#" class="text-decoration-none m-2 btnEdit-trainings"><i class="fa fa-pencil"></i></a>
                    </div>
                  </div>

                </li>
                <li class="timeline-item mb-5">
                  <a href="#" class="text-decoration-none" id="aAdd-trainings"><i class="fa fa-plus"></i> Añadir</a>
                  <div id="trainings-collaborator-Help" class="form-text">* Complete los datos de las capacitaciones recibidas, de la más reciente a la más antigua.</div>
                </li>

              </ul>

            </section>
            <!-- Section: Timeline -->
          </div>
          <div class="row border m-2">
            <div class="text-primary mt-2 mb-2">
              <h5>Información Patrimonial</h5>
              <p>(R.SBS Nº 789-2018 - art. 17, R.Nº 00006-2021-SMV/01
                Publicado el 31/03/2021)</p>
            </div>
            <div class="mt-2 mb-2">
              <ol type="1" start="1">
                <li class="text-primary mb-2">INGRESOS
                </li>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Monto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Remuneración bruta mensual (En planilla del Empleador):</td>
                        <td><input type="text" class="input-group-text form-control"></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Otros Ingresos por ejercicio individual de profesión, oficio u otra actividad:</td>
                        <td><input type="text" class="input-group-text form-control"></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Ingresos mensuales del cónyuge o conviviente:</td>
                        <td><input type="text" class="input-group-text form-control"></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td>TOTAL</td>
                        <td>$0.00</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </ol>
            </div>

            <div class="mt-2 mb-2">
              <ol type="1" start="2">
                <li class="text-primary">BIENES INMUEBLES DEL DECLARANTE Y SOCIEDAD DE GANANCIALES (Perú)</li>
              </ol>
              <!-- Section: Timeline -->
              <section class="ms-4 wrapper_realProperty">
                <ul class="timeline">
                  <li class="timeline-item mb-5">
                    <div class="row">
                      <div class="col-6">
                        <h5 class="fw-bold">[N° de Fiche o Partida Registral]</h5>
                        <p class="text-muted mb-2 fw-bold">[Dirección]</p>
                        <p class="text-muted mb-2 fw-bold">[Valor]</p>
                        <p class="text-muted mb-2 fw-bold">[bien propio o conyugal]</p>
                      </div>
                      <div class="col-6 d-flex justify-content-end">
                        <a href="#" class="text-decoration-none"><i class="fa fa-pencil"></i></a>
                      </div>
                    </div>

                  </li>
                  <li class="timeline-item mb-5">
                    <p class="text-muted mb-2 fw-bold">[Total]</p>
                    <a href="#" class="text-decoration-none" id="aAdd-propertyReal"><i class="fa fa-plus"></i> Añadir</a>
                    <div id="propertyReal-collaborator-Help" class="form-text">* Adicione más si lo requiere.</div>
                  </li>
                </ul>
              </section>
              <!-- Section: Timeline -->
            </div>

            <div class="mt-2 mb-2">
              <ol type="1" start="3">
                <li class="text-primary">BIENES MUEBLES DEL DECLARANTE Y SOCIEDAD DE GANANCIALES (Perú)</li>
              </ol>
              <!-- Section: Timeline -->
              <section class="ms-4 wrapper_realProperty_earningsCompany_declarant">
                <ul class="timeline">
                  <li class="timeline-item mb-5">
                    <div class="row">
                      <div class="col-6">
                        <h5 class="fw-bold">[N° de Fiche o Partida Registral]</h5>
                        <p class="text-muted mb-2 fw-bold">[Dirección]</p>
                        <p class="text-muted mb-2 fw-bold">[Valor]</p>
                        <p class="text-muted mb-2 fw-bold">[bien propio o conyugal]</p>
                      </div>
                      <div class="col-6 d-flex justify-content-end">
                        <a href="#" class="text-decoration-none"><i class="fa fa-pencil"></i></a>
                      </div>
                    </div>

                  </li>
                  <li class="timeline-item mb-5">
                    <p class="text-muted mb-2 fw-bold">[Total]</p>
                    <a href="#" class="text-decoration-none" id="aAdd-propertyMovable"><i class="fa fa-plus"></i> Añadir</a>
                    <div id="propertyMovable-collaborator-Help" class="form-text">* Adicione más si lo requiere.</div>
                  </li>
                </ul>
              </section>
              <!-- Section: Timeline -->
            </div>

            <div class="mt-2 mb-2">
              <ol type="1" start="4">
                <li class="text-primary">AHORROS, DEPÓSITOS, COLOCACIONES, INVERSIONES EN EL SISTEMA FINANCIERO DEL DECLARANTE (incluir sociedad de gananciales)</li>
              </ol>
              <!-- Section: Timeline -->
              <section class="ms-4 wrapper_realProperty_earningsCompany_declarant">
                <ul class="timeline">
                  <li class="timeline-item mb-5">
                    <div class="row">
                      <div class="col-6">
                        <h5 class="fw-bold">[N° de Fiche o Partida Registral]</h5>
                        <p class="text-muted mb-2 fw-bold">[Dirección]</p>
                        <p class="text-muted mb-2 fw-bold">[Valor]</p>
                        <p class="text-muted mb-2 fw-bold">[bien propio o conyugal]</p>
                      </div>
                      <div class="col-6 d-flex justify-content-end">
                        <a href="#" class="text-decoration-none"><i class="fa fa-pencil"></i></a>
                      </div>
                    </div>

                  </li>
                  <li class="timeline-item mb-5">
                    <p class="text-muted mb-2 fw-bold">[Total]</p>
                    <a href="#" class="text-decoration-none" id="aAdd-stateFinancial"><i class="fa fa-plus"></i> Añadir</a>
                    <div id="stateFinancial-collaborator-Help" class="form-text">* Adicione más si lo requiere.</div>
                  </li>
                </ul>
              </section>
              <!-- Section: Timeline -->
            </div>
          </div>
          <div class="row border m-2">
            <div class="text-primary mt-2">
              <h5>Acreencias y Obligaciónes</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer clearfix">
        <a href="./home/flash" class="btn btn-danger float-start">Regresar</a>
        <button class="btn btn-success float-end" type="submit">Registrar</button>
        <!-- <a href="logout" class="btn btn-danger float-end confirmar">Cerrar sesión</a> -->
      </div>

    </div>
  </form>
</div>
<?php require_once VIEWS . 'form_legal/modals/create_experienceWork.php'; ?>
<?php require_once VIEWS . 'form_legal/modals/create_studiesApplied.php'; ?>
<?php require_once VIEWS . 'form_legal/modals/create_trainings.php'; ?>
<?php require_once VIEWS . 'form_legal/modals/add_propertyReal.php'; ?>
<?php require_once VIEWS . 'form_legal/modals/add_propertyMovable.php'; ?>
<?php require_once VIEWS . 'form_legal/modals/add_stateFinancial.php'; ?>
<?php require_once VIEWS . 'form_legal/modals/add_stateReal.php'; ?>
<?php require_once INCLUDES . 'inc_footer.php'; ?>