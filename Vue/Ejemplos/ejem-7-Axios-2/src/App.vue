<template>
  <h1>Uso de Axios</h1>
  <ul>
    <li v-for="user in users">
      <img :src="user.picture.large" alt="">
      <p>{{ user.name.first }} {{ user.name.last }}</p>
    </li> 
  </ul>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

const users = ref([]);
onMounted(() => {
  axios.get('https://randomuser.me/api/')
  .then((response)=>{
    users.value = response.data.results;
  })
  .catch((error)=>{
    console.error(error);
  });
})
const cargarUsers = async () => {
  try {
    const response = await axios.get('https://randomuser.me/api/');
    console.log(response);
    users.value = response.data.results;
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  cargarUsers();
});
</script>