"use strict";

var $ = function (id) {
    return document.getElementById(id);
}

window.addEventListener('load', init);

function init() {
    setTimeout(loadData, 1000);


}



function loadData() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("total").innerHTML = xmlhttp.responseText;
        }
    };

    xmlhttp.open("GET", "../B2B/guest/loadProducts.php", true);
    xmlhttp.send();
}