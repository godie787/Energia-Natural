<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Cambié la fuente a Poppins */
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: transparent; /* Quité el fondo gris */
            color: black; /* Texto "carro de compras" en verde */
            text-align: center;
            padding: 1em 0;
            position: relative;
        }

        .header-line {
            width: 50%; /* Ajusté el ancho al 50% */
            margin-bottom: 10px; /* Espaciado inferior */
            border: 1px solid #42CE73; /* Cambié el color a un verde */
        }

        

        main {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .carrito {
            width: 60%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .detalle {
            width: 35%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 2px;
            position: relative; /* Añade posición relativa al contenedor detalle */
            min-height: 100px; /* Ajusta según sea necesario */
        }

        .producto {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee; /* Línea divisoria entre productos */
            padding-bottom: 10px; /* Espaciado entre productos */
        }

        img {
            max-width: 80px;
            max-height: 80px;
            margin-right: 10px;
        }
        .boton-eliminar {
            background-color: #ff0000; /* Fondo rojo */
            color: #fff; /* Texto blanco */
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .subtotal {
            font-weight: bold;
            font-size: 1.2em; /* Aumenté el tamaño del texto */
            color: #333; /* Color del texto */
        }

        .total {
            font-weight: bold;
            font-size: 1.5em; /* Tamaño del texto */
            color: #42CE73; /* Cambié el color a verde */
            margin-top: 20px; /* Espaciado arriba */
        }

        button {
            padding: 10px;
            background-color: red; /* Cambié el color a verde */
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px; /* Borde redondeado */
        }
        .acciones {
            /* Otras propiedades de estilo para el contenedor de acciones */
            position: absolute;;
            bottom: 0;
            width: 100%;
            text-align: center; /* Centra los botones horizontalmente */
            display: flex;
            flex-direction: column;
            align-items: flex-end; /* Alinea los botones a la derecha */
            margin-bottom: 15px; /* Empuja los botones hacia la parte inferior */
        }

        .acciones button {
            margin-top: 10px; /* Espaciado entre los botones */
            width: 80%;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin-right: 90px;
        }

        .acciones button.proceder {
            background-color: #42CE73;
            color: white;
        }

        .acciones button.volver {
            background-color: #808080;
            color: white;
        }
        

    
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x6cPX2u3FHceAmZfgzT+5XItd9nN5p8eyFfSUbqU/ZvIn32vhm6t1Yoq4uQr4kzo2E/J9FwXyXxIpH9p+at6+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <h1>Carro de Compras</h1>
        <hr class="header-line">
    </header>

    <main>
        <div class="carrito" id="productos-carrito">
            <h2>Productos en el Carrito</h2>
            <!-- Aquí se mostrarían los productos en el carrito -->
        </div>

        <div class="detalle">
            <h2>Detalle del Carrito</h2>
            <div id="detalle-carrito">
                <!-- Aquí se mostraría el detalle del carrito -->
            </div>
            <div class="acciones">
                <button class="proceder" onclick="procederAlPago()">Proceder al Pago</button>
                <button class="volver" onclick="volverATienda()">Volver a la Tienda</button>
            </div>
        </div>
    </main>

    <!-- Scripts-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const productosCarrito = document.getElementById('productos-carrito');
            const detalleCarrito = document.getElementById('detalle-carrito');

            if (productosCarrito && carrito.length > 0) {
                carrito.forEach(producto => {
                    const divProducto = document.createElement('div');
                    divProducto.classList.add('producto');

                    const img = document.createElement('img');
                    img.src = producto.imagen;
                    img.alt = producto.nombre;

                    const pNombre = document.createElement('p');
                    pNombre.textContent = producto.nombre;

                    const pPrecio = document.createElement('p');
                    pPrecio.textContent = `Precio: $${producto.precio}`;

                    const btnEliminar = document.createElement('button');
                    btnEliminar.innerHTML = '<i class="fas fa-trash"></i>';
                    btnEliminar.onclick = function () {
                        eliminarDelCarrito(producto.id, divProducto);
                    };

                    divProducto.appendChild(img);
                    divProducto.appendChild(pNombre);
                    divProducto.appendChild(pPrecio);
                    divProducto.appendChild(btnEliminar);

                    productosCarrito.appendChild(divProducto);
                });

                // Actualizar el detalle del carrito al cargar la página
                cargarDetalleCarrito(carrito);
            } else if (productosCarrito) {
                const p = document.createElement('p');
                p.textContent = 'No hay productos en el carrito.';
                productosCarrito.appendChild(p);
            }
        });

        function eliminarDelCarrito(productoId, divProducto) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const productoIndex = carrito.findIndex(producto => producto.id === productoId);

            if (productoIndex !== -1) {
                carrito.splice(productoIndex, 1);
                localStorage.setItem('carrito', JSON.stringify(carrito));
                divProducto.remove();

                // Actualizar el detalle del carrito
                cargarDetalleCarrito(carrito);
            }
        }

        function cargarDetalleCarrito(carrito) {
            detalleCarrito.innerHTML = ''; // Limpiar contenido anterior

            let totalCarrito = 0;

            carrito.forEach(producto => {
                const divProducto = document.createElement('div');
                divProducto.classList.add('detalle-producto');

                const pNombre = document.createElement('p');
                pNombre.textContent = producto.nombre;

                const pSubtotal = document.createElement('p');
                const subtotal = producto.precio; // Aquí puedes agregar lógica de subtotal si es necesario
                pSubtotal.textContent = `Subtotal: $${subtotal.toFixed(2)}`;

                divProducto.appendChild(pNombre);
                divProducto.appendChild(pSubtotal);

                detalleCarrito.appendChild(divProducto);

                totalCarrito += subtotal;
            });

            // Mostrar el total
            const pTotal = document.createElement('p');
            pTotal.textContent = `Total a pagar: $${totalCarrito.toFixed(2)}`;
            detalleCarrito.appendChild(pTotal);
        }

        function procederAlPago() {
            alert('Redirigiendo a la página de pago...');
            // Aquí puedes agregar lógica adicional para la redirección
        }

        function volverATienda() {
            window.location.href = "/tienda"; // Cambia la URL según la ruta de tu tienda
        }
    </script>
</body>

</html>















