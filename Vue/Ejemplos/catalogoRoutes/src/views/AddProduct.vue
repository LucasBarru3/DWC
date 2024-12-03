<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

// Datos del formulario
const nombre = ref('');
const descripcion = ref('');

// Función para manejar el envío del formulario
const addProduct = () => {
  const newProduct = {
    id: Date.now(), // Generar un ID único (puedes usar otro método si prefieres)
    text: nombre.value,
    descripcion: descripcion.value,
  };

  console.log('Nuevo Producto:', newProduct); // Mostrar el objeto en consola

  // Redirigir a la lista de productos o donde prefieras
  router.push('/products');
};
</script>

<template>
  <div>
    <h2>Añadir un nuevo Producto</h2>
    <form @submit.prevent="addProduct">
      <div>
        <label for="nombre">Nombre del producto</label>
        <input type="text" id="nombre" v-model="nombre" required />
      </div>
      <div>
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" v-model="descripcion" required />
      </div>
      <button type="submit">Añadir Producto</button>
    </form>
  </div>
</template>
