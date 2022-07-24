$('body').on('click', '.btn-logout-form', btn_logout_form);
function btn_logout_form(e) {
    window.open("https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/shouxin/login", "Diseño Web", "width=300, height=200")
    document.location.href = "./logout";
}

//$('body').on('click', '#btn-acceptYes', btn_acceptYes_form);
function btn_acceptYes_form(e) {
    var button = $(this),
        email = emailGmail,
        action = 'get',
        hook = 'bee_hook';
    $.ajax({
        url: 'ajax/set_acceptTerms',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
            hook,
            action,
            email
        },
        beforeSend: function () {
            toastr.warning('validando colaborador');
        }
    }).done(function (res) {
        if (res.status === 200) {
            console.log(res);
            toastr.success(res.msg, 'Bien!');
            /* setTimeout(() => {
                window.location.href = "./home/flash";
            }, 2000) */
        } else {
            toastr.error(res.msg, '¡Upss!');
        }
    }).fail(function (err) {
        toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {

    })
}