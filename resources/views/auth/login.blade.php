<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Energia Natural</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        /* Formulario*/
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .login-container h3 {
            letter-spacing: 1px;
            margin-bottom: 20px;
            color: #4a4a4a;
        }

        .login-container label {
            color: #4a4a4a;
        }

        .login-container .form-control {
            margin-bottom: 15px;
        }

        .login-container .btn-primary {
            background-color: #9f3d6b;
            border-color: #9f3d6b;
            width: 100%;
        }

        .login-container .btn-primary:hover {
            background-color: #7c2a50;
            border-color: #7c2a50;
        }

        .login-container a {
            color: #393f81;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
    
    
<div class="container mt-5">
  <div class="login-container">
      <form action="/login" method="POST">
          @csrf

          <h3 class="fw-normal mb-3 pb-3">Iniciar sesión</h3>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          <div class="form-outline mb-4">
              <label class="form-label" for="nom_usuario">Nombre de Usuario o Email</label>
              <input type="text" id="nom_usuario" maxlength="100" name="nom_usuario" class="form-control form-control-lg" required />
          </div>

          <div class="form-outline mb-4">
              <label class="form-label" for="password">Contraseña</label>
              <input type="password" id="password" maxlength="255" name="password" class="form-control form-control-lg" required />
          </div>

          <div class="pt-1 mb-4">
              <button class="btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
          </div>

          <p class="mb-5 pb-lg-2">No tienes una cuenta? <a href="register">Registrate aquí</a></p>
      </form>
  </div>
</div>
    <div class="footer">
      © 2023 Cuarzos Energía Natural - Tienda en línea
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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


