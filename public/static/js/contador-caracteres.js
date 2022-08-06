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

//Anuncio
$(document).ready(function () {
    var text_max = 200;
    $('#caracters').html('Quedan ' + text_max + ' caracteres.');

    $('#anuncio').keyup(function () {
        var text_length = $('#anuncio').val().length;
        var text_remaining = text_max - text_length;

        $('#caracters').html('Quedan ' + text_remaining + ' caracteres.');
    });
});
