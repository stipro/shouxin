$('body').on('click', '.btn-logout-form', btn_logout_form);
function btn_logout_form(e) {
    window.open("https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost/shouxin/login", "Diseño Web", "width=300, height=200")
    document.location.href = "./logout";
}