<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Energia Natural</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #a8edea, #fed6e3); /* Degradado de colores frescos */
            color: #4a4a4a;
            background-attachment: fixed;
        }

        header {
            background-color: #343a40; /* Color gris claro */
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .instagram-logo img {
            max-height: 30px;
            cursor: pointer;
        }

        .brand img {
            max-height: 40px;
            margin-right: 10px;
        }

        .header-content {
            display: flex;
            align-items: center;
        }

        .btn {
            background-color: #42CE73; /* Color gris azulado */
            border-color: #42CE73;
        }

        .btn-cart {
            margin-right: 20px; /* Ajusta el margen derecho del botón del carrito según sea necesario */
            color: red;
        }

        .btn:hover {
            background-color: #42CE73; /* Color gris azulado más oscuro al pasar el ratón */
            border-color: #3d312e;
        }

        .dropdown {
            position: relative;
            display: inline-block;
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

        .login-container {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom:100px
        }

        .login-container h3 {
            letter-spacing: 1px;
            margin-bottom: 20px;
            color: #4a4a4a;
        }

        .login-container label {
            color: #4a4a4a;
            font-size: 14px; 
        }

        .login-container .form-control {
            margin-bottom: 10px;
            font-size:14px
        }

        .login-container .btn-primary {
            background-color: #42CE73;
            color: #eceff1;
            font-size: 20px;
            width: 100%;
        }

        .login-container .btn-primary:hover {
            background-color: #42CE73;
        }

        .login-container a {
            color: #eceff1;
            font-size: 20px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
        
        .reglas{
            font-size: 1.1em;
            color: #ff0000;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <a href="/Energia Natural" style="font-family: 'Roboto', sans-serif; font-size: 16px; text-decoration: none; color: white; text-align: left; margin-left: 10px;">
            <i class="fas fa-store" style="margin-right: 5px;"></i> Tienda
        </a>
        <div class="header-content" style="float: right; margin-right: 10px;">
            <div class="social-dropdown" style="float: left; margin-right: 10px;">
                <a class="instagram-logo" href="https://www.instagram.com/energia._natural/" target="_blank">
                    <img src="{{asset('images/instagram.png')}}" alt="Logo de Instagram" style="filter: brightness(0) invert(1);">
                </a>
            </div>
    
            <!-- Agregar logos para iniciar sesión y registrarse -->
            <a href="/login" style="color: white; text-decoration: none; margin-right: 10px;">
                <i class="fas fa-sign-in-alt" style="margin-right: 5px;"></i> Iniciar sesión
            </a>
            <div class="divider" style="float: left; border-right: 1px solid white; height: 20px; margin-right: 10px;"></div>
            <a href="/register" style="color: white; text-decoration: none; margin-left: 10px;">
                <i class="fas fa-user-plus" style="margin-right: 5px;"></i> Registrarse
            </a>
        </div>
    </header>
    

    <div class="container mt-4">
        <div class="login-container p-4">
          <form method="POST" action="/register" >
            @csrf
            @include('layouts.partials.messages')
            <h3 class="fw-normal mb-3 pb-2" style="letter-spacing: 1px;">Crear cuenta</h3>

            <div class="form-outline mb-2">
                <label class="form-label" for="rut">* Rut (sin puntos ni guión)</label>
                <input value="{{ old('rut') }}"type="text" required maxlength="12" id="rut" name ="rut" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="nom_usuario">* Nombre de Usuario</label>
                <input value="{{ old('nom_usuario') }}" required maxlength="30" type="text" id="nom_usuario"name ="nom_usuario" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="nombre">* Nombre</label>
                <input value="{{ old('nombre') }}"type="text" required maxlength="100" id="nombre" name ="nombre"class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="apellido">* Apellido</label>
                <input value="{{ old('apellido') }}"type="text" required maxlength="80" id="apellido"name="apellido" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example27">* Contraseña</label>
                <input value="{{ old('password') }}"type="password" required maxlength="255" id="password" name="password" class="form-control form-control-lg" />
                
            </div>
            <div class="form-outline mb-2">
              <label class="form-label" for="form2Example27">* Confirmar contraseña</label>
              <input type="password" id="password_confirmation" required maxlength="255" name="password_confirmation" class="form-control form-control-lg" />
            <div class="form-outline mb-2">
                <label class="form-label" for="fono">Teléfono (opcional)</label>
                <input value="{{ old('fono') }}" maxlength="12" type="text" id="fono" name="fono" class="form-control form-control-lg" />
            </div>
        
            <div class="form-outline mb-2">
                <label class="form-label" for="direccion">Dirección (opcional)</label>
                <input value="{{ old('direccion') }}" maxlength="50" type="text" id="direccion" name="direccion" class="form-control form-control-lg" />
            </div>
          </div>
            <div class="form-outline mb-2">
              <label class="form-label" for="correo">* Email</label>
              <input value="{{ old('correo') }}" required maxlength="100" type="email" id="correo" name="correo"class="form-control form-control-lg" />
              
            </div>
            <p class="reglas">Los campos marcados en (*) son obligatorios</p>
            <div class="pt-2">
              <button style="background-color: #42CE73; color: #eceff1; font-size:18px;" class="btn btn-lg btn-block" type="submit">Registrarse</button>
              <a href="/login" style="background-color: #42CE73; color: #eceff1; font-size:18px;" class="btn btn-lg btn-block" type="button">Login</a>
          </div>
          </form>
        </div>
    </div>

    <div class="footer">
        © 2023 Cuarzos Energía Natural - Tienda en línea
    </div>

    <!-- Bootstrap JS (opcional, dependiendo de tus necesidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS (para iconos) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
        window.addEventListener('pageshow', function (event) {
            // Si el evento de pageshow es causado por retroceder en el historial
            if (event.persisted) {
                location.reload();
            }
        });
    </script>
</body>

</html>


