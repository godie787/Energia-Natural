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
                        <a class="nav-link" href="{{ route('categorias.create') }}">Categorias</a>
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
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#editarCategoriasModal">
                                    Editar Categorías
                                </button>
                            </div>
                        </form>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>