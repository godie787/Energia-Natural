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
            width: 30%; /* Cambia el porcentaje según tus necesidades */
            margin-left: 2%; /* Centra la tabla en el contenedor */

            margin-top: 40px;

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

    <section class="content">
        <div class="table-container">
            <h2>Editar Courier</h2>
            
            <!-- Mostrar mensajes de éxito o error si los hay -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Formulario de edición -->
            <form action="{{ route('courrier.update', ['id_courrier' => $courrier->id_courrier]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campos del formulario -->
                <div class="form-group">
                    <label for="nombre"> *Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $courrier->nombre }}" maxlength="50" placeholder="max 50 caracteres" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="direccion"> *Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $courrier->direccion }}" maxlength="80" placeholder="max 80 caracteres" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="fono"> *Teléfono:</label>
                    <input type="text" name="fono" id="fono" placeholder="569 123456789" maxlength="20" class="form-control" value="{{ $courrier->fono }}" required>
                </div>
                <br>
                <!-- Botón de enviar -->
                <p class="reglas">Los campos marcados en (*) son obligatorios</p>
                <div class="d-flex">
                    <a href="{{ route('courrier.agregar') }}" class="btn btn-secondary me-2 ">Volver a Couriers</a>
                    <button type="submit" class="btn" style="background-color: #3498db; color: white">Guardar cambios</button>
                </div>
                
                
            </form>
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>