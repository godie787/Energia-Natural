<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            max-width: 600px;
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
                        <a class="nav-link active" aria-current="page" href="#">Ver Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login">Iniciar sesión</a>
                    </li>
                @endguest
                @auth
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
                        <a class="nav-link active" aria-current="page" href="{{ route('categorias.create') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                
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
    <div style="margin-top:60px" class="form-container">
        <h2 class="mb-4">Crear nuevo producto</h2>
        @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                </div>
        @endif
        <form id="formulario-producto" action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom_producto" class="form-label">Nombre del Producto</label>
                <input type="text" name="nom_producto" id="nom_producto" class="form-control" value="{{ old('nom_producto') }}" required>
                @error('nom_producto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
                @error('id_categoria')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="precio_venta" class="form-label">Precio de Venta</label>
                <input type="number" name="precio_venta" id="precio_venta" class="form-control" step="0.01" value="{{ old('precio_venta') }}" required>
                @error('precio_venta')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input accept="image/jpeg" type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg" required>
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="estado" class="form-label">Estado (Disponibilidad)</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>No Disponible</option>
                </select>
                @error('estado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <button type="submit" class="btn" style="background-color: #1b3039; color: white;">Crear Producto</button>
        </form>
        
    </div>
    @endauth
    
    
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
