var menuItem = document.querySelectorAll('.item-menu')

function selectLink() {
  menuItem.forEach((item) =>
    item.classList.remove('ativo')
  )
  this.classList.add('ativo')
}

menuItem.forEach((item) =>
  item.addEventListener('click', selectLink)
)

//Expandir o menu

var btnExp = document.querySelector('#btn-exp')
var menuSide = document.querySelector('.menu-lateral')

btnExp.addEventListener('click', function() {
  menuSide.classList.toggle('expandir')
})

//darkmode 

$(document).ready(function() {
  const chk = document.getElementById('chk');

  chk.addEventListener('change', () => {
    document.body.classList.toggle('dark');
  });
});
$(document).ready(function() {
  $('.dropdown-toggle').dropdown();
});

function validateForm() {
    var senha = document.forms["registrationForm"]["senha"].value;
    var confirmarSenha = document.forms["registrationForm"]["confirmar_senha"].value;

    if (senha !== confirmarSenha) {
        alert("A senha e a confirmação de senha não correspondem.");
        return false;
    }
    return true;
}

document.addEventListener('DOMContentLoaded', function() {
    // Esta função será executada assim que a página for carregada completamente
    var nomeUsuario = prompt("Digite seu nome:");
    
    if (nomeUsuario) {
        alert("Bem-vindo, " + nomeUsuario + "!");
    }
});