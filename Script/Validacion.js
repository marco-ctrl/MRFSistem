(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

function soloLetras(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  /*for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }*/

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }
}

/*function soloNumeros(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = "0123456789",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  /*for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }*/

/*if (letras.indexOf(tecla) == -1 && !tecla_especial) {
  return false;
}
}*/

function numberMobile(e) {
  var reemplazar = e.target.value;
  //e.target.value = e.target.value.replace(/[^\d]/g, e.target.value.substr(0, e.target.value.length - 1));
  e.target.value = e.target.value.replace(/[^\d]/g, '');

  return false;
}


function soloTexto(string) {//solo letras y numeros
  var out = '';
  //Se añaden las letras validas
  var filtro = ' áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';//Caracteres validos

  for (var i = 0; i < string.length; i++)
    if (filtro.indexOf(string.charAt(i)) != -1)
      out += string.charAt(i);
  return out;
}

function soloNumeros(string) {//solo letras y numeros
  var out = '';
  //Se añaden las letras validas
  var filtro = '0123456789';//Caracteres validos

  for (var i = 0; i < string.length; i++)
    if (filtro.indexOf(string.charAt(i)) != -1)
      out += string.charAt(i);
  return out;
}


function soloProfesion(string) {//solo letras y numeros
  var out = '';
  //Se añaden las letras validas
  var filtro = ' .áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';//Caracteres validos

  for (var i = 0; i < string.length; i++)
    if (filtro.indexOf(string.charAt(i)) != -1)
      out += string.charAt(i);
  return out;
}

function alfaNumerico(string) {
  var out = '';
  //Se añaden las letras validas
  var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos

  for (var i = 0; i < string.length; i++)
    if (filtro.indexOf(string.charAt(i)) != -1)
      out += string.charAt(i);
  return out;
}

function textoDireccion(string) {
  var out = '';
  //Se añaden las letras validas
  var filtro = ' /.0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos

  for (var i = 0; i < string.length; i++)
    if (filtro.indexOf(string.charAt(i)) != -1)
      out += string.charAt(i);
  return out;
}


function Direccion(e) {
  var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz/0123456789",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

  for (var i in especiales) {
    if (key == especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
  }

  

}