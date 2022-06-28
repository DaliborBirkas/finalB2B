"use strict";

var IDLE_TIMEOUT = 10*60 ;  // 10 minutes of inactivity
var _idleSecondsCounter = 0;
document.onclick = function() {
    _idleSecondsCounter = 0;
};
document.onmousemove = function() {
    _idleSecondsCounter = 0;
};
document.onkeypress = function() {
    _idleSecondsCounter = 0;
};
window.setInterval(CheckIdleTime, 1000);
function CheckIdleTime() {
    _idleSecondsCounter++;

    if (_idleSecondsCounter >= IDLE_TIMEOUT) {
        document.location.href = "logout.php";
    }
}