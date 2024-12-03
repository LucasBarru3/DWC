<template>
  <h1>Ejemplos interpolacion de texto....</h1>  
  <ul>
    <li v-for="dia in laborables">{{ dia }}</li>
  </ul>
  <h2>Renderizado de Array de Objetos</h2>
  <ul>
    <li v-for="(tarea, index) in tareas"> {{ index }} - {{ tarea.nombre }} - {{ tarea.prioridad }}</li>
  </ul>
  <ul>
    <li v-for="(valor,clave,index) in objAtrib">{{ index }} - {{ clave }} - {{ valor }}</li>
  </ul>
</template>
<script setup>
const laborables=['lunes','martes','miercoles','jueves','viernes']
const tareas=[
  {nombre: 'VUe', prioridad: 'baja'},
  {nombre: 'Laravel', prioridad: 'baja'},
  {nombre: 'Cama', prioridad: 'alta'}
]
const objAtrib={
  id:'contenedor',
  class:'rojo',
  style:'background-color:green',
}
</script>