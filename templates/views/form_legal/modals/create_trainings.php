<!-- Modal -->
<div class="modal fade" id="mdAdd-trainings" tabindex="-1" aria-labelledby="mdAdd-trainingsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdAdd-trainingsLabel">Añadir Capacitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label class="control-label form-control-sm">Nombre de Curso ó Evento<span class="text-danger">*</span><br></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="courseorevent-trainings" class="form-control form-control-sm" placeholder="Nombre de Curso ó Evento" value="">
                                <div></div>
                            </div>
                            <div id="courseorevent-trainings-Help" class="form-text"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label class="control-label form-control-sm">Institución(es) Organizadora(s)<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="courseorevent-trainings" class="form-control form-control-sm" placeholder="Nombre de Curso ó Evento" value="">
                                <div></div>
                            </div>
                            <div id="courseorevent-trainings-Help" class="form-text"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label class="control-label form-control-sm form-label" for="certificate-studiesApplied">Certificación<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-sm" id="certificate-studiesApplied" type="file"><br>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label class="control-label form-control-sm form-label">Mes - Año<span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <select id="sinceMonth-studiesApplied" class="form-select form-select-sm" data-placeholder="Seleccióne">
                                    <option value="Enero" data-format="1">Enero</option>
                                    <option value="Febrero" data-format="2">Febrero</option>
                                    <option value="Marzo" data-format="3">Marzo</option>
                                    <option value="Abril" data-format="4">Abril</option>
                                    <option value="Mayo" data-format="5">Mayo</option>
                                    <option value="Junio" data-format="6">Junio</option>
                                    <option value="Julio" data-format="7">Julio</option>
                                    <option value="Agosto" data-format="8">Agosto</option>
                                    <option value="Septiembre" data-format="9">Septiembre</option>
                                    <option value="Octubre" data-format="10">Octubre</option>
                                    <option value="Noviembre" data-format="11">Noviembre</option>
                                    <option value="Diciembre" data-format="12">Diciembre</option>
                                </select>
                                <select id="sinceYear-studiesApplied" class="col-6 form-select form-select-sm" data-placeholder="Seleccióne">
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                </select>
                            </div>
                            <div id="lastNameFather-collaborator-Help" class="form-text"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>