<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Formulario Factura</h2>
        <form id="formularioFactura">
            <div class="mb-4">
                <label for="codigo" class="block text-gray-700">Código:</label>
                <input type="text" id="codigo" name="codigo"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="cantidad" class="block text-gray-700">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    min="1">
            </div>
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Enviar</button>
            </div>
        </form>
    </div>
    <div id="tablainfo" class="mt-8 max-w-2xl w-full bg-white p-6 rounded shadow-md">
        <h3 class="text-xl font-bold mb-4">Factura</h3>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Código</th>
                    <th class="border px-4 py-2">Cantidad</th>
                    <th class="border px-4 py-2">Descripción</th>
                    <th class="border px-4 py-2">Precio Unitario</th>
                    <th class="border px-4 py-2">Precio Total</th>
                </tr>
            </thead>
            <tbody id="tablaFactura">
            </tbody>
        </table>
        <p>Subtotal: <span id="subtotal" class="font-bold">0.00</span> €</p>
        <p>IVA (18%): <span id="iva" class="font-bold">0.00</span> €</p>
        <p>Total: <span id="total" class="font-bold">0.00</span> €</p>
    </div>
    </div>

    <script src="factura.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('procesar.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(producto => {
                        agregarLineaFactura(
                            producto.codigo,
                            1,
                            producto.descripcion,
                            producto.precio
                        );
                        actualizarTotales();
                    });
                })
                .catch(error => console.error('Error al cargar productos:', error));
        });
    </script>
</body>

</html>