<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cuarzos Energía Natural</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (para iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS (asegúrate de que sea la misma versión que el CSS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&family=Poppins:wght@500&display=swap">
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
        

    </style>
</head>

<body>
    
    <header>
        <a href="/tienda" style="font-family: 'Roboto', sans-serif; font-size: 16px; text-decoration: none; color: white; text-align: left; margin-left: 10px;">
            <i class="fas fa-store" style="margin-right: 5px;"></i> Tienda
        </a>
        <div class="header-content">
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
                        <a class="dropdown-item" href="/compras"><i class="fas fa-shopping-bag"></i> Mis Compras</a>
                        <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                        
                    </div>
            </div>
            </div>
            <div class="divider"></div>
            <a href="/carrito" class="btn-white-margin"><i id="carrito-icon" class="fas fa-shopping-cart"></i></a>
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
            <div class="search-container">
                <form id="ordenForm" action="{{ route('ordenar.productos') }}" method="GET">
                    <label for="orderSelect">Ordenar por:</label>
                    <select class="search-select" id="orderSelect" name="orden" onchange="submitForm()">
                        <option value="precioAsc">Todos los Precios</option>
                        <option value="precioAsc">Precio Ascendente</option>
                        <option value="precioDesc">Precio Descendente</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </form>
                <form id="filtroForm" action="{{ route('filtrar.productos') }}" method="GET">
                    <label for="categorySelect">Buscar por Categoría:</label>
                    <select class="search-select" id="categorySelect" name="categoria" onchange="submitForme()">
                        <option value="">Todas las Categorías</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id_categoria }}" {{ isset($categoriaSeleccionada) && $categoria->id_categoria == $categoriaSeleccionada ? 'selected' : '' }}>
                                {{ $categoria->nom_categoria }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
    <a href="/carrito" id="floating-message" onclick="$(this).fadeOut();">
        <span id="product-name"></span> agregado al carrito. Haz clic para ir al carrito.
    </a>

    <div class="container">
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4">
                    <div class="product-card">
                        <img class="product-image" data-bs-toggle="modal" data-bs-target="#modalProducto{{ $producto->id_producto }}" src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nom_producto }}">
                        <h5 class="product-title" data-bs-toggle="modal" data-bs-target="#modalProducto{{ $producto->id_producto }}">{{ $producto->nom_producto }}</h5>
                        <p class="precio">${{ number_format($producto->precio_venta, 0, '.', '.') }}</p>
                        @if ($producto->estado == 1)
                            <button class="btn" style="margin-top: 5px;" onclick="agregarAlCarrito('{{ $producto->id_producto }}', '{{ $producto->nom_producto }}', '{{ $producto->precio_venta }}', '{{ asset('storage/' . $producto->imagen) }}', this)">
                                <i class="fas fa-shopping-cart"></i> Agregar al Carrito
                            </button>
                        @else
                            <button class="btn" style="margin-top: 5px; color:red" disabled>No disponible</button>
                        @endif
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
        function agregarAlCarrito(productoId, nombre, precio, imagen, boton) {
            // Deshabilitar el botón para evitar múltiples clics
            boton.disabled = true;
    
            const producto = { id: productoId, nombre: nombre, precio: precio, imagen: imagen };
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.push(producto);
            localStorage.setItem('carrito', JSON.stringify(carrito));
    
            // Realiza una solicitud AJAX para cambiar el estado del producto
            $.ajax({
                type: 'POST',
                url: '/actualizar-estado-producto-agregar',
                data: { productoId: productoId, _token: '{{ csrf_token() }}' },
                success: function(response) {
                    console.log('Estado del producto actualizado');
    
                    // Mostrar el mensaje flotante
                    mostrarMensaje(nombre);
                },
                error: function(error) {
                    console.error('Error al actualizar el estado del producto', error);
                }
            });
        }
    
        function mostrarMensaje(productoNombre) {
            // Actualizar el nombre del producto en el mensaje
            $('#product-name').text(productoNombre);
    
            // Mostrar el mensaje con difuminado gradual
            $('#floating-message').fadeIn().delay(3000).fadeOut();
        }
    </script>
    <script>
        function mostrarMensaje(mensaje) {
            var mensajeFlotante = document.getElementById('floating-message');
            mensajeFlotante.innerText = mensaje;
            mensajeFlotante.style.display = 'block';

            setTimeout(function() {
                mensajeFlotante.style.display = 'none';
            }, 3000); // El mensaje desaparecerá después de 3000 milisegundos (3 segundos)
        }
    </script>
</body>
</html>
