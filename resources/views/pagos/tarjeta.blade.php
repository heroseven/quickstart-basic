<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Ejemplo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://integ-pago.culqi.com/js/v1"></script>


</head>

<body>


    <button id="botonPropio">Pagar</button>
    <button id="boton2">Pagar Prueba</button>
    <script>
        $('#boton2').on('click', function (e) {

            $.post("tarjeta", { token: 'awerwerew'},
            function (data, status) {
                if (data=="ok") {
                    alert('exito');
                } else {
                    alert('error');
                }
            });
        });
    </script>
    
    
<script>
    $('#botonPropio').on('click', function (e) {
        // Abre el formulario con las opciones que necesites:
        Culqi.abrir();
        e.preventDefault();
    });
    //no olvidar
    function culqi(Culqi) {


        if(Culqi.error){
            alert("no se pudo crear el token");
        }else{
            $.post("tarjeta", {token: Culqi.token.id}, function(data, status){
                if (data=='ok') {
                    alert('exito');
                } else {
                    aler('error');
                }

            });
        }


    };
</script>
    
<script>
    //Configuras el código de comercio en Culqi
    Culqi.codigoComercio = '4s4cv6LfyqNI';

    //Configuras la información adicional para mostrar el formulario de pago
    Culqi.configurar({
        nombre: 'Chanclona',
        orden: 'x123131',
        moneda: 'PEN',
        descripcion: 'Chanclonadas',
        monto: 16100
        //guardar:true,
    });

    $(window).on('popstate', function () {
    Culqi.cerrar();
    });
</script>

</body>

</html>