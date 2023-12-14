<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Página de Pago</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!--Fuente-->

    
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&family=Poppins:wght@500&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }
        header {
            background-color: #343a40; /* Color gris claro */
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo img {
            max-height: 40px;
        }

        .instagram-logo img {
            max-height: 30px;
            cursor: pointer;
        }

        .brand {
            display: flex;
            align-items: center;
        }

        .brand img {
            max-height: 40px;
            margin-right: 10px;
        }
        .header-content {
            display: flex;
            align-items: center;
        }
        
        .btn {
            background-color: #9f3d6b; /* Color gris azulado */
            border-color: #9f3d6b;
            color: white;
            
        }

        .btn:hover {
            background-color: #7c2a50;
            border-color: #7c2a50;
            color: white;
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .social-dropdown {
            display: flex;
            align-items: center;
            margin-right: 10px; /* Ajusta el margen derecho según sea necesario */
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            overflow: hidden;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #4a4a4a;
            transition: transform 0.3s ease;
            border-bottom: 1px solid #ddd;
        }
        .dropdown-item:last-child {
            border-bottom: none; /* Evita la línea divisoria en el último elemento */
        }
        .dropdown-item:hover {
            transform: scale(1.05); /* Aumentamos ligeramente el tamaño al pasar el puntero */
        }
        .divider {
            border-left: 1px solid white;
            height: 20px; /* Ajusta la altura según tus necesidades */
            margin: 0 10px; /* Ajusta el margen según tus necesidades */
        }

        .btn-white-margin {
            color: #ffffff; /* Color blanco */
            margin-left: 10px;
            margin-right: 30px; /* Ajusta el margen derecho según tus necesidades */
        }
        .btn-no-bg-text {
            background-color: transparent; /* Fondo transparente */
            border: none; /* Sin borde */
            color: white; /* Color del texto */
        }
        .contenedor-pago {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 60px;
            
        }
        h1, h2, h3 {
            font-family: 'Montserrat', sans-serif;
            color: #9f3d6b;
        }
        .opciones-envio, .instrucciones-pago, .confirmacion-pago {
            margin-top: 20px;
        }
        .opcion {
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        ul {
            padding: 0;
            list-style: none;
        }

        .detalle-compra {
            margin-bottom: 20px;
        }

        .instrucciones-pago {
            margin-bottom: 20px;
        }

        .confirmacion-pago {
            text-align: center;
        }

        
        .footer {
            background-color: #343a40; /* Color gris claro */
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000; /* Ajusta el índice z para que esté por encima de otros elementos */
            margin-top: auto;
        }
        #nuevaDireccion {
            margin-top: 10px;
        }

        #nuevaDireccion label {
            display: block;
            margin-bottom: 8px;
        }

        #nuevaDireccion input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <a href="/tienda" style="font-family: 'Roboto', sans-serif; font-size: 16px; text-decoration: none; color: white; text-align: left; margin-left: 10px;">
            <i class="fas fa-store" style="margin-right: 5px;"></i> Tienda
        </a>
        <div class="header-content">
            <div class="social-dropdown">
                <div class="social-dropdown" style="float: left; margin-right: 10px;">
                    <a class="instagram-logo" href="https://www.instagram.com/energia._natural/" target="_blank">
                        <img src="{{asset('images/instagram.png')}}" alt="Logo de Instagram" style="filter: brightness(0) invert(1);">
                    </a>
                </div>
                <div class="dropdown">
                    
                    <button class=" btn-no-bg-text dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ $user->nombre }}
                    </button>
                    <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/perfil"><i class="far fa-user"></i> Mi Perfil</a>
                        <a class="dropdown-item" href="/compras"><i class="fas fa-shopping-bag"></i> Mis Compras</a>
                        <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                        
                    </div>
            </div>
            </div>
            <div class="divider"></div>
            <a href="/carrito" class="btn-white-margin"><i id="carrito-icon" class="fas fa-shopping-cart"></i></a>
        </div>
    </header>

<div class="contenedor-pago">
    <h1>Resumen de Compra</h1>
    <input type="hidden" id="rutAdminCreadorInput" value="{{ auth()->user()->rut }}">
    <div class="detalle-compra" id="detalle-compra">
        <!-- Aquí se mostrarán los productos y su precio -->
    </div>

    <hr style="color: #9f3d6b">
    
    <div class="opciones-envio">
        <h2>Opciones de Envío</h2>

        <div class="opcion">
            <input type="radio" id="retiroEnTienda" name="envio" value="retiroEnTienda" checked>
            <label for="retiroEnTienda">Retiro en Tienda</label>
            <br>
            <input type="radio" id="envioDomicilio" name="envio" value="envioDomicilio">
            <label for="envioDomicilio">Envío a Domicilio (por pagar)</label>
        </div>

        <div id="formularioEnvio" style="display: none;">
            <hr style="color: #9f3d6b">
            <h3>Dirección de Envío</h3>
            <!-- Aquí puedes agregar campos para la dirección, como calle, ciudad, etc. -->
            <label for="usarDireccionExistente">
                <input type="radio" id="usarDireccionExistente" name="tipoDireccion">
                Utilizar mi dirección existente
            </label>
            <br>
            <div id="direccionExistente" style="display: none; color:#888888">
                <!-- Mostrar dirección existente aquí -->
            </div>
            
            <label for="ingresarNuevaDireccion">
                <input type="radio" id="ingresarNuevaDireccion" name="tipoDireccion">
                Ingresar una nueva dirección
            </label>
            
            <div id="nuevaDireccion" style="display: none;">
                <!-- Campos para la nueva dirección -->
                <label for="calle">Dirección completa (Calle, Número y Comuna)</label>
                <input type="text" id="calle" name="calle">
                <!-- Agrega más campos según sea necesario -->
            </div>
            
            <div id="direccionUsuario"></div>
            <div id="direccionExistente"></div>
        </div>
    </div>

    <hr style="color: #9f3d6b">

    <div class="instrucciones-pago">
        <h2>Instrucciones de Pago</h2>
        <p>Para realizar el pago, transfiera el total a pagar a la siguiente cuenta:</p>
        <ul>
            <li>Banco: Banco Estado</li>
            <li>Cuenta: 19982098</li>
            <li>Rut: 19982099-2</li>
            <li>Tipo de cuenta: Cuenta Rut</li>
            <li>Nombre: Diego Villatoro</li>
        </ul>
        <hr style="color: #9f3d6b">
        <p>Recuerda enviar el comprobante a <a href="mailto:comprobante@cuarzosen.com">comprobante@cuarzosen.com</a></p>
    </div>

    <div class="confirmacion-pago">
        <p>Si ya realizó la transferencia, presione el siguiente botón:</p>
        <button class="btn" id="pagoRealizadoBtn" onclick="confirmarPago()">Pago Realizado</button>
    </div>
</div>
<div class="footer">
    © 2023 Cuarzos Energía Natural - Tienda en línea
</div>
<!-- Modal de Agradecimiento -->
<div class="modal fade" id="agradecimientoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Gracias por tu compra!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Agradecemos tu preferencia al elegir comprar en nuestra tienda. Tu satisfacción es nuestra prioridad.</p>
                <p>Ahora puedes relajarte mientras procesamos tu compra. Recibirás un email con el estado de tu compra.</p>
            </div>
            <div class="modal-footer">
                <a href="/tienda" class="btn ">Ir a la página principal</a>
                <button type="button" class="btn " data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>




<script>
    function obtenerProductos() {
        var carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        return carrito.length > 0 ? carrito : null;
    }

    var productos = obtenerProductos();

    if (productos) {
        // Realizar solicitud AJAX
    } else {
        console.error('No se encontraron productos para procesar el pago.');
    }

    function confirmarPago() {
        // Obtener datos necesarios (rut del cliente, fecha, total, dirección, etc.)
        var rutCliente = obtenerRutCliente(); // Implementa esta función según tu lógica
        var fecha = obtenerFecha(); // Implementa esta función según tu lógica
        var total = obtenerTotal(); // Implementa esta función según tu lógica
        var direccion = obtenerDireccion(); // Implementa esta función según tu lógica

        // Verifiquemos los valores antes de la solicitud AJAX
        console.log('Valores antes de la solicitud AJAX:', {
            rutCliente: rutCliente,
            fecha: fecha,
            total: total,
            direccion: direccion,
            productos: productos,
        });

        // Realizar solicitud AJAX para notificar al servidor que el pago se ha realizado y enviar datos adicionales
        $.ajax({
            type: 'POST',
            url: '/confirmar-pago',
            data: {
                _token: '{{ csrf_token() }}',
                rutCliente: rutCliente,
                fecha: fecha,
                total: total,
                direccion: direccion,
                productos: productos.map(function(producto) {
                    return {
                        id: producto.id,
                        cantidad: producto.cantidad || 1,  // Asegúrate de incluir la cantidad
                        precio: producto.precio,
                    };
                }),
            },
            success: function(response) {
                console.log('Pago confirmado con éxito');
                localStorage.removeItem('carrito');
                $('#agradecimientoModal').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error al confirmar el pago', jqXHR.responseText);
                alert('Hubo un error al procesar el pago. Por favor, inténtalo nuevamente.');
            }
        });
    }



    // Nueva función para obtener rut_admin_creador
    function obtenerRutAdminCreador() {
        // Implementa lógica para obtener rut_admin_creador, por ejemplo, desde algún campo oculto en tu formulario
        return $('#rutAdminCreadorInput').val(); // Ajusta según tu implementación
    }





    // Funciones para obtener datos del formulario
    function obtenerRutCliente() {
        // Implementa la lógica para obtener el rut del cliente desde el formulario
        return $('#rutCliente').val(); // Ajusta el selector según tu estructura
    }

    function obtenerFecha() {
        // Implementa la lógica para obtener la fecha desde el formulario
        return $('#fecha').val(); // Ajusta el selector según tu estructura
    }

    function obtenerTotal() {
        // Obtener productos del carrito desde el almacenamiento local
        var carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        // Calcular el total sumando los precios de los productos en el carrito
        var total = carrito.reduce(function (accumulator, producto) {
            return accumulator + parseFloat(producto.precio);
        }, 0);

        console.log('Valor de total en obtenerTotal():', total);

        return total;
    }

    function obtenerDireccion() {
        // Implementa la lógica para obtener la dirección desde el formulario
        if ($('#retiroEnTienda').is(':checked')) {
            return 'Retiro en Tienda';
        } else if ($('#usarDireccionExistente').is(':checked')) {
            return $('#direccionExistente').text(); // Ajusta el selector según tu estructura
        } else if ($('#ingresarNuevaDireccion').is(':checked')) {
            return $('#calle').val(); // Ajusta el selector según tu estructura
        }

        return '';
    }

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const detalleCompra = document.getElementById('detalle-compra');
        const retiroEnTienda = document.getElementById('retiroEnTienda');
        const envioDomicilio = document.getElementById('envioDomicilio');
        const formularioEnvio = document.getElementById('formularioEnvio');
        const usarDireccionExistente = document.getElementById('usarDireccionExistente');
        const direccionExistente = document.getElementById('direccionExistente');
        const ingresarNuevaDireccion = document.getElementById('ingresarNuevaDireccion');
        const nuevaDireccion = document.getElementById('nuevaDireccion');

        usarDireccionExistente.addEventListener('change', function () {
            if (usarDireccionExistente.checked) {
                // Realiza la solicitud AJAX para obtener la dirección del usuario
                $.ajax({
                    type: 'GET',
                    url: '/obtener-direccion-usuario',  // Ajusta la URL
                    dataType: 'json',  // Especifica el tipo de datos esperado
                    success: function(response) {
                        if (response.direccion) {
                            // Muestra la dirección obtenida
                            direccionExistente.innerHTML = `<p>Dirección: ${response.direccion}</p>`;
                            direccionExistente.style.display = 'block';
                        } else {
                            // Si no hay dirección, oculta el contenedor
                            direccionExistente.style.display = 'none';
                        }
                    },
                    error: function(error) {
                        console.error('Error al obtener la dirección del usuario', error);
                        // Puedes manejar el error según tus necesidades
                    }
                });
            } else {
                direccionExistente.style.display = 'none';
            }
        });
        usarDireccionExistente.addEventListener('change', function () {
            if (usarDireccionExistente.checked) {
                // Mostrar dirección existente
                direccionExistente.style.display = 'block';
                
                // Ocultar nueva dirección
                nuevaDireccion.style.display = 'none';
            }
        });
        ingresarNuevaDireccion.addEventListener('change', function () {
            if (ingresarNuevaDireccion.checked) {
                // Mostrar el bloque de nueva dirección y ocultar el de dirección existente
                nuevaDireccion.style.display = 'block';
                direccionExistente.style.display = 'none';
            }
        });
        

        // Obtén el carrito desde el almacenamiento local
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        if (detalleCompra && carrito.length > 0) {
            carrito.forEach(producto => {
                const divProducto = document.createElement('div');
                divProducto.classList.add('producto');

                const pNombre = document.createElement('p');
                pNombre.textContent = `${producto.nombre} - $${parseFloat(producto.precio).toLocaleString('es-ES')}`;

                divProducto.appendChild(pNombre);
                detalleCompra.appendChild(divProducto);
            });

            // Calcular el total a pagar
            const totalPagar = carrito.reduce((total, producto) => total + parseFloat(producto.precio), 0);

            // Mostrar el total a pagar
            const pTotal = document.createElement('p');
            pTotal.textContent = `Total a Pagar: $${totalPagar.toLocaleString('es-ES', { minimumFractionDigits: 0 })}`;
            detalleCompra.appendChild(pTotal);
        } else if (detalleCompra) {
            const p = document.createElement('p');
            p.textContent = 'No hay productos en el carrito.';
            detalleCompra.appendChild(p);
        }

        // Manejar cambios en las opciones de envío
        retiroEnTienda.addEventListener('change', function () {
            formularioEnvio.style.display = 'none';
        });

        envioDomicilio.addEventListener('change', function () {
            formularioEnvio.style.display = 'block';
        });

        usarDireccionExistente.addEventListener('change', function () {
            direccionExistente.style.display = usarDireccionExistente.checked ? 'block' : 'none';
        });

        ingresarNuevaDireccion.addEventListener('change', function () {
            nuevaDireccion.style.display = ingresarNuevaDireccion.checked ? 'block' : 'none';
        });
    });

    // Agrega aquí la lógica para el botón "Pago Realizado" si es necesario
</script>

</body>