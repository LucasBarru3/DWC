document.getElementById('formularioFactura').addEventListener('submit', function(event) {
    event.preventDefault();
    const codigo = document.getElementById('codigo').value;
    let cantidad = parseInt(document.getElementById('cantidad').value, 10);
    if (isNaN(cantidad) || cantidad <= 0) {
        cantidad = 1;
    }

    const formData = new FormData();
    formData.append('codigo', codigo);
    formData.append('cantidad', cantidad);

    fetch('procesar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            alert(data.error);
            return;
        }
        agregarLineaFactura(data.codigo, data.cantidad, data.descripcion, data.precio);
        actualizarTotales();
    })
    .catch(error => console.error('Error:', error));
});

let subtotal = 0;
function agregarLineaFactura(codigo, cantidad, descripcion, precioUnitario) {
    precioUnitario = parseFloat(precioUnitario) || 0; 
    const precioTotal = (precioUnitario * cantidad).toFixed(2);

    const linea = `
        <tr>
            <td class="border px-4 py-2">${codigo}</td>
            <td class="border px-4 py-2">${cantidad}</td>
            <td class="border px-4 py-2">${descripcion}</td>
            <td class="border px-4 py-2">${precioUnitario.toFixed(2)}</td>
            <td class="border px-4 py-2">${precioTotal}</td>
        </tr>
    `;

    document.getElementById('tablaFactura').innerHTML += linea;
    subtotal += parseFloat(precioTotal);
}

function actualizarTotales() {
    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    const iva = subtotal * 0.18;
    document.getElementById('iva').textContent = iva.toFixed(2);
    document.getElementById('total').textContent = (subtotal + iva).toFixed(2);
}
