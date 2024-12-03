<script setup>
import { RouterLink, RouterView } from 'vue-router'; // Importa los componentes del router
</script>

<template>
    <!-- Enlaces de navegación -->
    <RouterLink to="/">Home</RouterLink>
    <RouterLink to="/products">Ir a la lista de productes</RouterLink>

    <!-- Aquí se renderiza la vista correspondiente -->
    <RouterView />
</template>
