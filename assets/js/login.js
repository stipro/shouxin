/* import { GoogleAuthProvider } from "firebase/auth"; */
var config = {
    apiKey: "AIzaSyBav5zU96k_v5xz4o-eiqgeHTUePP3r5Q8",
    authDomain: "shouxin-loginsocialmedia.firebaseapp.com",
    projectId: "shouxin-loginsocialmedia",
    storageBucket: "shouxin-loginsocialmedia.appspot.com",
    messagingSenderId: "842434840113",
    appId: "1:842434840113:web:a4ddec2f14771551947710",
    measurementId: "G-ZG6KZDB496"
};
firebase.initializeApp(config);
firebase.analytics();

var auth = firebase.auth();

$('body').on('click', '#btnloging', loginFireBase_gmail);
function loginFireBase_gmail(e) {
    e.preventDefault()
    var provider = new firebase.auth.GoogleAuthProvider();
    auth.signInWithPopup(provider).then(function (result) {
        var user = result.user;

        /*         console.log(result.user.providerData[0].displayName);
                console.log(result.user.providerData[0].email);
                console.log(result.user.providerData[0].photoURL); */
        let emailGmail = result.user.providerData[0].email;
        var button = $(this),
            email = emailGmail,
            action = 'get',
            hook = 'bee_hook';

        $.ajax({
            url: 'ajax/get_colaboradorValido',
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
                setTimeout(() => {
                    window.location.href = "./home/flash";
                }, 2000)
                
                /* setTimeout(() => {
                    window.open('http://localhost/shouxin/home/flash', '_self');
                }, 2000) */
            } else {
                toastr.error(res.msg, '¡Upss!');
            }
        }).fail(function (err) {
            toastr.error('Hubo un error en la petición', '¡Upss!');
        }).always(function () {

        })
    }).catch(function (error) {
        console.log(error);
    });
}
$('body').on('click', '#btnloginh', loginFireBase_hotmail);
function loginFireBase_hotmail(e) {
    e.preventDefault()
    var provider = new firebase.auth.OAuthProvider('microsoft.com');
    auth.signInWithPopup(provider).then(function (result) {
        /* console.log(result.additionalUserInfo.profile.displayName);
        console.log(result.additionalUserInfo.profile.userPrincipalName);
        console.log(result.additionalUserInfo.profile.photoURL); */
        let emailGmail = result.additionalUserInfo.profile.userPrincipalName;
        var button = $(this),
            email = emailGmail,
            action = 'get',
            hook = 'bee_hook';

        $.ajax({
            url: 'ajax/get_colaboradorValido',
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
                setTimeout(() => {
                    window.location.href = "./home/flash";
                }, 2000)
            } else {
                toastr.error(res.msg, '¡Upss!');
            }
        }).fail(function (err) {
            toastr.error('Hubo un error en la petición', '¡Upss!');
        }).always(function () {

        })
    }).catch(function (error) {
        console.log(error);
    });
}
function init() {

}