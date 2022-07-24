const ipt_colaborador_dni_api = document.getElementById('insert-ipt-colaboradorDni');
const form = document.getElementById('form-collaborator');
const lastNameFather_collaborator = document.getElementById('insertIpt-lastNameFather-collaborator');
const lastNameMother_collaborator = document.getElementById('insertIpt-lastNameMother-collaborator');
const name_collaborator = document.getElementById('insertIpt-name-collaborator');
const nationality_collaborator = document.getElementById('insertSlt-nationality-collaborator');
const statusMarital_collaborator = document.getElementById('insertSlt-statusMarital-collaborator');
const birthdate_collaborator = document.getElementById('insertIpt-birthdate-collaborator');
//const documentIdentity_collaborator = document.getElementById('insertSlt-documentIdentity-collaborator');
const documentNumber_collaborator = document.getElementById('insertIpt-documentNumber-collaborator');

const cont_timeLine = document.getElementById('cont-timeLine');
const template_studiesApplied = document.getElementById('template-studiesApplied').content
const fragment = document.createDocumentFragment()


form.addEventListener('submit', e => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const lastNameFather_value = lastNameFather_collaborator.value.trim();
    const lastNameMother_value = lastNameMother_collaborator.value.trim();
    const name_value = name_collaborator.value.trim();
    const nationality_value = $('#insertSlt-nationality-collaborator').find(":selected").val();
    const statusMarital_value = $('#insertSlt-statusMarital-collaborator').find(":selected").val();
    const birthdate_value = birthdate_collaborator.value.trim();
    //const documentIdentity_value = $('#insertIpt-documentIdentity-collaborator').find(":selected").val();
    const documentNumber_value = documentNumber_collaborator.value.trim();

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

    if (nationality_value === '') {
        setErrorFor(nationality_collaborator, 'No puede dejar Nacionalidad sin selecciónar');
    } else {
        setSuccessFor(nationality_collaborator);
    }

    if (statusMarital_value === '') {
        setErrorFor(statusMarital_collaborator, 'No puede dejar Estado Civil sin selecciónar');
    } else {
        setSuccessFor(statusMarital_collaborator);
    }

    if (birthdate_value === '') {
        setErrorFor(birthdate_collaborator, 'No puede dejar F. Nacimiento en blanco');
    } else {
        setSuccessFor(birthdate_collaborator);
    }

    /* if (documentIdentity_value === '') {
        setErrorFor(documentIdentity_collaborator, 'No puede dejar documento de Identificacion sin selecciónar');
    } else {
        setSuccessFor(documentIdentity_collaborator);
    } */

    if (documentNumber_value === '') {
        setErrorFor(documentNumber_collaborator, 'No puede dejar numero de Identificación en blanco');
    } else {
        setSuccessFor(documentNumber_collaborator);
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

var settings = {
    "url": "http://ms.digemid.minsa.gob.pe:8480/msopmcovid/parametro/departamentos",
    "Accept": "application/json",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "filtro": {
            "codigo": null,
            "codigoDos": null
        }
    }),
};

$(document).on('click', '#aAdd-experienceWork', function (e) {
    e.preventDefault();
    $('#mdAdd-experienceWork').modal('show');
});

$(document).on('click', '#aAdd-studiesApplied', function (e) {
    e.preventDefault();
    $('#mdAdd-studiesApplied').modal('show');
});

$(document).on('click', '#aAdd-trainings', function (e) {
    e.preventDefault();
    $('#mdAdd-trainings').modal('show');
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

$(document).on('click', '#mbtnCreate-experienceWork-insert', function (e) {
    const centerEducational_studiesApplied = document.getElementById('centerEducational-studiesApplied');
    const levelEducational_studiesApplied = document.getElementById('levelEducational-studiesApplied');
    const currentlyStudying = document.getElementById('currentlyStudying-studiesApplied');
    //const levelEducational_studiesApplied = document.getElementById('levelEducational-studiesApplied');
    const sinceMonth_studiesApplied = document.getElementById('sinceMonth-studiesApplied');
    const sinceYear_studiesApplied = document.getElementById('sinceYear-studiesApplied');
    const untilMonth_studiesApplied = document.getElementById('untilMonth-studiesApplied');
    const untilYear_studiesApplied = document.getElementById('untilYear-studiesApplied');

    let centerEducational_value = centerEducational_studiesApplied.value.trim();
    let lastNameFather_value = levelEducational_studiesApplied.value.trim();

    if (centerEducational_value === '') {
    } else {
        console.log(template_studiesApplied);
        template_studiesApplied.querySelector('.info h5').textContent = centerEducational_value;
        template_studiesApplied.querySelector('.info centerEducational').textContent = centerEducational_value;
        const clone = template_studiesApplied.cloneNode(true);
        fragment.appendChild(clone);
        cont_timeLine.appendChild(fragment);
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

// Agregar una Producto
$('#add_studiesApplied_form').on('submit', add_studiesApplied_form);
function add_studiesApplied_form(e) {
    e.preventDefault();
    var file_data = $('.file').prop('files')[0];
    let val_brandId = $('#insertIpt-brands-product').find(':selected').data('id');
    let val_categoryId = $('#insertIpt-categories-product').find(':selected').data('id');
    var form = $(this),
        data = new FormData(form.get(0));
    data.append("brand_id", JSON.stringify(val_brandId));
    data.append("category_id", JSON.stringify(val_categoryId));

    // Validar selección
    if (!val_brandId) {
        toastr.error('Seleccióne Marca', '¡Upss!');
        return;
    }

    // Validar selección
    if (!val_categoryId) {
        toastr.error('Seleccióne Categoria', '¡Upss!');
        return;
    }

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
            /* form.trigger('reset'); */
            /* get_category(); */
        } else {
            toastr.error(res.msg, '¡Upss!');
        }
    }).fail(function (err) {
        toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
        form.waitMe('hide');
    })
}


/* .done(function (res) {
    if (res.status === 200) {
        toastr.success(res.msg, 'Bien!');
         var combodepartamentos = "<option value=''>Seleccionar</option>";
        departamentos = res.data.listDepartamento;
        departamentos.forEach(element => {
            combodepartamentos += '<option value="' + element['departamento'] + '" data-codigo="' + element['coDepartamento'] + '">' + element['departamento'] + '</option>';
        });
    } else {
        toastr.error(res.msg, '¡Upss!');
    }
}).fail(function (err) {
    toastr.error('Hubo un error en la petición', '¡Upss!');
}).always(function () {
    wrapper.waitMe('hide');
}) */