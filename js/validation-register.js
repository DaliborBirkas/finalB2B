window.addEventListener('load', function(){
    document.getElementById('forms').addEventListener('submit', function (e){
        e.preventDefault();
        if(validateForm()) this.submit();
    });
});

var $ = function(id){
    return document.getElementById(id);
}

var validateForm = function(){

    $('error-name').innerHTML = "";
    $('error-lastname').innerHTML = "";
    $('error-companyName').innerHTML = "";
    $('error-email').innerHTML = "";
    $('error-telephoneNumber').innerHTML = "";
    $('error-address').innerHTML = "";
    $('error-city').innerHTML = "";
    $('error-companyPib').innerHTML = "";
    $('error-password').innerHTML = "";
    $('error-repeatedPassword').innerHTML = "";

    var isValid = false;

    var name = document.getElementById('name');
    var lastname = document.getElementById('lastname');
    var companyName = document.getElementById('companyName');
    var email = document.getElementById('email');
    var telephoneNumber = document.getElementById('telephoneNumber');
    var address = document.getElementById('companyAddress');
    var city = document.getElementById('companyCity');
    var companyPib = document.getElementById('companyPib');
    var password = document.getElementById('password');
    var repeatedPassword = document.getElementById('repeaterPassword');

    if(name.value.trim().length === 0){
        isValid = false;
        name.style.border = "1px solid red";
        $('error-name').innerHTML = "Polje je obavezno!";

        name.addEventListener('click', function fn(){
            if(name.value.length > 0){
                isValid = true;
                name.style.border = "1px solid black";
                $('error-name').innerHTML = "";
            }
        })
    }

    if(lastname.value.trim().length === 0){
        isValid = false;
        lastname.style.border = "1px solid red";
        $('error-lastname').innerHTML = "Polje je obavezno!";

        lastname.addEventListener('click', function fn(){
            if(lastname.value.length > 0){
                isValid = true;
                lastname.style.border = "1px solid black";
                $('error-lastname').innerHTML = "";
            }
        })
    }

    if(companyName.value.trim().length === 0){
        isValid = false;
        companyName.style.border = "1px solid red";
        $('error-companyName').innerHTML = "Polje je obavezno!";

        companyName.addEventListener('click', function fn(){
            if(companyName.value.length > 0){
                isValid = true;
                companyName.style.border = "1px solid black";
                $('error-companyName').innerHTML = "";
            }
        })
    }

    if(email.value.trim().length === 0){
        isValid = false;
        email.style.border = "1px solid red";
        $('error-email').innerHTML = "Polje je obavezno!";

        email.addEventListener('click', function fn(){
            if(email.value.length > 0){
                isValid = true;
                email.style.border = "1px solid black";
                $('error-email').innerHTML = "";
            }
        })
    }

    if(telephoneNumber.value.trim().length === 0){
        isValid = false;
        telephoneNumber.style.border = "1px solid red";
        $('error-telephoneNumber').innerHTML = "Polje je obavezno!";

        telephoneNumber.addEventListener('click', function fn(){
            if(telephoneNumber.value.length > 0){
                isValid = true;
                telephoneNumber.style.border = "1px solid black";
                $('error-telephoneNumber').innerHTML = "";
            }
        })
    }

    if(address.value.trim().length === 0){
        isValid = false;
        address.style.border = "1px solid red";
        $('error-address').innerHTML = "Polje je obavezno!";

        address.addEventListener('click', function fn(){
            if(address.value.length > 0){
                isValid = true;
                address.style.border = "1px solid black";
                $('error-address').innerHTML = "";
            }
        })
    }

    if(city.value.trim().length === 0){
        isValid = false;
        city.style.border = "1px solid red";
        $('error-city').innerHTML = "Polje je obavezno!";

        city.addEventListener('click', function fn(){
            if(city.value.length > 0){
                isValid = true;
                city.style.border = "1px solid black";
                $('error-city').innerHTML = "";
            }
        })
    }

    if(password.value.trim().length === 0){
        isValid = false;
        password.style.border = "1px solid red";
        $('error-password').innerHTML = "Polje je obavezno!";

        password.addEventListener('click', function fn(){
            if(password.value.length > 0){
                isValid = true;
                password.style.border = "1px solid black";
                $('error-password').innerHTML = "";
            }
        })
    }

    if(repeatedPassword.value.trim().length === 0){
        isValid = false;
        repeatedPassword.style.border = "1px solid red";
        $('error-repeatedPassword').innerHTML = "Polje je obavezno!";

        repeatedPassword.addEventListener('click', function fn(){
            if(repeatedPassword.value.length > 0){
                isValid = true;
                repeatedPassword.style.border = "1px solid black";
                $('error-repeatedPassword').innerHTML = "";
            }
        })
    }

    if(repeatedPassword.value.trim().length === password.value.trim().length){
        isValid = true;
        $('error-repeatedPassword').innerHTML = "Šifre se ne podudaraju!";
        repeatedPassword.style.border = "1px solid red";
    }
    else{
        isValid = false;
    }

    //validacija piba treba da se odradi jos ovde


    return isValid;
}