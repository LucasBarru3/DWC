<template>
  <h1>Randomuser + Filtros</h1>
  <h2>Listado de Usuarios</h2>
  <ul style="display: flex;">
    <li v-for="user in users" :key="user.id">
      {{ user.name.first }}<img :src="user.picture.medium" alt="Foto del Usuario">
    </li>
  </ul>
  <select v-model="filtroGenero">
    <option value="male">Hombres</option>
    <option value="female">Mujeres</option>
  </select>
  <h2>Usuarios Filtrados</h2>
  <ul style="display: flex;">
    <li v-for="user in usuariosFiltrados" :key="user.id">
      {{ user.name.first }}<img :src="user.picture.medium" alt="Foto del Usuario">
    </li>
  </ul>
</template>

<script setup>
import axios from 'axios'
import { ref, computed, onMounted } from 'vue'

const users = ref([])
const filtroGenero = ref('')

onMounted(() => {
  cargarUsuarios()
})

const cargarUsuarios = () => {
  axios.get('https://randomuser.me/api/?results=10')
    .then(response => {
      users.value = response.data.results
    })
}

const usuariosFiltrados = computed(() => {
  return users.value.filter(user => user.gender === filtroGenero.value);
})
</script>
