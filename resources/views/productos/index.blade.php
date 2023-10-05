<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Home</title>
    <style>
        body {
            background-color: #e8e8e8;
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
    <!-- Navbar -->
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
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('categorias.create') }}">Crear una nueva categoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('productos.index') }}">Ver productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('productos.form') }}">Agregar Productos</a>
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

    <section class="vh-100">
        @auth
        <div class="table-container" style="margin-top:60px;">
            <h2 class="mb-4">Lista de Productos</h2>
            @if(session('success'))
                <div class="alert alert-success mb-3">
                    {{ session('success') }}
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
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Precio de Venta</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
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
                                <a style = "background-color: #fc9305;
                                color: white;"href="{{ route('productos.editar', ['id_producto' => $producto->id_producto]) }}" class="btn">Editar</a>

                                <form id="delete-form-{{ $producto->id }}" action="{{ route('productos.destroy', ['id_producto' => $producto->id_producto]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a style = "background-color: #A44848;
                                color: white;" href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este producto?')) { document.getElementById('delete-form-{{ $producto->id }}').submit(); }" class="btn">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endauth
        
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</body>
</html>
