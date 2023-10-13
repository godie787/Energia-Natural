<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Energia Natural</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset("images/fondo.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .nav-item {
            display: inline-block;
            margin-right: 20px;
        }

        .table-container {
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Agregado para permitir desplazamiento horizontal en dispositivos pequeños */
        }

        .table {
            width: 100%;
            max-width: 100%; /* Modificado para ocupar el 100% del contenedor */
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            white-space: nowrap; /* Agregado para evitar el corte de texto en las celdas */
        }

        .table th {
            background-color: #1b3039;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table img {
            max-width: 50px;
            max-height: 50px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('images/logo_empresa.JPG') }}" alt="Logo de la marca">
        </div>
        
        <nav>
            <ul class="nav-links">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Estadísticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('categorias.create') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <!-- Enlace para abrir el formulario de creación de productos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            {{ $user->nombre }}
                        </a>
                        <ul class="dropdown-menu" style="padding-top:0px; padding-bottom:5px;padding-right:0px;">
                            <a href="/logout" class="nav-link active" aria-current="page"
                               style="color:black; font-size:17px; margin-left:20px; margin-bottom:0px;margin-top:10px;">Cerrar
                                sesión</a>
                        </ul>
                    </li>
                
    
            </ul>
        </nav>
        <a class="btn" href="#"><button>Contacto</button></a>
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
                                <a href="#" class="btn btn-primary editar-btn" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal" data-id="{{ $usuario->rut }}">Editar</a>
                                <form id="eliminarForm{{ $usuario->rut }}" action="{{ route('usuarios.destroy', $usuario->rut) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" class="btn btn-danger eliminar-btn" data-id="{{ $usuario->rut }}">Eliminar</a>
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
                                            <div class="form-group">
                                                <label for="editar_rut">RUT:</label>
                                                <input type="number" class="form-control" name="rut" id="editar_rut" value="{{ $listadoUsuarios->first()->rut }}" required>
                                            </div>

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
    <!-- Script para manejar eventos de botones y llenar el formulario -->
    

    <!-- Script para manejar eventos de botones y llenar el formulario -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">
</script>
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




    
    
</body>
</html>
                        