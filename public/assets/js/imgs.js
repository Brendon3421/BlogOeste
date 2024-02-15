//isso e para o cadastro de mercado
   fetch('https://exemplo.com/api/dados')
   .then(response => response.json()) // Converte a resposta em JSON
   .then(data => {
       // Processa os dados da API e renderiza na página
       document.getElementById('conteudo').textContent = JSON.stringify(data, null, 2);
   })
   .catch(error => {
       console.error('Erro na solicitação da API: ', error);
   });


document.getElementById('estado').addEventListener('change', function() {
    var estadoSelecionado = this.value;
    var cidadeSelect = document.getElementById('cidade');

    // Limpa as opções existentes
    while (cidadeSelect.options.length > 0) {
        cidadeSelect.remove(0);
    }

    if (estadoSelecionado !== '') {
        var url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estadoSelecionado + '/municipios';
        fetch(url)
            .then(response => response.json())
            .then(data => {
                data.forEach(cidade => {
                    var option = document.createElement('option');
                    option.value = cidade.nome;
                    option.text = cidade.nome;
                    cidadeSelect.add(option);
                });
            });
    } else {
        var option = document.createElement('option');
        option.value = '';
        option.text = 'Selecione um estado primeiro';
        cidadeSelect.add(option);
    }
});

const handleZipCode = (event) => {
    let input = event.target
    input.value = zipCodeMask(input.value)
}

const zipCodeMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{5})(\d)/, '$1-$2')
    return value
}

var cnpjInput = document.getElementById('cnpj');
VMasker(cnpjInput).maskPattern("99.999.999/9999-99");

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
}

function mostrarOcultarSenha() {
    var senhaInput = document.getElementById("senha");
    var mostrarSenhaCheckbox = document.getElementById("mostrarSenha");

    if (mostrarSenhaCheckbox.checked) {
        senhaInput.type = "text";
    } else {
        senhaInput.type = "password";
    }
}

var numeroInput = document.getElementById('telefone');
var maskOptionsNumero = {
    mask: '(00) 00000-0000' // Define a máscara como (00) 00000-0000
};