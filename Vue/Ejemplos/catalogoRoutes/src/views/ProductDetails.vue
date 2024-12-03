<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const producto = ref(null);

const productos = [
  { id: 1, text: 'Producto 1', descripcion: 'Descripcion p1' },
  { id: 2, text: 'Producto 2', descripcion: 'Descripcion p2' },
  { id: 3, text: 'Producto 3', descripcion: 'Descripcion p3' },
];

onMounted(() => {
  const productoId = parseInt(route.params.id);  // Obtener el id del producto desde la ruta
  producto.value = productos.find(p => p.id === productoId);  // Buscar el producto
});
</script>

<template>
  <div>
    <h2>Detalles del Producto</h2>
    <p><strong>Nombre:</strong> {{ producto?.text }}</p>
    <p><strong>Descripción:</strong> {{ producto?.descripcion }}</p>
  </div>
</template>
