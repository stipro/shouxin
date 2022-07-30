$(document).ready(function () {
    $(document).on('click', '#btnAdd-collaborator', function (e) {
        e.preventDefault();
        $('#mdAdd-stateFinancial').modal('show');
    });

    get_collaborators();
    function get_collaborators() {
        var wrapper = $('.wrapper_collaborators'),
            hook = 'bee_hook',
            action = 'get';
        if (wrapper.length === 0) {
            return;
        }

        $.ajax({
            url: 'ajax/get_collaborators',
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
                //select2All();
            } else {
                toastr.error(res.msg, '¡Upss!');
                wrapper.html(res.msg);
            }
        }).fail(function (err) {
            toastr.error('Hubo un error en la petición', '¡Upss!');
            wrapper.html('Hubo un error al cargar los proveedores, intenta más tarde.');
        }).always(function () {
            wrapper.waitMe('hide');
        })
    }

});