"use strict";
var $ = function (id) {
    return document.getElementById(id);
}
setInterval(function (){
    $('pw-check-php').innerHTML='';
},3500);