"use strict";



// não adiciona o espaço no campo usuário

$(function () {
  $("#txtu").keypress(function (event) {
    if (event.which == 32) {
      alert('Não adicione espaços!') 
      return false;
    }
  });

});

// não adiciona o espaço no campo senha

$(function () {
  $("#txts").keypress(function (event) {
    if (event.which == 32) {
      alert('Não adicione espaços!') 
      return false;
    }
  });

});


// não adiciona o espaço no campo matricula
$(function () {
  $("#matricula").keypress(function (event) {
    if (event.which == 32) {
      return false;
    }
  });

});


// função do olho no index

var senha = document.getElementById('txts');
var icon = document.getElementById('mostrar');
icon.addEventListener('click', togglePass);

function togglePass() {
  if (senha.type == 'password') {
    senha.type = 'text';
    icon.src = 'eye.svg';

  } else {
    senha.type = 'password';
    icon.src = 'eye-off.svg';
  }

}

