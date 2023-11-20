<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuarzos Energía Natural</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        
        header {
            background-color: transparent;
            color: black;
            text-align: center;
            padding: 1em 0;
            position: relative;
        }

        .header-line {
            width: 50%;
            margin-bottom: 10px;
            border: 1px solid #9f3d6b;
        }

        main {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .carrito {
            width: 40%;
            margin-left: 10%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .detalle {
            width: 30%; /* Ajusté el ancho del detalle del carrito */
            margin-right: 10%;
            height: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 1px solid #ddd; /* Fijo el ancho del borde */
            border-radius: 5px;
            position: relative;
            min-height: 150px;
            
        }
        .detalle-content {
            margin-right: 0; /* Establece el margen derecho en 0 para igualar ambos lados */
             /* Establece el margen derecho en 0 para igualar ambos lados */
        }

        .detalle h2 {
            margin-bottom: 10px;
            
        }

        #detalle-carrito {
            max-height: 150px;
            overflow-y: auto;
        }


        .acciones {
            position: relative;
            text-align: center;
            margin-top: 10px;
            
        }

        .producto {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        img {
            max-width: 80px;
            max-height: 80px;
            margin-right: 10px;
        }




        button {
            padding: 10px;
            background-color: red;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .acciones button {
            margin-top: 10px;
            width: 80%;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin-right: 90px;
        }

        .acciones button.proceder {
            background-color: #9f3d6b;
            color: white;
        }

        .acciones button.volver {
            background-color: #808080;
            color: white;
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&family=Poppins:wght@500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    


</head>

<body>
    <header>
        <h1 style="font-family: 'Nunito Sans', sans-serif;">Carro de Compras</h1>
        <hr class="header-line">
    </header>

    <main>
        <div class="carrito" id="productos-carrito">
            <h2>Productos en el Carrito</h2>
            <!-- Aquí se mostrarían los productos en el carrito -->
        </div>

        <div class="detalle">
            <h2>Detalle del Carrito</h2>
            <div class = "detalle-content" id="detalle-carrito">
                <!-- Aquí se mostraría el detalle del carrito -->
            </div>
            <div class="acciones">
                <button class="proceder" onclick="window.location.href='/pago'">Proceder al Pago</button>
                <button class="volver" onclick="volverATienda()">Volver a la Tienda</button>
            </div>
        </div>
    </main>

    <div class="footer">
        © 2023 Cuarzos Energía Natural - Tienda en línea
    </div>
    <!-- Scripts-->
    
    <script>
        const detalleCarrito = document.getElementById('detalle-carrito');
    
        // Declaración global de la función cargarDetalleCarrito
        function cargarDetalleCarrito(carrito) {
            detalleCarrito.innerHTML = ''; // Limpiar contenido anterior
            let totalCarrito = 0;
    
            carrito.forEach(producto => {
                totalCarrito += parseFloat(producto.precio) || 0;
            });
    
            // Mostrar el total
            const pTotal = document.createElement('p');
            pTotal.textContent = `Total a pagar: $${totalCarrito.toLocaleString('es-ES', { minimumFractionDigits: 0, maximumFractionDigits: 2 })}`;
            detalleCarrito.appendChild(pTotal);
        }
    
        document.addEventListener('DOMContentLoaded', function () {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const productosCarrito = document.getElementById('productos-carrito');
    
            if (productosCarrito && carrito.length > 0) {
                carrito.forEach(producto => {
                    const divProducto = document.createElement('div');
                    divProducto.classList.add('producto');
    
                    const img = document.createElement('img');
                    // Asegúrate de que la propiedad 'imagen' contenga una URL válida
                    img.src = producto.imagen;
                    img.alt = producto.nombre;
    
                    const pNombre = document.createElement('p');
                    pNombre.textContent = producto.nombre;
    
                    const pPrecio = document.createElement('p');
                    pPrecio.textContent = `Precio: $${parseFloat(producto.precio).toLocaleString('es-ES')}`;
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
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            console.log('CSRF Token:', csrfToken);
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const productoIndex = carrito.findIndex(producto => producto.id === productoId);

            if (productoIndex !== -1) {
                const producto = carrito[productoIndex];

                // Obtén el token CSRF del meta tag en el head del documento
                const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

                // Realizar la solicitud AJAX para cambiar el estado del producto al eliminarlo
                $.ajax({
                    type: 'POST',
                    url: '/actualizar-estado-producto-eliminar',
                    data: { productoId: producto.id, _token: csrfToken },
                    success: function(response) {
                        console.log('Éxito al actualizar el estado del producto', response);
                    },
                    error: function(error) {
                        console.error('Error al actualizar el estado del producto', error);
                    }
                });

                carrito.splice(productoIndex, 1);
                localStorage.setItem('carrito', JSON.stringify(carrito));
                divProducto.remove();

                // Actualizar el detalle del carrito
                cargarDetalleCarrito(carrito);
            }
        }
    
        function volverATienda() {
            window.location.href = "/tienda"; // Cambia la URL según la ruta de tu tienda
        }
    </script>
</body>

</html>















