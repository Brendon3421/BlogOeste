var cpfInput = document.getElementById('cep');
var maskOptionsCpf = {
    mask: '00000-000' // Define a máscara como ###.###.###-##
};
var cpfMask = IMask(cpfInput, maskOptionsCpf);

var numeroInput = document.getElementById('numero');
var maskOptionsNumero = {
    mask: '(00) 00000-0000' // Define a máscara como (00) 00000-0000
};

var dataInput = document.getElementById('data_nascimento');
var maskOptionsData = {
    mask: '00/00/0000' 
};