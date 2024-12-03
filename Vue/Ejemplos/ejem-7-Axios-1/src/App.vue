<template>
  <h1>Uso de Axios</h1>
  <ul>
    <li v-for="user in users">
      {{user.username}} - {{ user.name }} - {{ user.email }} - {{ user.phone }}
  </li> 
  </ul>
</template>
<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue'; 
const users = ref([]);
onMounted(()=>{
  cargarUsers();
})
const cargarUsers = async () => {
  try {
    const response = await axios.get('https://jsonplaceholder.typicode.com/users');
    console.log(response)
    users.value = response.data
  } catch (error) {
    console.error(error);
  }
}
</script>