$("#enviar").click(function(){
    var nombre = $('#nombre').val();
    var comentario = $('#comentario').val();

    if (nombre=="")
    {
        alert('Debe escribir su nombre');
        return;
    }

    if (comentario=="")
    {
        alert('Debe escribir un comentario');
        return;
    }

    $('#formulario').submit();
})