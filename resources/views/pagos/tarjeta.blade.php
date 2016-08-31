<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Ejemplo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

        function culqi(Culqi) {
            
            $.post("tarjeta", {token: Culqi.respuesta},
            function(data, status){
                
                if (data=='ok') {
                    alert('exito'); 
                } else {
                    aler('error');
                }
                
            });
            
            
            //Recibes la respuesta de Culqi
            console.log(Culqi.respuesta);

            //Cierras el formulario de Culqi
            Culqi.cerrar();

        };
    </script>
    
        <script>
            //Configuras el código de comercio en Culqi
        Culqi.codigo_comercio = '4s4cv6LfyqNI';

            //Configuras la información adicional para mostrar el formulario de pago
        Culqi.configurar({
            nombre: 'Chanclona'
            , orden: 'x123131'
            , moneda: 'PEN'
            , descripcion: 'Chanclonadas'
            , monto: 16100
        });

        $(window).on('popstate', function () {
            Culqi.cerrar();
        });
        
    </script>

</body>

</html>