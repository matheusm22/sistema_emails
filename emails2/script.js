
function carregar() {
    var res = document.getElementById('res');
    res.innerHTML = 'Carregando...';
}

"use strict";
const input = document.getElementById('senha');
const icon = document.getElementById("mostrar");
icon.addEventListener('click', togglePass);

function togglePass() {
    if (input.type == "password") {
        input.type = "text";
        icon.src = "eye-off.svg";
    } else {
        input.type = "password";
        icon.src = "eye.svg";
    }
}
