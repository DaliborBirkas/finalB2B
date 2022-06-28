const targetDiv = document.getElementById("details-form");
const btn = document.getElementById("order-button");
btn.onclick = function () {
    if (targetDiv.style.display !== "none") {
        targetDiv.style.display = "none";
    } else {
        targetDiv.style.display = "block";
    }
};