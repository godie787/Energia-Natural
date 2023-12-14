<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            width: 40%; /* Cambia el porcentaje según tus necesidades */
            margin-left: 15%; /* Centra la tabla en el contenedor */

            margin-top: 60px;

        }

        .reglas{
            font-size: 1.1em;
            color: #ff0000;
            font-weight: bold;
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
        <a href="#" class="btn btn-contact">
            <button style="background-color: #666; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                Contacto
            </button>
        </a>
    </header>
    @auth
        <section >
            <div class="table-container" >
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
                                <label for="nom_categoria" class="form-label">* Nombre de la Categoría:</label>
                                <input type="text" name="nom_categoria" placeholder="max 50 caracteres" maxlength="50" id="nom_categoria" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" placeholder="Detalles, max 80 caracteres" maxlength="80" class="form-control"></textarea>
                            </div>
                            <br>
                            <p class="reglas">Los campos marcados en (*) son obligatorios</p>
                            <div>
                                <button type="submit" class="btn" style="background-color: #3498db; color: white">Crear Categoría</button>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#existingCategoriesModal">
                                    Ver Categorías
                                </button>
                                <button style = "background-color: #fc9305; color: white" class="btn" type="button" data-bs-toggle="modal" data-bs-target="#editarCategoriasModal">
                                    Editar Categorías
                                </button>
                                <!-- Botón para eliminar categoría -->
                                <a style="background-color: #e74c3c; color: white;" class="btn" data-bs-toggle="modal" data-bs-target="#eliminarCategoriasModal">Eliminar Categorias</a>

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
                                    <textarea name="descripcion_editar" id="descripcion_editar" class="form-control" maxlength="80" placeholder="max 80 caracteres" ></textarea>
                                </div>
                                <br>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-hHIBIIqHsL/2+X1wnxDzx2e3X3Z5o76A9KKlqniDzlg9j/Ra9tB1j3tXsjBzbm49" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>