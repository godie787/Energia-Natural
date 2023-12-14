<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cuarzos Energía Natural</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS (asegúrate de que sea la misma versión que el CSS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
           
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
        }
        .header a {
            color: #4a4a4a; /* Color gris oscuro */
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
        .card-image {
            width: 100%;
            height: 200px; /* Ajusta la altura deseada */
            object-fit: cover; /* Esto recortará la imagen para que se ajuste al contenedor manteniendo las proporciones */
        }
        .search-section {
            background-color: #f8f9fa; /* Color de fondo */
            padding: 10px 0; /* Espaciado interno */
            
            margin-bottom: -5%;
            
        }

        .section-title {
            text-align: center;
            position: relative;
            margin-bottom: 20px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 30%;
            height: 2px;
            background-color: #9f3d6b; /* Color de la línea horizontal */
        }

        .search-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 10%;
            margin-bottom: 0%;
        }

        .search-dropdown {
            margin: 10px;
        }

        .search-select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .banner-container {
            position: relative;
            width: 100%;
            height: 400px; /* Ajusta la altura según tus necesidades */
            margin-bottom: 20px; /* Espaciado inferior */
        }

        .banner {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-bottom: 2px solid #ddd; /* Línea divisoria entre el banner y el contenido */
        }

        .banner-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff; /* Color del texto */
            font-size: 24px; /* Tamaño del texto */
            font-weight: bold; /* Peso de la fuente */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Sombra para mejorar la legibilidad */
        }

        /*cambiar el puntero al pasar por encima tel nombre o de la imagen*/
        .product-card:hover .product-image,
        .product-card:hover .product-title {
            cursor: pointer; /* Cambia el cursor al pasar el ratón */
        }
        #floating-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: rgba(159, 61, 107, 0.9); /* Color y opacidad modificados */
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
            transition: opacity 1.5s ease-out;
            cursor: pointer; /* Agregado para indicar que el mensaje es cliclable */
            text-decoration: none;
        }

        #floating-message:hover {
            background-color: rgba(159, 61, 107, 1); /* Color al pasar el ratón */
        }
        .modal-header {
        text-align: right; /* Alinea la 'X' y el título a la derecha */
    }

    .close {
        position: relative;
        font-size: 2rem; /* Ajusta el tamaño según tus preferencias */
        line-height: 1;
        color: transparent;
        background: none;
        border: 0;
        cursor: pointer;
        margin-right: 10px; /* Ajusta el margen según tus preferencias */
    }

    .close::before, .close::after {
        content: '\00d7'; /* Código Unicode para la 'X' */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-size: inherit;
        line-height: inherit;
        color: #000; /* Cambia el color según tus preferencias */
        opacity: 0.5; /* Ajusta la opacidad según tus preferencias */
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
    
    <!-- Banner con texto -->
    <div class="banner-container">
        <img src="{{ asset('images/banner6.jpeg') }}" class="banner" alt="Banner de Cuarzos Energía Natural">
        <div class="banner-text">
            <h2 style="color: #9f3d6b; font-size: 2.8em; font-weight: 300; font-family: 'Urbanist', sans-serif;  ">Cuarzos Energía Natural</h2>
            <p style="color: #424242; font-size: 1.2em; font-weight: 250;font-family: 'Nunito Sans', sans-serif;">Eleva tu espíritu, nutre tu alma.</p>
        </div>
    </div>
    <!-- Sección de búsqueda y filtrado -->
    <div class="search-section">
        <div class="container">
            <h2 style= "font-family: 'Nunito Sans', sans-serif;" class="section-title">Explora nuestros productos</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4">
                    <div class="product-card">
                        <img class="product-image" data-bs-toggle="modal" data-bs-target="#modalProducto{{ $producto->id_producto }}" src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nom_producto }}">
                        <h5 class="product-title" data-bs-toggle="modal" data-bs-target="#modalProducto{{ $producto->id_producto }}">{{ $producto->nom_producto }}</h5>
                        <p class="precio">${{ number_format($producto->precio_venta, 0, '.', '.') }}</p>
                        <button id="addToCartBtn" class="btn" style="margin-top: 5px;" onclick="addToCart()">
                            <i class="fas fa-shopping-cart"></i> Agregar al Carrito
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="carrito"></div>
    <div class="footer">
        © 2023 Cuarzos Energía Natural - Tienda en línea
    </div>
    <!--MODAL-->
    <!-- Modal HTML -->
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>

                    
                </div>
                <div class="modal-body">
                    <p>Por favor, inicia sesión para ver disponibilidad y agregar al carrito.</p>
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.href='/login'" type="button" class="btn btn-default">Iniciar sesión</button>
                    

                </div>
            </div>
        </div>
    </div>


    @foreach ($productos as $producto)
        <div class="modal fade" id="modalProducto{{ $producto->id_producto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $producto->nom_producto }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nom_producto }}" class="card-image">          
                        <p>{{ $producto->descripcion }}</p>
                        <p class="precio">Precio: ${{ number_format($producto->precio_venta, 0, '.', '.') }}</p>
                        <!-- Agrega cualquier otra información que desees mostrar -->

                        <!-- Puedes añadir un botón de "Agregar al carrito" aquí también si lo deseas -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach>
    <!--Ordenar por Categoria -->
    <script>
        function submitForme() {
            document.getElementById('filtroForm').submit();
        }
    </script>
    <!--Ordenar por Precio -->
    <script>
        function submitForm() {
            document.getElementById('ordenForm').submit();
        }
    </script>
    <script>
        function addToCart() {
            // Verificar si el usuario ha iniciado sesión
            if (usuarioHaIniciadoSesion()) {
                // Lógica para agregar al carrito
                console.log("Producto agregado al carrito");
            } else {
                // Mostrar el modal si no ha iniciado sesión
                $('#loginModal').modal('show');
            }
        }
    
        function usuarioHaIniciadoSesion() {
            // Lógica para verificar si el usuario ha iniciado sesión
            // Devuelve true si ha iniciado sesión, false si no ha iniciado sesión
            // Puedes personalizar esta función según tu sistema de autenticación
            return false;
        }
    </script>
</body>
</html>