<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Energia Natural</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Fondo gris claro */
            font-size: 16px;
        }

        .header {
            background-color: #333; /* Fondo negro */
            padding: 8px 16px;
            color: white;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
            height: 50px;
        }

        .menu-container {
            background-color: #333; /* Fondo negro */
            width: 220px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
            box-shadow: 3px 0px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            margin-left: 12%;
        }

        .nav-links a {
            display: block;
            color: #fff; /* Texto blanco */
            text-decoration: none;
            padding: 12px;
            transition: background-color 0.3s;
            
        }

        .nav-links a:hover {
            background-color: #555; /* Cambio de color en hover */
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .btn-contact {
            font-size: 12px;
        }

        .welcome-container {
            background-color: #666; /* Fondo gris oscuro */
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
            text-align: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        .option-title {
            font-size: 20px;
            color: #fff;
            margin-bottom: 10px;
        }
        .table-container {
            width: 80%; /* Cambia el porcentaje según tus necesidades */
            margin-left: 2%; /* Centra la tabla en el contenedor */

            margin-top: 40px;

        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px; /* Espacio entre la cabecera y el cuerpo de la tabla */
        }

        th, td {
            padding: 10px; /* Ajusta el relleno según tus preferencias */
            text-align: left;
            border: 1px solid #ddd; /* Borde para las celdas */
        }

        th {
            background-color: #f2f2f2; /* Color de fondo para la cabecera */
        }
        .acciones-btn {
            padding: 8px 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            padding: 8%;
        }

        /* Estilo del contenido del modal */
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        /* Estilo del botón de cerrar */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Estilo del formulario en el modal */
        form {
            display: flex;
            flex-direction: column;
        }

        

        input, select, button {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        

        
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">


</head>
<body>
    <div class="menu-container">
        <ul class="nav-links">
            @auth
                <div class="option-title">Menú de Opciones</div>
                <hr style="color: #00CED1; margin-right: 10%;">
                <li><a href="{{route('home')}}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{route('estadisticas.mostrar')}}"><i class="fas fa-chart-bar"></i> Estadísticas</a></li>
                <li><a href="{{route('usuarios.index')}}"><i class="fas fa-users"></i> Usuarios</a></li>
                <li><a href="{{ route('categorias.create') }}"><i class="fas fa-folder-plus"></i> Categorías</a></li>
                <li><a href="{{ route('productos.index') }}"><i class="fas fa-box"></i> Productos</a></li>
                <li><a href="{{ route('courrier.agregar') }}"><i class="fas fa-shipping-fast"></i> Courrier</a></li>
                <li><a href="{{ route('ventas.mostrar') }}"><i class="fas fa-chart-line"></i> Ventas</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <span style="font-weight: bold;"><i class="fas fa-sign-out-alt"></i> {{ $user->nombre }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('perfil.admin') }}" style="color: #333; text-align: center;">
                                Mi Perfil
                            </a>
                            <a href="/logout" style="color: #333; text-align: center; padding: 10px;">
                                Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>

    <header class="header" >
        <div class="logo">
            <!-- Logo eliminado -->
        </div>
        <nav>
            <!-- Mantiene el contenido del encabezado -->
        </nav>
        
    </header>

    <section class="content">
        <div class="table-container">
            <h2 class="mb-4">Lista de Ventas</h2>
            <div id="mensajeActualizacion" style="display: none; padding: 10px; background-color: #4CAF50; color: white; text-align: center;">
                Venta actualizada exitosamente
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>Productos Comprados</th>
                        <th>Rut Admin</th>
                        <th>Rut Cliente</th>
                        <th>Fecha Venta</th>
                        <th>Total</th>
                        <th>Dirección de Envío</th>
                        <th>Estado</th>
                        <th>Número de Envío</th>
                        <th>ID Courrier</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id_venta }}</td>
                            <td>
                                @foreach ($venta->detalles as $detalle)
                                    {{ $detalle->producto->nom_producto }} (ID: {{ $detalle->producto->id_producto }}) <br>
                                @endforeach
                            </td>
                            <td>{{ $venta->id_admin_rut }}</td>
                            <td>{{ $venta->id_cliente_rut }}</td>
                            <td>{{ $venta->fecha }}</td>
                            <td>${{ number_format($venta->total, 0, ',', '.') }}</td>


                            <td>{{ $venta->direccion_envio }}</td>
                            <td>{{ $venta->estado }}</td>
                            <td>{{ $venta->num_envio }}</td>
                            <td>{{ $venta->id_courrier }}</td>
                            <td>
                                <button class='acciones-btn' onclick='modificarVenta("{{ $venta->id_venta }}", "{{ $venta->num_envio }}", "{{ $venta->id_courrier }}", "{{ $venta->estado }}")'>Modificar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2>Modificar Venta</h2>
            <!-- Formulario de modificación -->
            <form id="modificarVentaForm">
                <label for="numEnvio">Número de Envío: (máx 10 números)</label>
                <input type="text" id="numEnvio" name="numEnvio" required>
    
                <label for="idCourrier">Courier:</label>
                <select id="idCourrier" name="idCourrier" required>
                    <!-- Opciones para los Courrier disponibles -->
                    <?php
                    $courriers = DB::table('courrier')->get();
                    foreach ($courriers as $courrier) {
                        echo "<option value='{$courrier->id_courrier}'>{$courrier->nombre}</option>";
                    }
                    ?>
                </select>
    
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Aprobada">Aprobada</option>
                    <option value="Despachada">Despachada</option>
                    <option value ="Cancelada">Cancelada</option>
                    <option value ="Entregada en tienda">Entregada en tienda</option>
                </select>
    
                <button type="button" onclick="guardarModificacion()">Guardar</button>
            </form>
        </div>
    </div>
    
    <script>
        // Función para abrir el modal
        let rutAdminActual = "{{ $rutAdmin }}";
        let idVentaActual;
    
        function abrirModal(idVenta, numEnvioExistente, idCourrierExistente, estadoExistente) {
            idVentaActual = idVenta;
    
            // Obtener los elementos del formulario
            const numEnvioInput = document.getElementById('numEnvio');
            const idCourrierSelect = document.getElementById('idCourrier');
            const estadoSelect = document.getElementById('estado');
    
            // Establecer los valores existentes en los elementos del formulario
            numEnvioInput.value = numEnvioExistente;
            idCourrierSelect.value = idCourrierExistente;
            estadoSelect.value = estadoExistente;
    
            // Mostrar el modal
            document.getElementById('myModal').style.display = 'block';
        }
    
        // Función para cerrar el modal
        function cerrarModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    
        // Función para guardar la modificación
        function guardarModificacion() {
            // Obtener el ID de venta
            const idVenta = idVentaActual;
    
            // Obtener los valores del formulario
            const numEnvio = document.getElementById('numEnvio').value;
            const idCourrier = document.getElementById('idCourrier').value;
            const estado = document.getElementById('estado').value;
    
            // Objeto con los datos a enviar al servidor
            const datos = {
                id_venta: idVenta,
                numEnvio: numEnvio,
                idCourrier: idCourrier,
                estado: estado,
                rut_admin: rutAdminActual,
            };
    
            // Obtener el token CSRF de Laravel (puedes ajustar esta lógica según tus necesidades)
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    
            // Realizar la solicitud Ajax para guardar los datos en el servidor
            $.ajax({
                type: 'POST',
                url: '/ventas/guardar',
                data: datos,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                success: function(response) {
                    // Manejar la respuesta del servidor si es necesario
                    console.log('Guardado exitoso:', response);
    
                    // Cerrar el modal después de guardar
                    cerrarModal();
    
                    mostrarMensajeActualizacion();
                },
                error: function(error) {
                    console.error('Error al guardar:', error);
                },
            });
        }
    
        // Llama a esta función desde tu función original
        function modificarVenta(idVenta, numEnvio, idCourrier, estado) {
            console.log('Modificar venta con ID:', idVenta);
            abrirModal(idVenta, numEnvio, idCourrier, estado);
        }
    
        function mostrarMensajeActualizacion() {
            const mensajeActualizacion = document.getElementById('mensajeActualizacion');
            mensajeActualizacion.style.display = 'block';
    
            // Puedes agregar más personalización al mensaje si es necesario
            // Por ejemplo, agregar clases, estilos adicionales, etc.
    
            // Después de un tiempo, ocultar el mensaje automáticamente
            setTimeout(function () {
                mensajeActualizacion.style.display = 'none';
            }, 3000); // Ocultar después de 3 segundos (puedes ajustar este valor)
        }
    </script>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>