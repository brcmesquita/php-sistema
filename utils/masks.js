$(document).ready(function () {
  // Máscara para telefone
  $('#telefone').inputmask('(99) 99999-9999', {
    removeMaskOnSubmit: true,
  });

  // Máscara para CPF
  $('#cpf').inputmask('999.999.999-99', {
    removeMaskOnSubmit: true,
  });

  // Máscara para CNPJ
  $('#cnpj').inputmask('99.999.999/9999-99', {
    removeMaskOnSubmit: true,
  });

  // Máscara para CEP
  $('#cep').inputmask('99999-999', {
    removeMaskOnSubmit: true,
  });
});
