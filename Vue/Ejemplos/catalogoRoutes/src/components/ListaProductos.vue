<script setup>
import { RouterLink } from 'vue-router';

const productos = [
  { id: 1, text: 'Producto 1', descripcion: 'Descripcion p1' },
  { id: 2, text: 'Producto 2', descripcion: 'Descripcion p2' },
  { id: 3, text: 'Producto 3', descripcion: 'Descripcion p3' },
];
</script>

<template>
  <div>
    <h2>Componente: Lista de Productos</h2>
    <ul>
      <li v-for="(producto, index) in productos" :key="producto.id">
        {{ producto.text }} 
        <RouterLink :to="{ name: 'productDetails', params: { id: producto.id } }">Ver detalles</RouterLink>
      </li>
    </ul>
    <RouterLink to="/add-product">
      <button>Añadir Producto</button>
    </RouterLink>
  </div>
</template>
  