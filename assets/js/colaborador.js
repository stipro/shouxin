const ipt_colaborador_dni_api = document.getElementById('insert-ipt-colaboradorDni');
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
var wrapper = $('.countryBirth-wrapper');
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