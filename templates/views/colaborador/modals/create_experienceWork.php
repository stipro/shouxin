<!-- Modal -->
<div class="modal fade" id="mdAdd-experienceWork" tabindex="-1" aria-labelledby="mdAdd-experienceWorkLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="add_studiesApplied_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdAdd-experienceWorkLabel">Añadir formación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="control-label form-control-sm form-label" for="centerEducational-studiesApplied">Centro educativo<span class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" id="centerEducational-studiesApplied" name="centerEducational-studiesApplied" type="text" placeholder="Centro educativo" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="control-label form-control-sm form-label">Nivel de estudios<span class="text-danger">*</span></label>
                                <select class="form-select form-select-sm" id="levelEducational-studiesApplied" data-placeholder="Seleccióne">
                                    <option value=""></option>
                                    <option value="Educación Primaria">Educación Primaria</option>
                                    <option value="Educación Secundaria">Educación Secundaria</option>
                                    <option value="Técnico">Técnico</option>
                                    <option value="Universitario">Universitario</option>
                                    <option value="Maestría">Maestría</option>
                                    <option value="Doctorado">Doctorado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="control-label form-control-sm form-label">Cursando actualmente<span class="text-danger">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="control-label form-control-sm form-label" for="certificate-studiesApplied">Certificación<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-sm" id="certificate-studiesApplied" name="certificate" type="file" onchange="uploadFile()"><br>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="control-label form-control-sm form-label">Desde<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select id="sinceMonth-studiesApplied" class="form-select form-select-sm" data-placeholder="Seleccióne">
                                        <option value="Enero">Enero</option>
                                        <option value="Febrero">Febrero</option>
                                        <option value="Marzo">Marzo</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Mayo">Mayo</option>
                                        <option value="Junio">Junio</option>
                                        <option value="Julio">Julio</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Septiembre">Septiembre</option>
                                        <option value="Octubre">Octubre</option>
                                        <option value="HNoviembre">HNoviembre</option>
                                        <option value="Diciembre">Diciembre</option>
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
                        <div class="col-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="control-label form-control-sm form-label">Hasta<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select id="untilMonth-studiesApplied" class="form-select form-select-sm" data-placeholder="Seleccióne">
                                        <option value="Enero">Enero</option>
                                        <option value="Febrero">Febrero</option>
                                        <option value="Marzo">Marzo</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Mayo">Mayo</option>
                                        <option value="Junio">Junio</option>
                                        <option value="Julio">Julio</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Septiembre">Septiembre</option>
                                        <option value="Octubre">Octubre</option>
                                        <option value="HNoviembre">HNoviembre</option>
                                        <option value="Diciembre">Diciembre</option>
                                    </select>
                                    <select id="untilYear-studiesApplied" class="col-6 form-select form-select-sm" data-placeholder="Seleccióne">
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
                        <div id="profession-collaborator-Help" class="form-text">* De no tener título, indique si el título está en trámite, es Egresado o está cursando estudios a la fecha (Indique el ciclo)</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>