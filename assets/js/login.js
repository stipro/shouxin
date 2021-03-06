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
        console.log(result.additionalUserInfo.profile);
        let provider_id = result.additionalUserInfo.providerId;
        let email_gmail = result.additionalUserInfo.profile.email;
        let family_name = result.additionalUserInfo.profile.family_name;
        let given_name = result.additionalUserInfo.profile.given_name;
        let picture_user = result.additionalUserInfo.profile.picture;
        var button = $(this),
            provider = provider_id,
            email = email_gmail,
            family = family_name,
            given = given_name,
            picture = picture_user,
            logout = 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/shouxin/login';
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
                provider,
                email,
                family,
                given,
                picture,
                logout
            },
            beforeSend: function () {
                toastr.warning('validando colaborador');
            }
        }).done(function (res) {
            if (res.status === 200) {
                toastr.success(res.msg, 'Bien!');
                setTimeout(() => {
                    window.location.href = "./home/flash";
                }, 2000)
                /* setTimeout(() => {
                    window.open('http://localhost/shouxin/home/flash', '_self');
                }, 2000) */
            }
            else if (res.status === 401) {
                toastr.error(res.msg, '??Upss!');
                window.open(res.data, "Dise??o Web", "width=300, height=200");
            }
            else {
                toastr.error(res.msg, '??Upss!');
            }
        }).fail(function (err) {
            toastr.error('Hubo un error en la petici??n', '??Upss!');
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
        console.log(result);

        let provider_id = result.additionalUserInfo.providerId;
        let email_gmail = result.additionalUserInfo.profile.email;
        let family_name = result.additionalUserInfo.profile.family_name;
        let given_name = result.additionalUserInfo.profile.given_name;
        let picture_user = result.additionalUserInfo.profile.picture;

        let emailHotmail = result.additionalUserInfo.profile.userPrincipalName;
        var button = $(this),
            provider = provider_id,
            email = emailHotmail,
            family = family_name,
            given = given_name,
            picture = picture_user,
            logout = 'https://login.microsoftonline.com/3b5a69e5-d9fb-443e-b5e7-926401d3a4e0/oauth2/logout?post_logout_redirect_uri=http://localhost/shouxin/login/';
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
                provider,
                email,
                family,
                given,
                picture,
                logout
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
            } else if (res.status === 401) {
                toastr.error(res.msg, '??Upss!');
                window.open(res.data, "Dise??o Web", "width=300, height=200");
            }
            else {
                toastr.error(res.msg, '??Upss!');
            }
        }).fail(function (err) {
            toastr.error('Hubo un error en la petici??n', '??Upss!');
        }).always(function () {

        })
    }).catch(function (error) {
        console.log(error);
    });
}
function init() {

}