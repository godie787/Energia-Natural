
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
    <section class="table-container">
        @auth
        <div class="form-container">
            <h2 class="mb-4">Editar producto</h2>
            @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                    </div>
            @endif
            <form action="{{ route('productos.update', ['id_producto' => $producto->id_producto]) }}" method="POST" enctype="multipart/form-data" id="formulario-editar-producto">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nom_producto" class="form-label">* Nombre del Producto</label>
                    <input type="text" name="nom_producto" maxlength="50" id="nom_producto" class="form-control" value="{{ $producto->nom_producto }}" required>
                </div>

                <div class="form-group">
                    <label for="id_categoria" class="form-label">* Categoria</label>
                    <select name="id_categoria" id="id_categoria" class="form-control" required>
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nom_categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" placeholder="Detalles, max 30 caracteres" maxlength="30" class="form-control">{{ $producto->descripcion }}</textarea>
                </div>

                <div class="form-group">
                    <label for="precio_venta" class="form-label">* Precio de Venta</label>
                    <input value="{{ $producto->precio_venta }}" type="number" name="precio_venta" id="precio_venta" class="form-control" step="0.01" required>
                    <div id="mensajePrecio" style="color: red;"></div>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                
                    @if($producto->imagen)
                        <div class="mb-2">
                            <a data-fancybox="gallery" href="{{ asset('storage/' . $producto->imagen) }}">
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nom_producto }}" style="max-width: 100px;">
                            </a>
                        </div>
                    @endif
                
                    <div class="input-group">
                        <input accept="image/jpeg" type="file" class="form-control" id="imagen" name="imagen">
                        <label class="input-group-text" for="imagen"></label>
                    </div>
                
                    <small class="form-text text-muted">Puedes seleccionar una nueva imagen o dejarla como está.</small>
                </div>

                <div class="form-group">
                    <label for="estado" class="form-label">* Estado (Disponibilidad)</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="1" {{ $producto->estado ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ !$producto->estado ? 'selected' : '' }}>No Disponible</option>
                    </select>
                </div>
                <br>
                <p class="reglas">Los campos marcados en (*) son obligatorios</p>
                <div style="text-align: right;">
                    <button type="button" onclick="window.location.href='{{ route('productos.index') }}'" class="btn btn-secondary" >Volver a Productos</button>
                    <button type="submit" class="btn" style="background-color: #3498db; color: white;">Guardar Cambios</button>
                </div>
                
            </form>
            
        </div>
        @endauth
        
        
    </section>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("Script cargado correctamente.");
    
            document.getElementById("formulario-editar-producto").addEventListener("submit", function (event) {
                var precio = document.getElementById("precio_venta").value;
        
                if (isNaN(precio) || parseFloat(precio) < 0) {
                    document.getElementById("mensajePrecio").innerHTML = "El precio no puede ser negativo";
                    event.preventDefault(); // Evitar que el formulario se envíe si la validación falla
                } else {
                    document.getElementById("mensajePrecio").innerHTML = "";
                }
            });
        });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</body>
</html>