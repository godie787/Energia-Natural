
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
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

            margin-top: 60px;

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

    <section class="vh-100">
        @auth
        <div class="table-container" style="margin-top:60px;">
            <h2 class="mb-4">Lista de Productos <button class="btn" data-bs-toggle="modal" data-bs-target="#crearProductoModal" style=" background-color: #1b3039;
                color: white; margin-left: 10px;">Crear un nuevo Producto</button></h2>
            @if(session('success'))
                <div class="alert alert-success mb-3">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger mb-3">
                    {{ session('error') }}
                </div>
            @endif
            <div class="mb-3">
                <form action="{{ route('productos.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input placeholder="Buscar por nombre" type="text" name="search_nombre" id="search_nombre" class="form-control" value="{{ request('search_nombre') }}">
                        </div>
                        <div class="col-md-4">
                            <select name="search_categoria" id="search_categoria" class="form-control">
                                <option value="all">Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nom_categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn" style="background-color: #1b3039;
                            color: white;">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 100px;">ID Producto</th>
                        <th style="width: 200px;">Nombre</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th style="width: 200px;">Precio venta</th>
                        <th style="width: 200px;">Imagen</th>
                        <th style="width: 200px;">Estado</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id_producto }}</td>
                            <td>{{ $producto->nom_producto }}</td>
                            <td>{{ $producto->categoria->nom_categoria }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio_venta }}</td>
                            <td class="align-middle text-center">
                                <a data-fancybox="gallery" href="{{ asset('storage/' . $producto->imagen) }}">
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nom_producto }}" style="max-width: 100px;">
                                </a>
                            </td>
                            <td>{{ $producto->estado ? 'Disponible' : 'No Disponible' }}</td>
                            <td>
                                <div style="display: flex; gap: 10px;">
                                    <a style="flex: 1; background-color: #3498db; color: white; padding: 8px 12px; text-align: center; text-decoration: none;" href="{{ route('productos.editar', ['id_producto' => $producto->id_producto]) }}" class="btn">Editar</a>
                            
                                    <form id="delete-form-{{ $producto->id_producto }}" action="{{ route('productos.destroy', ['id_producto' => $producto->id_producto]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                            
                                    <a style="flex: 1; background-color: #e74c3c; color: white; padding: 8px 12px; text-align: center; text-decoration: none;" href="#" onclick="event.preventDefault(); console.log('Intentando eliminar producto {{ $producto->id_producto }}'); if(confirm('¿Estás seguro de que deseas eliminar este producto?')) { document.getElementById('delete-form-{{ $producto->id_producto }}').submit(); }" class="btn">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endauth
        
    </section>
    <!-- Modal -->
    <div class="modal fade" id="crearProductoModal" tabindex="-1" role="dialog" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="crearProductoModalLabel">Crear nuevo producto</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" >

                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tu formulario aquí -->
                    
                    <form id="formulario-producto" action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nom_producto" class="form-label">Nombre del Producto (max: 50 caracteres)</label>
                            <input type="text" name="nom_producto" id="nom_producto" class="form-control" value="{{ old('nom_producto') }}" required>
                            <div id="mensajeNombre" style="color: red;"></div>
                        </div>
                    
                        <div class="form-group">
                            <label for="id_categoria" class="form-label">Categoría</label>
                            <select name="id_categoria" id="id_categoria" class="form-control" required>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                                        {{ $categoria->nom_categoria }}
                                    </option>
                                @endforeach
                            </select>
                            
                        </div>
                    
                        <div class="form-group">
                            <label for="descripcion" class="form-label">Descripción (max: 80 catacteres)</label>
                            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                            <div id="mensajeDescripcion" style="color: red;"></div>
                        </div>
                    
                        <div class="form-group">
                            <label for="precio_venta" class="form-label">Precio de Venta</label>
                            <input type="number" name="precio_venta" id="precio_venta" class="form-control" step="0.01" value="{{ old('precio_venta') }}" required>
                            <div id="mensajePrecio" style="color: red;"></div>
                        </div>
                    
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input accept="image/jpeg" type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg" required>
                            
                        </div>
                    
                        <div class="form-group">
                            <label for="estado" class="form-label">Estado (Disponibilidad)</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>Disponible</option>
                                <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>No Disponible</option>
                            </select>
                            
                        </div>
                    
                        <button type="submit" class="btn" style="background-color: #1b3039; color: white;">Crear Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("Script cargado correctamente.");
    
            document.getElementById("formulario-producto").addEventListener("submit", function (event) {
                var precio = document.getElementById("precio_venta").value;
                var nomProducto = document.getElementById("nom_producto").value;
                var descripcion = document.getElementById("descripcion").value;
    
                // Validar longitud del nombre del producto
                if (nomProducto.length > 50) {
                    document.getElementById("mensajeNombre").innerHTML = "50 caracteres como máximo";
                    event.preventDefault();
                    return;
                }else {
                    document.getElementById("mensajeNombre").innerHTML = "";
                }
    
                // Validar longitud de la descripción
                if (descripcion.length > 80) {
                    document.getElementById("mensajeDescripcion").innerHTML = "80 caracteres como máximo";
                    event.preventDefault();
                    return;
                }else {
                    document.getElementById("mensajeDescripcion").innerHTML = "";
                }
    
                // Validar precio
                if (isNaN(precio) || parseFloat(precio) < 0) {
                    document.getElementById("mensajePrecio").innerHTML = "El precio no puede ser negativo";
                    event.preventDefault(); // Evitar que el formulario se envíe si la validación falla
                    return;
                } else {
                    document.getElementById("mensajePrecio").innerHTML = "";
                }
            });
    
            // Función para mostrar mensajes de error
            function mostrarError(mensaje) {
                // Muestra el mensaje de error en el contenedor
                document.getElementById("mensajesError").innerHTML = mensaje;
            }
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</body>
</html>
