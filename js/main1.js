$(document).ready(function () {

    $('#palabClave1').on('keyup', function () {
        var palabClave1 = $('#palabClave1').val()
        $.ajax({
            type: 'POST',
            url: 'actions.php',
            data: { 'palabClave1': palabClave1 },
   
        })
            .done(function (resultado) {
                $('#listas1').html(resultado)
            })
            .fail(function () {
                alert('ERROR')
            })
    })  
})