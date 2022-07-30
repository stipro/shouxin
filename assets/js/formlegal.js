const form = document.getElementById('form-collaborator');
const documentIdentity_collaborator = document.getElementById('insertSlt-documentIdentity-collaborator');
const documentIdentityArchive_collaborator = document.getElementById('documentIdentityArchive-collaborator');

const documentNumber_collaborator = document.getElementById('insertIpt-documentNumber-collaborator');
const btnSearch_colaboradorDni = document.getElementById('btnSearch-collaboratorDni');

const lastNameFather_collaborator = document.getElementById('insertIpt-lastNameFather-collaborator');
const lastNameMother_collaborator = document.getElementById('insertIpt-lastNameMother-collaborator');
const name_collaborator = document.getElementById('insertIpt-name-collaborator');
const gender_collaborator = document.getElementById('insertSlt-gender-collaborator');
const nationality_collaborator = document.getElementById('insertSlt-nationality-collaborator');
const statusMarital_collaborator = document.getElementById('insertSlt-statusMarital-collaborator');
const birthdate_collaborator = document.getElementById('insertIpt-birthdate-collaborator');
const profession_collaborator = document.getElementById('insertIpt-profession-collaborator');
const conditionProperty_collaborator = document.getElementById('insertIpt-conditionProperty-collaborator');
const position_collaborator = document.getElementById('insertIpt-position-collaborator');
const phone_collaborator = document.getElementById('insertIpt-phone-collaborator');
const email_collaborator = document.getElementById('insertIpt-email-collaborator');

const documentIdentity_spouseorpartner = document.getElementById('insertIpt-documentIdentity-spouseorpartner');
const documentNumber_spouseorpartner = document.getElementById('insertIpt-documentNumber-spouseorpartner');

const kindofdependents_collaborator = document.getElementById('insertSlt-kindofdependents-collaborator');
const kindofdependentsAmount_collaborator = document.getElementById('insertIpt-kindofdependentsAmount-collaborator');

const contributorType_collaborator = document.getElementById('insertIpt-contributorType-collaborator');
const contributorNumber_collaborator = document.getElementById('insertIpt-contributorNumber-collaborator');
const complementaryInformation_collaborator = document.getElementById('insertIpt-complementaryInformation-collaborator');

const cont_timeLine = document.getElementById('cont-timeLine');
const template_studiesApplied = document.getElementById('template-studiesApplied').content
const fragment = document.createDocumentFragment()

// Estudios Realizado
const centerEducational_studiesApplied = document.getElementById('centerEducational-studiesApplied');
const levelEducational_studiesApplied = document.getElementById('levelEducational-studiesApplied');
const currentlyStudying_studiesApplied = document.getElementById('currentlyStudying-studiesApplied');
const certificateEducational_studiesApplied = document.getElementById('certificate-studiesApplied');
const sinceMonth_studiesApplied = document.getElementById('sinceMonth-studiesApplied');
const sinceYear_studiesApplied = document.getElementById('sinceYear-studiesApplied');
const untilMonth_studiesApplied = document.getElementById('untilMonth-studiesApplied');
const untilYear_studiesApplied = document.getElementById('untilYear-studiesApplied');

/* Se agrega el evento al elemento */
btnSearch_colaboradorDni.addEventListener("click", searchInfo_colaboradorDni);

function searchInfo_colaboradorDni(e) {
    let documentNumber_value = documentNumber_collaborator.value;
    if (documentNumber_value.length == 0) {
        setErrorFor(documentNumber_collaborator, 'No puede dejar numero de Identificación en blanco');
        return;
    } else if (documentNumber_value.length < 8) {
        setErrorFor(documentNumber_collaborator, 'la cantidad de digitos debe ser mayor a 7');
        return;
    }
    else {
        setSuccessFor(documentNumber_collaborator);
    }
    e.preventDefault();
    var button = $(this),
        action = 'get',
        hook = 'bee_hook',
        documentNumber = documentNumber_value;
    // Cargar la información del registro de la lección
    $.ajax({
        url: 'ajax/getInfo_colaborador',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            hook, action, documentNumber
        },
        beforeSend: function () {
            $('.view_presentation_form').waitMe();
            toastr.info('Obteniendo Información!', '¡Bien!');
        }
    }).done(function (res) {
        if (res.status === 200) {
            toastr.success('Información Obtenido!', '¡Bien!');
            lastNameFather_collaborator.value = res.data.data.apellido_paterno;
            lastNameMother_collaborator.value = res.data.data.apellido_materno;
            name_collaborator.value = res.data.data.nombres;

            if (res.data.data.apellido_paterno === '') {
                setErrorFor(lastNameFather_collaborator, 'No puede dejar el Apellido Paterno en blanco');
            } else {
                setSuccessFor(lastNameFather_collaborator);
            }

            if (res.data.data.apellido_materno === '') {
                setErrorFor(lastNameMother_collaborator, 'No puede dejar el Apellido Paterno en blanco');
            } else {
                setSuccessFor(lastNameMother_collaborator);
            }

            if (res.data.data.nombres === '') {
                setErrorFor(name_collaborator, 'No puede dejar el Nombre en blanco');
            } else {
                setSuccessFor(name_collaborator);
            }


        } else {
            toastr.error(res.msg, '¡Upss!');
        }
    }).fail(function (err) {
        toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
    })
}

form.addEventListener('submit', e => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    let documentIdentityArchive_value = $('#documentIdentityArchive-collaborator').prop('files')[0];
    let documentNumber_value = documentNumber_collaborator.value.trim();
    let lastNameFather_value = lastNameFather_collaborator.value.trim();
    let lastNameMother_value = lastNameMother_collaborator.value.trim();
    let name_value = name_collaborator.value.trim();
    let gender_value = gender_collaborator.selectedOptions[0].dataset.id;
    let nationality_value = $('#insertSlt-nationality-collaborator').find(":selected").val();
    let statusMarital_value = $('#insertSlt-statusMarital-collaborator').find(":selected").val();
    let birthdate_value = birthdate_collaborator.value.trim();
    let profession_value = profession_collaborator.value.trim();
    let conditionProperty_value = conditionProperty_collaborator.value;
    let position_value = position_collaborator.value;
    let phone_value = phone_collaborator.value;
    let email_value = email_collaborator.value;

    let documentIdentity_spouseorpartner_value = documentIdentity_spouseorpartner.value;
    let documentNumber_spouseorpartner_value = documentNumber_spouseorpartner.value;
    let kindofdependents_value = kindofdependents_collaborator.value;
    let kindofdependentsAmount_value = kindofdependentsAmount_collaborator.value;

    let contributorType_value = contributorType_collaborator.value;
    let contributorNumber_value = contributorNumber_collaborator.value;
    let complementaryInformation_value = complementaryInformation_collaborator.value;

    //const documentIdentity_value = $('#insertIpt-documentIdentity-collaborator').find(":selected").val();


    if (documentNumber_value === '') {
        setErrorFor(documentNumber_collaborator, 'No puede dejar numero de Identificación en blanco');
    } else {
        setSuccessFor(documentNumber_collaborator);
    }

    if (lastNameFather_value === '') {
        setErrorFor(lastNameFather_collaborator, 'No puede dejar el Apellido Paterno en blanco');
    } else {
        setSuccessFor(lastNameFather_collaborator);
    }

    if (lastNameMother_value === '') {
        setErrorFor(lastNameMother_collaborator, 'No puede dejar el Apellido Materna en blanco');
    } else {
        setSuccessFor(lastNameMother_collaborator);
    }

    if (name_value === '') {
        setErrorFor(name_collaborator, 'No puede dejar el Nombre en blanco');
    } else {
        setSuccessFor(name_collaborator);
    }

    if (!gender_value) {
        setErrorFor(gender_collaborator, 'Seleccióne Género');
    } else {
        setSuccessFor(gender_collaborator);
    }

    if (nationality_value === '') {
        setErrorFor(nationality_collaborator, 'Seleccióne Nacionalidad');
    } else {
        setSuccessFor(nationality_collaborator);
    }

    if (statusMarital_value === '') {
        setErrorFor(statusMarital_collaborator, 'Seleccióne Estado Civil');
    } else {
        setSuccessFor(statusMarital_collaborator);
    }

    if (birthdate_value === '') {
        setErrorFor(birthdate_collaborator, 'No puede dejar F. Nacimiento en blanco');
    } else {
        setSuccessFor(birthdate_collaborator);
    }

    if (profession_value === '') {
        setErrorFor(profession_collaborator, 'No puede dejar Profesión en blanco');
    } else {
        setSuccessFor(profession_collaborator);
    }

    if (conditionProperty_value === '') {
        setErrorFor(conditionProperty_collaborator, 'Seleccióne Condición del inmueble en que vive');
    } else {
        setSuccessFor(conditionProperty_collaborator);
    }

    if (position_value === '') {
        setErrorFor(position_collaborator, 'No puede dejar ocupación Y/O Cargo en blanco');
    } else {
        setSuccessFor(position_collaborator);
    }

    if (phone_value === '') {
        setErrorFor(phone_collaborator, 'No puede dejar n° Celular en blanco');
    } else {
        setSuccessFor(phone_collaborator);
    }

    if (email_value === '') {
        setErrorFor(email_collaborator, 'No puede dejar Correo Electronico en blanco');
    } else {
        setSuccessFor(email_collaborator);
    }

    // Conyugente o conviviente
    if (documentIdentity_spouseorpartner_value) {
        if (documentNumber_spouseorpartner_value === '') {
            setErrorFor(documentNumber_spouseorpartner, 'No puede dejar Numero de identificación en blanco');
        } else {
            setSuccessFor(documentNumber_spouseorpartner);
        }
    }
    // Dependientes
    if (kindofdependents_value) {
        if (kindofdependentsAmount_value === '') {
            setErrorFor(kindofdependentsAmount_collaborator, 'No puede dejar Cantidad en blanco');
        } else {
            setSuccessFor(kindofdependentsAmount_collaborator);
        }
    }

    // Registro Sunat
    if (contributorType_value) {
        if (contributorNumber_value === '') {
            setErrorFor(contributorNumber_collaborator, 'No puede dejar Numero de registro en blanco');
        } else {
            setSuccessFor(contributorNumber_collaborator);
        }
    }

}

function setErrorFor(input, message) {
    input.classList.remove('is-valid');
    input.classList.add('is-invalid');
    const formControl = input.parentElement;
    const div = formControl.querySelector('div');
    div.className = 'invalid-feedback';
    div.innerText = message;
}

function setSuccessFor(input) {
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
    const formControl = input.parentElement;
    const div = formControl.querySelector('div');
    div.className = 'valid-feedback';
    div.innerText = '';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

$('#insertIpt-nationality-collaborator').select2({
    theme: 'bootstrap-5'
});
$('#insertIpt-statusMarital-collaborator').select2({
    theme: 'bootstrap-5'
});
$('#insertIpt-documentIdentity-collaborator').select2({
    theme: 'bootstrap-5'
});
$('#insertIpt-conditionProperty-collaborator').select2({
    theme: 'bootstrap-5'
});
// Lugar de nacimiento
$('#insertSlt-countryBirth-collaborator').select2({
    theme: 'bootstrap-5',
    placeholder: $(this).data('placeholder'),
});
$('#insertSlt-departmentBirth-collaborator').select2({
    theme: 'bootstrap-5',
    placeholder: $(this).data('placeholder'),
});
$('#insertSlt-provinceBirth-collaborator').select2({
    theme: 'bootstrap-5',
    placeholder: $(this).data('placeholder'),
});
$('#insertSlt-districtBirth-collaborator').select2({
    theme: 'bootstrap-5',
    placeholder: $(this).data('placeholder'),
});

// Domicilio Actual
$('#insertSlt-provinceHome-collaborator').select2({
    theme: 'bootstrap-5',
    placeholder: $(this).data('placeholder'),
});
$('#insertSlt-districtHome-collaborator').select2({
    theme: 'bootstrap-5',
    placeholder: $(this).data('placeholder'),
});

$(document).on('click', '#aAdd-studiesApplied', function (e) {
    e.preventDefault();
    $('#mdAdd-studiesApplied').modal('show');
});

$(document).on('click', '#aAdd-experienceWork', function (e) {
    e.preventDefault();
    $('#mdAdd-experienceWork').modal('show');
});

$(document).on('click', '#aAdd-trainings', function (e) {
    e.preventDefault();
    $('#mdAdd-trainings').modal('show');
});

$(document).on('click', '#aAdd-propertyReal', function (e) {
    e.preventDefault();
    $('#mdAdd-propertyReal').modal('show');
});

$(document).on('click', '#aAdd-propertyMovable', function (e) {
    e.preventDefault();
    $('#mdAdd-propertyMovable').modal('show');
});

$(document).on('click', '#aAdd-stateFinancial', function (e) {
    e.preventDefault();
    $('#mdAdd-stateFinancial').modal('show');
});

var switchStatus = false;
$("#togBtn").on('change', function () {
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
        console.log(switchStatus);// To verify
    }
    else {
        switchStatus = $(this).is(':checked');
        console.log(switchStatus);// To verify
    }
});

getData_Birth();
function getData_Birth() {
    let wrapper = $('.countryBirth-wrapper');
    $.ajax({
        url: 'https://www.universal-tutorial.com/api/getaccesstoken',
        method: 'GET',
        headers: {
            "Accept": "application/json",
            "api-token": "JVje1_gYPsR2QjAnk-KKNUdBVbtGkypTK-GcMYJnD_3CCzdFaMCDnCLm_-9isfGUi_w",
            "user-email": "stipro150197@gmail.com"
        },
        beforeSend: function () {
            wrapper.waitMe();
        },
        success: function (data) {
            if (data.auth_token) {
                var auth_token = data.auth_token;

                $.ajax({
                    url: 'https://www.universal-tutorial.com/api/countries/',
                    method: 'GET',
                    headers: {
                        "Authorization": "Bearer " + auth_token,
                        "Accept": "application/json"
                    },

                    success: function (data) {
                        var countries = data;
                        var comboCountries = "<option value=''>Seleccionar</option>";
                        countries.forEach(element => {
                            comboCountries += '<option value="' + element['country_name'] + '">' + element['country_name'] + '</option>';
                        });
                        $("#insertSlt-countryBirth-collaborator").html(comboCountries);
                        $("#insertSlt-countryBirth-collaborator").trigger('change');
                        // State list
                        $("#insertSlt-countryBirth-collaborator").select2({
                            theme: 'bootstrap-5'
                        }).on("change", function () {
                            var country = $(this).find(":selected").val();
                            //var country = (country == 'Peru' ? false : $(this).find(":selected").val());
                            if (country == 'Peru') {
                                var wrapper = $('.departmentBirth-wrapper'),
                                    hook = 'bee_hook',
                                    action = 'get';
                                // AJAX
                                $.ajax({
                                    url: 'ajax/getDepartamentos_reniec',
                                    type: 'POST',
                                    dataType: 'json',
                                    cache: false,
                                    data: {
                                        hook,
                                        action,
                                    },
                                    beforeSend: function () {
                                        wrapper.waitMe();
                                    }
                                }).done(function (res) {
                                    if (res.status === 200) {
                                        toastr.success(res.msg, 'Bien!');
                                        var combodepartamentos = "<option value=''>Seleccionar</option>";
                                        departamentos = res.data.listDepartamento;
                                        departamentos.forEach(element => {
                                            combodepartamentos += '<option value="' + element['departamento'] + '" data-codigo="' + element['coDepartamento'] + '">' + element['departamento'] + '</option>';
                                        });
                                        $("#insertSlt-departmentBirth-collaborator").html(combodepartamentos);
                                        $("#insertSlt-departmentBirth-collaborator").trigger('change');

                                        $("#insertSlt-provinceBirth-collaborator").html('<option value="">Seleccionar</option>');
                                        $("#insertSlt-provinceBirth-collaborator").trigger('change');

                                        $("#insertSlt-departmentBirth-collaborator").select2({
                                            theme: 'bootstrap-5'
                                        }).on("change", function () {
                                            var departmentCode = $(this).find(":selected").data("codigo");
                                            var wrapper = $('.provinceBirth-wrapper'),
                                                department = departmentCode,
                                                hook = 'bee_hook',
                                                action = 'get';
                                            // AJAX
                                            $.ajax({
                                                url: 'ajax/getProvincias_reniec',
                                                type: 'POST',
                                                dataType: 'json',
                                                cache: false,
                                                data: {
                                                    department,
                                                    hook,
                                                    action,
                                                },
                                                beforeSend: function () {
                                                    wrapper.waitMe();
                                                }
                                            }).done(function (res) {
                                                if (res.status === 200) {
                                                    var comboprovincias = "<option value=''>Seleccionar</option>";
                                                    provincias = res.data.listProvincia;
                                                    provincias.forEach(element => {
                                                        comboprovincias += '<option value="' + element['provincia'] + '" data-codigo="' + element['coProvincia'] + '" data-codigodepartamento="' + element['coDepartamento'] + '">' + element['provincia'] + '</option>';
                                                    });
                                                    $("#insertSlt-provinceBirth-collaborator").html(comboprovincias);
                                                    $("#insertSlt-provinceBirth-collaborator").trigger('change');
                                                    $("#insertSlt-provinceBirth-collaborator").select2({
                                                        theme: 'bootstrap-5'
                                                    }).on("change", function () {
                                                        var departmentCode = $(this).find(":selected").data("codigodepartamento");
                                                        var provinceCode = $(this).find(":selected").data("codigo");
                                                        var wrapper = $('.districtBirth-wrapper'),
                                                            department = departmentCode,
                                                            province = provinceCode,
                                                            action = 'get',
                                                            hook = 'bee_hook';
                                                        // AJAX
                                                        $.ajax({
                                                            url: 'ajax/getDistrito_reniec',
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            cache: false,
                                                            data: {
                                                                department,
                                                                province,
                                                                hook,
                                                                action,
                                                            },
                                                            beforeSend: function () {
                                                                wrapper.waitMe();
                                                            }
                                                        }).done(function (res) {
                                                            if (res.status === 200) {
                                                                toastr.success(res.msg, 'Bien!');
                                                                var combodistritos = "<option value=''>Seleccionar</option>";
                                                                distritos = res.data.listDistrito;
                                                                distritos.forEach(element => {
                                                                    combodistritos += '<option value="' + element['distrito'] + '" data-codigodepartamento="' + element['coDepartamento'] + '" data-codigoprovincia="' + element['coProvincia'] + '" data-codigo="' + element['coDistrito'] + '">' + element['distrito'] + '</option>';
                                                                });
                                                                $("#insertSlt-districtBirth-collaborator").html(combodistritos);
                                                                $("#insertSlt-districtBirth-collaborator").trigger('change');

                                                            } else {
                                                                toastr.error(res.msg, '¡Upss!');
                                                            }
                                                        }).fail(function (err) {
                                                            toastr.error('Hubo un error en la petición', '¡Upss!');
                                                        }).always(function () {
                                                            wrapper.waitMe('hide');
                                                        });
                                                    });
                                                } else {
                                                    toastr.error(res.msg, '¡Upss!');
                                                }
                                            }).fail(function (err) {
                                                toastr.error('Hubo un error en la petición', '¡Upss!');
                                            }).always(function () {
                                                wrapper.waitMe('hide');
                                            });
                                        })
                                    } else {
                                        toastr.error(res.msg, '¡Upss!');
                                    }
                                }).fail(function (err) {
                                    toastr.error('Hubo un error en la petición', '¡Upss!');
                                }).always(function () {
                                    wrapper.waitMe('hide');
                                })
                            }
                            else {
                                //var country = this.value;
                                $.ajax({
                                    url: 'https://www.universal-tutorial.com/api/states/' + country,
                                    method: 'GET',
                                    headers: {
                                        "Authorization": "Bearer " + auth_token,
                                        "Accept": "application/json"
                                    },
                                    success: function (data) {
                                        var states = data;
                                        var comboStates = "<option value=''>Seleccionar</option>";
                                        states.forEach(element => {
                                            comboStates += '<option value="' + element['state_name'] + '">' + element['state_name'] + '</option>';
                                        });
                                        $("#insertSlt-departmentBirth-collaborator").html(comboStates);
                                        $("#insertSlt-departmentBirth-collaborator").trigger('change');

                                        $("#insertSlt-provinceBirth-collaborator").html('<option value="">Seleccionar</option>');
                                        $("#insertSlt-provinceBirth-collaborator").trigger('change');
                                        // City list
                                        $("#insertSlt-departmentBirth-collaborator").select2({
                                            theme: 'bootstrap-5'
                                        }).on("change", function () {
                                            var state = $(this).find(":selected").val();
                                            //var state = this.value;
                                            $.ajax({
                                                url: 'https://www.universal-tutorial.com/api/cities/' + state,
                                                method: 'GET',
                                                headers: {
                                                    "Authorization": "Bearer " + auth_token,
                                                    "Accept": "application/json"
                                                },
                                                success: function (data) {
                                                    var cities = data;
                                                    var comboCities = "<option value=''>Seleccionar</option>";
                                                    cities.forEach(element => {
                                                        comboCities += '<option value="' + element['city_name'] + '">' + element['city_name'] + '</option>';
                                                    });
                                                    $("#insertSlt-provinceBirth-collaborator").html(comboCities);
                                                    $("#insertSlt-provinceBirth-collaborator").trigger('change');
                                                    //if (thisClass.cityValue) { $("#item-details-cityValue").val(thisClass.cityValue).trigger("change"); }
                                                },
                                                error: function (e) {
                                                    console.log("Error al obtener countries: " + e);
                                                }
                                            });
                                        });
                                        // if (thisClass.stateValue) { $("#insertSlt-departmentBirth-collaborator").val(thisClass.stateValue).trigger("change"); }
                                    },
                                    error: function (e) {
                                        console.log("Error al obtener countries: " + e);
                                    }
                                });
                            }
                        });
                        // if (thisClass.countryValue) { $("#insertSlt-countryBirth-collaborator").val(thisClass.countryValue).trigger("change"); } */
                    },
                    error: function (e) {
                        console.log("Error al obtener countries: " + e);
                    },

                });
            }
        },
        error: function (rpt) {
            console.log("Error al obtener countries: " + rpt);
        },
        complete: function () {
            wrapper.waitMe('hide');
        },
    });
}


$("#insertSlt-departmentHome-collaborator").select2({
    theme: 'bootstrap-5',
    // AJAX
    ajax: {
        url: 'ajax/getDepartamentos_reniec',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: function (params) {
            var query = {
                search: params.term,
                hook: 'bee_hook',
                action: 'get'
            }
            return query;
        },
        /* beforeSend: function () {
            wrapper.waitMe();
        }, */
        processResults: function (res) {
            console.log(res);
            departamentos = res.data.listDepartamento;
            return {
                results: $.map(departamentos, function (obj) {
                    return { id: obj.coDepartamento, text: obj.departamento };
                })
            };
        }
    }
}).on('change', function () {
    console.log('Change Departamento');
    let departmentCode = $(this).find(":selected").data("codigo");
    let wrapper = $('.provinceHome-wrapper'),
        department = departmentCode,
        hook = 'bee_hook',
        action = 'get';
    // AJAX
    $.ajax({
        url: 'ajax/getProvincias_reniec',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            department,
            hook,
            action,
        },
        beforeSend: function () {
            wrapper.waitMe();
        }
    }).done(function (res) {
        if (res.status === 200) {
            var comboprovincias = "<option value=''>Seleccionar</option>";
            provincias = res.data.listProvincia;
            provincias.forEach(element => {
                comboprovincias += '<option value="' + element['provincia'] + '" data-codigo="' + element['coProvincia'] + '" data-codigodepartamento="' + element['coDepartamento'] + '">' + element['provincia'] + '</option>';
            });
            $("#insertSlt-provinceHome-collaborator").html(comboprovincias);
            $("#insertSlt-provinceHome-collaborator").trigger('change');

            $("#insertSlt-districtHome-collaborator").html('<option value="">Seleccionar</option>');
            $("#insertSlt-districtHome-collaborator").trigger('change');

            $("#insertSlt-provinceHome-collaborator").select2({
                theme: 'bootstrap-5'
            }).on("change", function () {
                var departmentCode = $(this).find(":selected").data("codigodepartamento");
                var provinceCode = $(this).find(":selected").data("codigo");
                var wrapper = $('.districtBirth-wrapper'),
                    department = departmentCode,
                    province = provinceCode,
                    action = 'get',
                    hook = 'bee_hook';
                // AJAX
                $.ajax({
                    url: 'ajax/getDistrito_reniec',
                    type: 'POST',
                    dataType: 'json',
                    cache: false,
                    data: {
                        department,
                        province,
                        hook,
                        action,
                    },
                    beforeSend: function () {
                        wrapper.waitMe();
                    }
                }).done(function (res) {
                    if (res.status === 200) {
                        toastr.success(res.msg, 'Bien!');
                        var combodistritos = "<option value=''>Seleccionar</option>";
                        distritos = res.data.listDistrito;
                        distritos.forEach(element => {
                            combodistritos += '<option value="' + element['distrito'] + '" data-codigodepartamento="' + element['coDepartamento'] + '" data-codigoprovincia="' + element['coProvincia'] + '" data-codigo="' + element['coDistrito'] + '">' + element['distrito'] + '</option>';
                        });
                        $("#insertSlt-districtBirth-collaborator").html(combodistritos);
                        $("#insertSlt-districtBirth-collaborator").trigger('change');

                    } else {
                        toastr.error(res.msg, '¡Upss!');
                    }
                }).fail(function (err) {
                    toastr.error('Hubo un error en la petición', '¡Upss!');
                }).always(function () {
                    wrapper.waitMe('hide');
                });
            });

        } else {
            toastr.error(res.msg, '¡Upss!');
        }
    }).fail(function (err) {
        toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
        wrapper.waitMe('hide');
    });
});

getData_Home();
function getData_Home() {
    let wrapper = $('.departmentHome-wrapper'),
        hook = 'bee_hook',
        action = 'get';

}

// Agregar una Estudio realizado
$("#add_studiesApplied_form").on("submit", add_studiesApplied_form);
function add_studiesApplied_form(e) {
    e.preventDefault();
    let amountErrors = 0;
    let centerEducational_value = centerEducational_studiesApplied.value.trim();
    let levelEducational_value = levelEducational_studiesApplied.value.trim();

    let certificateEducational_value = certificateEducational_studiesApplied.value;
    let certificateEducational_name;
    let certificateEducational_data;
    let sinceMonth_value = sinceMonth_studiesApplied.selectedOptions[0].dataset.format;
    let sinceYear_value = sinceYear_studiesApplied.value;
    let untilMonth_value = untilMonth_studiesApplied.selectedOptions[0].dataset.format;
    let untilYear_value = untilYear_studiesApplied.value;

    // Validando Formulario
    if (centerEducational_value === '') {
        setErrorFor(centerEducational_studiesApplied, 'No puede dejar Centro educativo en blanco');
        amountErrors++;
    } else {
        setSuccessFor(centerEducational_studiesApplied);
    }

    if (levelEducational_value === '') {
        setErrorFor(levelEducational_studiesApplied, 'Seleccióne Nivel de estudios');
        amountErrors++;
    } else {
        setSuccessFor(levelEducational_studiesApplied);
    }

    if (!$('#currentlyStudying-studiesApplied').is(':checked')) {
        currentlyStudying_value = 0;
        if (certificateEducational_value === '') {
            setErrorFor(certificateEducational_studiesApplied, 'Adjunte Certificado');
            amountErrors++;
        } else {
            setSuccessFor(certificateEducational_studiesApplied);
            certificateEducational_name = certificateEducational_studiesApplied.files[0].name;
            // Obtener extensión del archivo
            extensionCertificate = certificateEducational_name.substring(certificateEducational_name.lastIndexOf('.'), certificateEducational_name.length);
            certificateEducational_data = $('#certificate-studiesApplied').prop('files')[0];
        }
    }
    else {
        currentlyStudying_value = 1;
    }
    // Validando Formulario
    if (amountErrors > 0) {
        toastr.error('Solucióme los errores', '¡Upss!');
        return;
    }
    else {
        var form = $(this),
            data = new FormData(form.get(0));
        data.append("centerEducational", centerEducational_value);
        data.append("levelEducational", levelEducational_value);
        data.append("currentlyStudying", currentlyStudying_value);
        data.append("certificateEducational_name", JSON.stringify(certificateEducational_name));
        data.append("certificateEducational_type", JSON.stringify(extensionCertificate));
        data.append("certificateEducational_data", certificateEducational_data);
        data.append("sinceMonth", sinceMonth_value);
        data.append('sinceYear', sinceYear_value);
        data.append("untilMonth", untilMonth_value);
        data.append("untilYear", untilYear_value);
        // AJAX
        $.ajax({
            url: 'ajax/add_studiesApplied_form',
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            data: data,
            beforeSend: function () {
                form.waitMe();
            }
        }).done(function (res) {
            if (res.status === 201) {
                toastr.success(res.msg, '¡Bien!');
                get_studiesApplied();
            } else {
                toastr.error(res.msg, '¡Upss!');
            }
        }).fail(function (err) {
            toastr.error('Hubo un error en la petición', '¡Upss!');
        }).always(function () {
            form.waitMe('hide');
        })
    }
}

get_studiesApplied();
function get_studiesApplied(e) {
    var wrapper = $('.wrapper_studiesApplied'),
        hook = 'bee_hook',
        action = 'get';

    if (wrapper.length === 0) {
        console.log('Holami rey');
        return;
    }

    $.ajax({
        url: 'ajax/get_studiesApplied',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            hook, action
        },
        beforeSend: function () {
            wrapper.waitMe();
        }
    }).done(function (res) {
        if (res.status === 200) {
            wrapper.html(res.data);

        } else {
            toastr.error(res.msg, '¡Upss!');
            wrapper.html(res.msg);
        }
    }).fail(function (err) {
        toastr.error('Hubo un error en la petición', '¡Upss!');
        wrapper.html('Hubo un error al cargar las lecciones, intenta más tarde.');
    }).always(function () {
        wrapper.waitMe('hide');
    })
};