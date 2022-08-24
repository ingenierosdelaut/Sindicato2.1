//Especificaciones
$(document).ready(function () {
    var text_max = 200;
    $('#caracters').html('Quedan ' + text_max + ' caracteres.');

    $('#contar').keyup(function () {
        var text_length = $('#contar').val().length;
        var text_remaining = text_max - text_length;

        $('#caracters').html('Quedan ' + text_remaining + ' caracteres.');
    });
});

//Anuncios
// $(document).ready(function () {
//     var text_max = 200;
//     $('#caracters').html('Quedan ' + text_max + ' caracteres.');

//     $('#anuncio').keyup(function () {
//         var text_length = $('#anuncio').val().length;
//         var text_remaining = text_max - text_length;

//         $('#caracters').html('Quedan ' + text_remaining + ' caracteres.');
//     });
// });

function countChars(obj) {
    var maxLength = 200;
    var strLength = obj.value.length;


    document.getElementById("caracters").innerHTML = '<p>' + strLength + '/' + maxLength + ' caracteres</p>';


    if (strLength >= maxLength) {
        document.getElementById("caracters").innerHTML = '<p style="color: red;">' + strLength + '/' + maxLength + ' caracteres</p>' + ' Has alcanzado el limite de caracteres';
    } else {
        document.getElementById("caracters").innerHTML = strLength + '/' + maxLength + ' caracteres';
    }
}


