<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
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
        }


        .form-container {
            max-width: 800px;
            
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
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
                @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/login">Iniciar sesión</a>
                        </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Estadísticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias.create') }}">Categorías</a>
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
                @endauth
            </ul>
        </nav>
        <a class="btn" href="#"><button>Contacto</button></a>
    </header>
    @auth
        <section class="vh-100">
            <div class="form-container" style="margin-top:100px">
                <h2 class="mb-4">Crear Categoria</h2>
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom_categoria" class="form-label">Nombre de la Categoría:</label>
                                <input type="text" name="nom_categoria" id="nom_categoria" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn" style="background-color: #1b3039; color: white">Crear Categoría</button>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#existingCategoriesModal">
                                    Ver Categorías
                                </button>
                                <button style = "background-color: #fc9305; color: white" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#editarCategoriasModal">
                                    Editar Categorías
                                </button>
                                <!-- Botón para eliminar categoría -->
                                <a style="background-color: #A44848; color: white;" class="btn" data-bs-toggle="modal" data-bs-target="#eliminarCategoriasModal">Eliminar Categorias</a>

                            </div>
                        </form>
            </div>
            <!-- Modal para eliminar categorias -->
            <div class="modal fade" id="eliminarCategoriasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí mostrarás la lista de categorías con un formulario para seleccionar una y eliminarla -->
                            <form id="formEliminarCategoria">
                                <div class="mb-3">
                                    <label for="categoriasEliminarDropdown" class="form-label">Seleccionar Categoría a Eliminar</label>
                                    <select id="categoriasEliminarDropdown" class="form-select">
                                        <!-- Opciones de categorías se cargarán aquí con JavaScript -->
                                    </select>
                                </div>
                                <button type="button" class="btn btn-danger" onclick="eliminarCategoriaSeleccionada()">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal para editar categorias -->
            <div class="modal fade" id="editarCategoriasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Categorías</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Dropdown para seleccionar la categoría -->
                            <div class="mb-3">
                                <label for="categoriasDropdown" class="form-label">Seleccionar Categoría</label>
                                <select id="categoriasDropdown" class="form-select" onchange="cargarDetallesCategoria(this.value)">
                                    <!-- Aquí se cargarán las opciones de categorías con JavaScript -->
                                </select>
                            </div>
            
                            <!-- Formulario para editar categoría -->
                            <form id="editarCategoriaForm">
                                <!-- Campos de formulario para la edición -->
                                <div class="form-group">
                                    <label for="nom_categoria_editar" class="form-label">Nombre de la Categoría:</label>
                                    <input type="text" name="nom_categoria_editar" id="nom_categoria_editar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_editar" class="form-label">Descripción:</label>
                                    <textarea name="descripcion_editar" id="descripcion_editar" class="form-control"></textarea>
                                </div>
            
                                <!-- Botón para guardar cambios -->
                                <button type="button" class="btn btn-primary" onclick="guardarCambios()">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="existingCategoriesModal" tabindex="-1" aria-labelledby="existingCategoriesModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="existingCategoriesModalLabel">Categorías Actuales</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí, puedes mostrar la lista de categorías -->
                            <ul>
                                @foreach($categorias as $categoria)
                                    <li>{{ $categoria->nom_categoria }}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endauth

<!-- Script JavaScript y jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!--Script para eliminar categorias-->
<script>
    $('#eliminarCategoriasModal').on('show.bs.modal', function (e) {
        // Hacer una petición AJAX para obtener las categorías desde el servidor
        $.ajax({
            url: '{{ route("api.categorias") }}',
            method: 'GET',
            success: function (data) {
                // Limpiar el dropdown antes de agregar nuevas opciones
                $('#categoriasEliminarDropdown').empty();

                // Agregar las nuevas opciones al dropdown
                data.forEach(function (categoria) {
                    $('#categoriasEliminarDropdown').append($('<option>', {
                        value: categoria.id_categoria,
                        text: categoria.nom_categoria
                    }));
                });
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error al cargar las categorías:', error);
            }
        });
    });
    
    function eliminarCategoriaSeleccionada() {
    // Utiliza SweetAlert2 para mostrar un mensaje de confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'No podrás revertir esto.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Aquí puedes hacer una petición AJAX para eliminar la categoría con el ID seleccionado
            var categoriaId = $('#categoriasEliminarDropdown').val();
            $.ajax({
                url: '{{ url("api/categorias") }}/' + categoriaId, // Ajusta la ruta según tu configuración
                method: 'DELETE',
                data: {
                    id_categoria: categoriaId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Ejemplo de mensaje de éxito con SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminada',
                        text: 'La categoría ha sido eliminada exitosamente.',
                    }).then(() => {
                        // Cierra el modal después de eliminar la categoría si es necesario
                        $('#eliminarCategoriasModal').modal('hide');
                        // Recarga la página
                        location.reload(true);
                    });
                },
                error: function (xhr, textStatus, errorThrown) {
                    // Manejar el error aquí
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Error desconocido';

                    console.error('Error al eliminar la categoría:', errorMessage);

                    // Muestra el mensaje de error al usuario
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                    });
                }
            });
        }
    });
}


</script>
<script>
    // Función para cargar las categorías en el dropdown
    function cargarCategorias() {
        // Hacer una petición AJAX para obtener las categorías desde el servidor
        $.ajax({
            url: '{{ route("api.categorias") }}',
            method: 'GET',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
                // Limpiar el dropdown antes de agregar nuevas opciones
                $('#categoriasDropdown').empty();

                // Agregar la opción por defecto al dropdown
                $('#categoriasDropdown').append($('<option>', {
                    value: '',
                    text: 'Seleccionar categoría'
                }));
                // Agregar las nuevas opciones al dropdown
                data.forEach(function (categoria) {
                    $('#categoriasDropdown').append($('<option>', {
                        value: categoria.id_categoria,
                        text: categoria.nom_categoria
                    }));
                });
            },
            error: function (error) {
                console.error('Error al cargar las categorías:', error);
            }
        });
    }
    function cargarDetallesCategoria(categoriaId) {
        $.ajax({
            url: '/api/categorias/' + categoriaId, // Cambia la URL según tu configuración
            type: 'GET',
            success: function (data) {
                // Mostrar los detalles en el formulario de edición
                $('#nom_categoria_editar').val(data.nom_categoria);
                $('#descripcion_editar').val(data.descripcion);
            },
            error: function (error) {
                console.log('Error al cargar detalles de la categoría:', error);
            }
        });
    }
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    function guardarCambios() {
        var categoriaId = $('#categoriasDropdown').val();

        if (!categoriaId) {
            // Utilizar SweetAlert para mostrar un mensaje de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, selecciona una categoría antes de guardar los cambios.',
            });
            return;
        }

        var nomCategoria = $('#nom_categoria_editar').val();
        var descripcion = $('#descripcion_editar').val();

        $.ajax({
    url: '{{ route("api.categorias.guardar") }}',
    method: 'POST',
    data: {
        id_categoria: categoriaId,
        nom_categoria: nomCategoria,
        descripcion: descripcion,
        _token: csrfToken
    },
    success: function (response) {
        console.log('Respuesta exitosa:', response);

        // Utilizar SweetAlert para mostrar un mensaje de éxito
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Cambios guardados con éxito',
        }).then(() => {
            // Cerrar el modal
            $('#editarCategoriasModal').modal('hide');

            // Recargar la página para asegurarte de que los cambios se reflejen
            window.location.reload();
        });
    },
    error: function (error) {
        console.error('Error al guardar los cambios:', error);

        // Utilizar SweetAlert para mostrar un mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema al guardar los cambios. Por favor, inténtalo de nuevo.',
        });
    }
});
    }


    // Cuando se abre el modal, cargar las categorías
    $('#editarCategoriasModal').on('shown.bs.modal', function (e) {
        cargarCategorias();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>
</html>