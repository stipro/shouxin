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

$.ajax({
    url: 'https://www.universal-tutorial.com/api/getaccesstoken',
    method: 'GET',
    headers: {
        "Accept": "application/json",
        "api-token": "JVje1_gYPsR2QjAnk-KKNUdBVbtGkypTK-GcMYJnD_3CCzdFaMCDnCLm_-9isfGUi_w",
        "user-email": "stipro150197@gmail.com"
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
                            console.log('Selecciono Peru');
                            var button = $(this),
                                action = 'get',
                                hook = 'bee_hook';
                            // AJAX
                            $.ajax({
                                url: 'ajax/getDepartamentos',
                                type: 'POST',
                                dataType: 'json',
                                cache: false,
                                data: {
                                    hook,
                                    action,
                                },
                                beforeSend: function () {
                                    toastr.warning('Obteniendo departamentos');
                                }
                            }).done(function (res) {
                                if (res.status === 200) {
                                    console.log(res);
                                    toastr.success(res.msg, 'Bien!');
                                    var combodepartamentos = "<option value=''>Seleccionar</option>";
                                    departamentos = res.data.data;
                                    departamentos.forEach(element => {
                                        combodepartamentos += '<option value="' + element['descripcion'] + '" data-codigo="' + element['codigo'] + '">' + element['descripcion'] + '</option>';
                                    });
                                    $("#insertSlt-departmentBirth-collaborator").html(combodepartamentos);
                                    $("#insertSlt-departmentBirth-collaborator").trigger('change');

                                    $("#insertSlt-provinceBirth-collaborator").html('<option value="">Seleccionar</option>');
                                    $("#insertSlt-provinceBirth-collaborator").trigger('change');

                                    $("#insertSlt-departmentBirth-collaborator").select2({
                                        theme: 'bootstrap-5'
                                    }).on("change", function () {
                                        var stateCode = $(this).find(":selected").data("codigo");
                                        var button = $(this),
                                            state = stateCode,
                                            action = 'get',
                                            hook = 'bee_hook';
                                        // AJAX
                                        $.ajax({
                                            url: 'ajax/getProvincias',
                                            type: 'POST',
                                            dataType: 'json',
                                            cache: false,
                                            data: {
                                                state,
                                                hook,
                                                action,
                                            },
                                            beforeSend: function () {
                                                toastr.warning('Obteniendo departamentos');
                                            }
                                        }).done(function (res) {
                                            if (res.status === 200) {
                                                console.log(res);
                                                toastr.success(res.msg, 'Bien!');
                                                var comboprovincias = "<option value=''>Seleccionar</option>";
                                                provincias = res.data.data;
                                                provincias.forEach(element => {
                                                    comboprovincias += '<option value="' + element['descripcion'] + '" data-codigo="' + element['codigo'] + '">' + element['descripcion'] + '</option>';
                                                });
                                                $("#insertSlt-provinceBirth-collaborator").html(comboprovincias);
                                                $("#insertSlt-provinceBirth-collaborator").trigger('change');
                                            } else {
                                                toastr.error(res.msg, '¡Upss!');
                                            }
                                        }).fail(function (err) {
                                            toastr.error('Hubo un error en la petición', '¡Upss!');
                                        }).always(function () {

                                        })
                                    })
                                } else {
                                    toastr.error(res.msg, '¡Upss!');
                                }
                            }).fail(function (err) {
                                toastr.error('Hubo un error en la petición', '¡Upss!');
                            }).always(function () {

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
                }
            });
        }
    },
    error: function (e) {
        console.log("Error al obtener countries: " + e);
    }
});