<template>
  <h2>Listado de Albums</h2>
  <ul>
    <li v-for="album in albums" :key="album.id">
      <a href="#" @click="cargarFotos(album.id)">{{ album.title }}</a>
    </li>
  </ul>
  <h2>Listado de Fotos</h2>
  <ul style="display:flex">
    <li v-for="foto in fotos" :key="foto.id">
      <img width="30px" :src="foto.url"/>
      <p>{{ foto.title }}</p>
      <button @click="eliminarFoto(foto.id)">Elimino</button>
    </li>
  </ul>
  <form @submit.prevent action="añadirFoto">

  </form>
</template>

<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'

const albums = ref([])
const fotos = ref([])

onMounted(() => {
  cargarAlbums()
})

const cargarAlbums = () => {
  axios.get('https://jsonplaceholder.typicode.com/albums?_limit=10')
    .then(response => {
      albums.value = response.data;
    })
};

const cargarFotos = (albumId) => {
  axios.get(`https://jsonplaceholder.typicode.com/albums/${albumId}/photos?_limit=10`)
    .then(response => {
      fotos.value = response.data;
    })
};
const eliminarFoto = (id) => {
  const index = fotos.value.findIndex(foto => foto.id === id)
  if (index !== -1) {
    fotos.value.splice(index, 1)
  }
}
</script>
