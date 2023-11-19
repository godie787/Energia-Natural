<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuarzos Energía Natural</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
           
            color: #4a4a4a;
            background-attachment: fixed;
        }
        header {
            background-color: #343a40;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo img {
            max-height: 40px;
        }

        .instagram-logo img {
            max-height: 30px;
            cursor: pointer;
        }

        .brand {
            display: flex;
            align-items: center;
        }

        .brand img {
            max-height: 40px;
            margin-right: 10px;
        }
        .header-content {
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-left: auto;
        }
        .header a {
            color: #4a4a4a;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }
        .container {
            margin-bottom: 70px;
            margin-top: 50px; /* Ajusta el margen superior según tus necesidades */
            overflow-y: auto;
        }
        .product-card {
            border: 1px solid #ddd;
            text-align: center;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: #f8f9fa; /* Fondo gris claro */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efecto de sombra difuminada gris */
            transition: box-shadow 0.3s ease;
        }
        .precio {
            font-weight: bold; /* Opcional: Darle más énfasis al precio */
            margin-top: 20px; /* Ajusta según sea necesario */
            font-size: 14px;
            margin-bottom: 3px;
        }

        .product-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2), 0 15px 50px rgba(0, 0, 0, 0.3); /* Efecto de sombra más pronunciado al pasar el ratón */
        }


        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .btn {
            background-color: #9f3d6b; /* Color gris azulado */
            border-color: #9f3d6b;
            color: white;
            
        }

        .btn:hover {
            background-color: #7c2a50;
            border-color: #7c2a50;
            color: white;
        }

        .btn-cart {
            margin-right: 20px; /* Ajusta el margen derecho del botón del carrito según sea necesario */
            color: red;
        }

        

        .btn-secondary,
        .btn-danger {
            color: #b8e0d2; /* Color blanco para el texto de estos botones */
        }

        .btn-secondary,
        .btn-danger,
        .btn-secondary:hover,
        .btn-danger:hover {
            transition: background-color 0.3s ease;
        }

        .btn-secondary {
            background-color: #90a4ae; /* Color gris azulado más oscuro */
            border-color: #90a4ae;
        }

        .btn-secondary:hover {
            background-color: #6b7b85; /* Color gris azulado aún más oscuro al pasar el ratón */
            border-color: #6b7b85;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .social-dropdown {
            display: flex;
            align-items: center;
            margin-right: 10px; /* Ajusta el margen derecho según sea necesario */
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            overflow: hidden;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #4a4a4a;
            transition: transform 0.3s ease;
            border-bottom: 1px solid #ddd;
        }
        .dropdown-item:last-child {
            border-bottom: none; /* Evita la línea divisoria en el último elemento */
        }
        .dropdown-item:hover {
            transform: scale(1.05); /* Aumentamos ligeramente el tamaño al pasar el puntero */
        }
        .divider {
            border-left: 1px solid white;
            height: 20px; /* Ajusta la altura según tus necesidades */
            margin: 0 10px; /* Ajusta el margen según tus necesidades */
        }

        .btn-white-margin {
            color: #ffffff; /* Color blanco */
            margin-left: 10px;
            margin-right: 30px; /* Ajusta el margen derecho según tus necesidades */
        }
        .btn-no-bg-text {
            background-color: transparent; /* Fondo transparente */
            border: none; /* Sin borde */
            color: white; /* Color del texto */
        }

        .footer {
            background-color: #343a40; /* Color gris claro */
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000; /* Ajusta el índice z para que esté por encima de otros elementos */
        }
        .header-link {
        color: white;
        text-decoration: none;
        margin: 0 10px;
        font-size: 18px;
    }

    .header-link:hover {
        color: #d1cecf; /* Cambia el color al pasar el ratón sobre el enlace */
    }
        

    </style>
</head>

<body>
    <header>
        <div class="header-content">
            <a href="/tienda" class="header-link">Tienda</a>
            <div class="social-dropdown">
                <a class="instagram-logo" href="https://www.instagram.com/energia._natural/" target="_blank">
                    <img src="{{asset('images/instagram.png')}}" alt="Logo de Instagram">
                </a>
                <div class="dropdown">
                    
                    <button class=" btn-no-bg-text dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ $user->nombre }}
                    </button>
                    <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/perfil"><i class="far fa-user"></i> Mi Perfil</a>
                        <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                    </div>
            </div>
            </div>
            <div class="divider"></div>
            <a href="/carrito" class="btn-white-margin"><i id="carrito-icon" class="fas fa-shopping-cart"></i></a>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Mi Perfil</div>

                    <div class="card-body">
                        <!-- Formulario para mostrar y editar datos del usuario -->
                        <form method="POST" action="{{ url('/perfil') }}" id="perfilForm">
                            @csrf
                            @method('PUT')
                            @include('layouts.partials.messages')
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" value="{{ $user->nom_usuario }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->nombre }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección (Calle, numero y  Comuna)</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $user->direccion }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="fono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="fono" name="fono" value="{{ $user->fono }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="{{ $user->correo }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Deja en blanco para mantener la actual">
                            </div>
                            <button type="button" class="btn" id="btnActualizarPerfil">Actualizar Perfil</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        © 2023 Cuarzos Energía Natural - Tienda en línea
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var btnActualizarPerfil = document.getElementById('btnActualizarPerfil');
    
            if (btnActualizarPerfil) {
                btnActualizarPerfil.addEventListener('click', function () {
                    console.log('Botón clickeado');
    
                    var perfilForm = document.getElementById('perfilForm');
                    
                    if (perfilForm) {
                        console.log('Formulario encontrado');
    
                        if (confirm('¿Estás seguro de que deseas actualizar tu perfil?')) {
                            console.log('Confirmación aceptada');
                            perfilForm.submit();
                        } else {
                            console.log('Confirmación cancelada');
                        }
                    } else {
                        console.log('Formulario no encontrado');
                    }
                });
            } else {
                console.log('Botón no encontrado');
            }
        });
    </script>

    
</body>
</html>