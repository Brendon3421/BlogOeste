    // Função para mostrar/ocultar a senha  
    function mostrarOcultarSenha() {
        var senhaInput = document.getElementById("senha");
        var mostrarSenhaCheckbox = document.getElementById("mostrarSenha");

        if (mostrarSenhaCheckbox.checked) {
            senhaInput.type = "text"; // Altera para "text" para mostrar a senha
        } else {
            senhaInput.type = "password"; // Volta para "password" para ocultar a senha
        }
    }