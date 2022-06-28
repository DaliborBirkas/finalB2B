window.addEventListener('load', function(){
    document.getElementById('forms').addEventListener('submit', function (e){
        e.preventDefault();
        if(validateForm()) this.submit();
    })
})

var $ = function (id){
    return document.getElementById(id);
}

var validateForm = function (){
    $('error-username').innerHTML = "";
    $('error-password').innerHTML = "";

    var isValid = false;

    var username = document.getElementById('username');
    var password = document.getElementById('password');

    if(username.value.trim().length === 0){
        isValid = false;
        username.style.border = "1px solid red";
        $('error-username').innerHTML = "Popunite polje za korisničko ime!";

        username.addEventListener('click', function fn(){
            if(username.value.length > 0){
                isValid = true;
                username.style.border = "1px solid black";
                $('error-username').innerHTML = "";
            }
        })
    }

    if(password.value.trim().length === 0){
        isValid = false;
        password.style.border = "1px solid red";
        $('error-password').innerHTML = "Popunite polje za šifru!";

        password.addEventListener('click', function fn(){
            if(password.value.length > 0){
                isValid = true;
                password.style.border = "1px solid black";
                $('error-password').innerHTML = "";
            }
        })
    }

    // validacija za pib fali


    return isValid;
}
