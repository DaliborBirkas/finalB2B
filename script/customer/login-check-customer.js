"use strict";

var $ = function (id) {
    return document.getElementById(id);
}


window.addEventListener('load', function() {
    document.getElementById('login-form').addEventListener('submit', function(e) {
        //Ukoliko polja nisu popunjena ne ucitavaj
        if(checkForm()==false){
            e.preventDefault();
        }
        if (checkForm()==true) {
            this.submit();
        }
    });
});



var $ = function(id) {
    return document.getElementById(id);
}

var checkForm = function() {
    $('password-error').innerHTML = '';
    $('username-error').innerHTML = '';
    var isValid = true;

    if ($('password').value == '') {
        $('password-error').innerHTML = 'Unesite Vašu lozinku';
        $('pw-check-php').innerHTML='';
        isValid = false;
    }


    var rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!rex.test($('username').value)) {
        $('username-error').innerHTML = 'Unesite Vaše e-mail adresu';
        isValid = false;
    }

    return isValid;
}