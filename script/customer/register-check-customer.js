"use strict";

var $ = function (id) {
    return document.getElementById(id);
}

window.addEventListener('load', function() {
    var el=document.getElementById('register-form')
    if(el){
        el.addEventListener('submit', function(e) {
            //Ukoliko polja nisu popunjena ne ucitavaj
            if(checkForm()===false){
                e.preventDefault();
            }
            if (checkForm()===true) {
                this.submit();
            }
        });
    }
    else{
        console.log('nesto');
    }
});
var checkForm = function() {
    $('name-error').innerHTML = '';
    $('lastname-error').innerHTML = '';
    //  $('company-error').innerHTML = '';
    $('email-error').innerHTML = '';
    $('number-error').innerHTML = '';
    var isValid = true;
    var letters = /^[A-Za-z]+$/;
    console.log($('name').value.innerHTML);
    if ($('name').value === '' || !$('name').value.match(letters) ) {
        $('name-error').innerHTML = 'Unesite vase ime';
        isValid = false;
    }

    if ($('lastname').value === '' || !$('lastname').value.match(letters)) {
        $('lastname-error').innerHTML = 'Unesite vase prezime';
        isValid = false;
    }


    var rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!rex.test($('email').value)) {
        $('email-error').innerHTML = 'Unesite Vaše e-mail adresu';
        isValid = false;
    }
    var numbers = /^[0-9]+$/;
    if ($('telephoneNumber').value === '' || !$('telephoneNumber').value.match(numbers)) {
        $('number-error').innerHTML = 'Unesite broj telefona';
        isValid = false;
    }
    if ($('password').value === '' ) {
        $('password-error').innerHTML = 'Unesite lozinku';
        isValid = false;
    }
    if ($('repeaterPassword').value === '' ) {
        $('password-error2').innerHTML = 'Unesite lozinku i ovde';
        isValid = false;
    }
    if ($('repeaterPassword').value !==  $('password').value) {
        $('password-error3').innerHTML = 'Lozinke moraju biti iste';
        $('password-error4').innerHTML = 'Lozinke moraju biti iste';
        isValid = false;
    }



    return isValid;
}



