<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cuarzos Energía Natural - Tienda en línea</title>

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
        #imageCarousel {
            width: 70%; /* Ajusta el ancho según tus necesidades */
            margin: auto; /* Centra el carrusel horizontalmente */
            margin-top: 20px; /* Agrega un margen superior de 20px */
            
            border-radius: 10px; /* Agrega esquinas redondeadas */
            overflow: hidden; /* Oculta cualquier contenido que se desborde */
        }

        #imageCarousel img {
            width: 100%;
            height: 600px; /* Ajusta la altura según tus necesidades */
            object-fit: cover;
            border-bottom: 2px solid #ddd; /* Línea divisoria entre las imágenes */
        }

        .carousel-inner {
            border-radius: 8px; /* Esquinas redondeadas para el contenedor interno del carrusel */
        }
        .container {
            margin-bottom: 70px;
            margin-top: 50px; /* Ajusta el margen superior según tus necesidades */
            overflow-y: auto;
        }



        .product-card {
            border: none; /* Elimina el borde original */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: #f8f9fa; /* Fondo gris claro */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efecto de sombra difuminada gris */
            transition: box-shadow 0.3s ease;
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

    </style>
</head>

<body>
    <header>
        <div>
        </div>
        <div class="header-content">
            <div class="social-dropdown">
                <a class="instagram-logo" href="https://www.instagram.com/energia._natural/" target="_blank">
                    <img src="{{asset('images/instagram.png')}}" alt="Logo de Instagram">
                </a>
                <div class="dropdown">
                    <button class=" btn-no-bg-text dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Mi Cuenta
                    </button>


                    <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"><i class="far fa-user"></i> Mi Perfil</a>
                        <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <a href="#" class="btn-white-margin"><i class="fas fa-shopping-cart"></i></a>

        </div>
    </header>
    
    
    
    

    <!-- Carrusel de imágenes -->
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/cristal de cuarzo.JPG') }}" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/cuarzo rosado 2.JPG') }}" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/drusa.JPG') }}" class="d-block w-100" alt="Imagen 3">
            </div>
            <!-- Agrega más imágenes según sea necesario -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ asset('images/cristal de cuarzo.JPG') }}" alt="Producto 1">
                    <h5>Producto 1</h5>
                    <p>Descripción corta del producto.</p>
                    <button class="btn"><i class="fas fa-shopping-cart"></i> Agregar al Carrito</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ asset('images/cristal de cuarzo.JPG') }}" alt="Producto 2">
                    <h5>Producto 2</h5>
                    <p>Descripción corta del producto.</p>
                    <button class="btn"><i class="fas fa-shopping-cart"></i> Agregar al Carrito</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ asset('images/cristal de cuarzo.JPG') }}" alt="Producto 3">
                    <h5>Producto 3</h5>
                    <p>Descripción corta del producto.</p>
                    <button class="btn"><i class="fas fa-shopping-cart"></i> Agregar al Carrito</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ asset('images/cristal de cuarzo.JPG') }}" alt="Producto 1">
                    <h5>Producto 1</h5>
                    <p>Descripción corta del producto.</p>
                    <button class="btn"><i class="fas fa-shopping-cart"></i> Agregar al Carrito</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ asset('images/cristal de cuarzo.JPG') }}" alt="Producto 1">
                    <h5>Producto 1</h5>
                    <p>Descripción corta del producto.</p>
                    <button class="btn"><i class="fas fa-shopping-cart"></i> Agregar al Carrito</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ asset('images/cristal de cuarzo.JPG') }}" alt="Producto 1">
                    <h5>Producto 1</h5>
                    <p>Descripción corta del producto.</p>
                    <button class="btn"><i class="fas fa-shopping-cart"></i> Agregar al Carrito</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        © 2023 Cuarzos Energía Natural - Tienda en línea
    </div>

    <!-- Bootstrap JS (opcional, dependiendo de tus necesidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS (para iconos) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>
