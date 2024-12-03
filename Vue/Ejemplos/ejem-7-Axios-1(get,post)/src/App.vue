<template>
  <h1>Axios GET y POST</h1>
  <h2>Gestor de tareas</h2>
  <form @submit.prevent="agregarTarea" action="">
    <input type="text" v-model="nuevaTarea.title">
    <button type="submit">Añadir Tarea</button>
  </form> 
  <hr>
  <h2>Listado de Tareas</h2>
  <ul>
    <li v-for="tarea in tareas" :key="tarea.id">
      <input type="checkbox" :checked="tarea.completed" disabled>
      {{ tarea.title }}
    </li>
  </ul>
</template>

<script setup>
import axios from 'axios'
import { ref , onMounted } from 'vue'

const tareas = ref([])
const nuevaTarea = ref({title: '',completed : false})

onMounted(()=>{
  cargarTareas();
})

const cargarTareas = async () => {
  try {
    const { data } = await axios.get('https://jsonplaceholder.typicode.com/todos?_limit=5')
    tareas.value = data
  } catch (error) {
    console.log(error)
  }
}

const agregarTarea = async () => {
  try {
    const { data } = await axios.post('https://jsonplaceholder.typicode.com/todos', nuevaTarea.value)
    tareas.value.push(data)
    nuevaTarea.value = ({ title: "", completed: false })
  } catch (error) {
    console.log(error)
  }
}
</script>