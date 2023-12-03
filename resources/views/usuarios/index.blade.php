<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            margin-left: 15%; /* Centra la tabla en el contenedor */
        }
        

        
    </style>

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
                <li><a href="#"><i class="fas fa-chart-bar"></i> Estadísticas</a></li>
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
        <a href="#" class="btn btn-contact">
            <button style="background-color: #666; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                Contacto
            </button>
        </a>
    </header>
    <section class="vh-100">
        @auth
        <div class="table-container" style="margin-top:60px;">
            <h2 class="mb-4">Lista de Usuarios</h2>
            @if(session('success'))
                <div class="alert alert-success mb-3">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-3">
                <!-- Contenido del formulario de búsqueda -->
                <form action="{{ route('usuarios.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input placeholder="Buscar por cualquier campo" type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn" style="background-color: #1b3039; color: white;">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Rut</th>
                        <th style="width: 200px;">Rol</th>
                        <th>User name</th>
                        <th>Nombre</th>
                        <th style="width: 200px;">Apellido</th>
                        <th style="width: 200px;">Fono</th>
                        <th style="width: 200px;">Direccion</th>
                        <th style="width: 100px;">Email</th>
                        <th style="width: 200px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listadoUsuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->rut }}</td>
                            <td>{{ $usuario->rol }}</td>
                            <td>{{ $usuario->nom_usuario }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellido }}</td>
                            <td>{{ $usuario->fono }}</td>
                            <td>{{ $usuario->direccion }}</td>
                            <td>{{ $usuario->correo }}</td>
                            <td>
                                
                                <a href="#" style="background-color: #3498db; color: white;" class="btn editar-btn" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal" data-id="{{ $usuario->rut }}">Editar</a>

                                <form id="eliminarForm{{ $usuario->rut }}" action="{{ route('usuarios.destroy', $usuario->rut) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" style="background-color: #e74c3c; color: white;" class="btn" data-id="{{ $usuario->rut }}">Eliminar</a>
                            </td>
                            
                        </tr>
                    @endforeach
                    <!-- Modal de edición -->
                    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Cabecera del modal -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarUsuarioModalLabel">Actualiza cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Contenido del formulario de edición -->
                                <div class="modal-body">
                                    <form id="formularioEditarUsuario" action="{{ route('usuarios.update', 0) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <!-- Campo RUT -->
                                        @if ($listadoUsuarios->isNotEmpty())
                                            <!-- Campo Rol -->
                                            <div class="form-group">
                                                <label for="editar_rol">Rol:</label>
                                                <input type="number" class="form-control" name="rol" id="editar_rol" value="{{ $listadoUsuarios->first()->rol }}" required>
                                            </div>

                                            <!-- Campo Nombre de Usuario -->
                                            <div class="form-group">
                                                <label for="editar_nom_usuario">Nombre de Usuario:</label>
                                                <input type="text" class="form-control" name="nom_usuario" id="editar_nom_usuario" value="{{ $listadoUsuarios->first()->nom_usuario }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editar_nombre">Nombre:</label>
                                                <input type="text" class="form-control" name="nombre" id="editar_nombre" value="{{ $listadoUsuarios->first()->nombre }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editar_apellido">Apellido:</label>
                                                <input type="text" class="form-control" name="apellido" id="editar_apellido" value="{{ $listadoUsuarios->first()->apellido }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editar_fono">Fono:</label>
                                                <input type="text" class="form-control" name="fono" id="editar_fono" value="{{ $listadoUsuarios->first()->fono }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="editar_direccion">Direccion:</label>
                                                <input type="text" class="form-control" name="direccion" id="editar_direccion" value="{{ $listadoUsuarios->first()->direccion }}" >
                                            </div>

                                            <!-- Repite estos bloques para otros campos -->

                                            <!-- Campo Correo -->
                                            <div class="form-group">
                                                <label for="editar_correo">Correo:</label>
                                                <input type="text" class="form-control" name="correo" id="editar_correo" value="{{ $listadoUsuarios->first()->correo }}" required>
                                            </div>

                                            <!-- Separación -->
                                            <div style="margin-bottom: 10px;"></div>
                                        @else
                                            <p>No hay usuarios disponibles para editar</p>
                                        @endif
                                        <!-- Botón de actualización -->
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </tbody>
            </table>
        </div>

        @endauth
        
    </section>

<script>
    $(document).ready(function() {
        $('.editar-btn').on('click', function() {
            var userId = $(this).data('id');
            console.log("Usuario ID: " + userId);
            
            // Almacena el ID del usuario actual en el modal
            $('#editarUsuarioModal').data('userId', userId);
            
            // Limpia el formulario antes de abrirlo para evitar confusiones
            $('#formularioEditarUsuario')[0].reset();

            // Configura la acción del formulario para la actualización
            $('#formularioEditarUsuario').attr('action', '/usuarios/' + userId);

            // Realiza una solicitud AJAX para obtener los detalles del usuario y llenar el formulario
            $.ajax({
                url: '/usuarios/' + userId + '/edit',
                method: 'GET',
                success: function(response) {
                    // Rellenar el formulario en el modal con los datos del usuario
                    console.log(response);
                    console.log(response);
                    $('#editar_rut').val(response.usuario.rut);
                    $('#editar_rol').val(response.usuario.rol);
                    $('#editar_nom_usuario').val(response.usuario.nom_usuario);
                    $('#editar_nombre').val(response.usuario.nombre);
                    $('#editar_apellido').val(response.usuario.apellido);
                    $('#editar_fono').val(response.usuario.fono);
                    $('#editar_direccion').val(response.usuario.direccion);
                    $('#editar_correo').val(response.usuario.correo);

                    // Configurar la acción del formulario para la actualización
                    $('#formularioEditarUsuario').attr('action', '/usuarios/' + userId);
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener los detalles del usuario', xhr.responseText);
                }
            });
        });

        // Agrega esto dentro del evento submit del formulario
        $('#formularioEditarUsuario').on('submit', function(e) {
            e.preventDefault();

            var userId = $('#editarUsuarioModal').data('userId');

            $.ajax({
                url: '/usuarios/' + userId,
                method: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    rut: $('#editar_rut').val(),
                    rol: $('#editar_rol').val(),
                    nom_usuario: $('#editar_nom_usuario').val(),
                    nombre: $('#editar_nombre').val(),
                    apellido: $('#editar_apellido').val(),
                    fono: $('#editar_fono').val(),
                    direccion: $('#editar_direccion').val(),
                    correo: $('#editar_correo').val()
                },
                success: function(response) {
                    // Cerrar el modal
                    $('#editarUsuarioModal').modal('hide');
                    
                    // Mostrar un mensaje de éxito con SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Cambios realizados con éxito',
                        showConfirmButton: false,
                        timer: 1500,
                        didClose: function() {
                            // Recargar la página después de que se cierra SweetAlert
                            location.reload();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error al actualizar el usuario', xhr.responseText);
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">
</script>
</body>
</html>
                        