<template>
  <h1>Ejemplos interpolacion de texto....</h1>
  <h2>{{ msg }}</h2>
  <h2 :style="h2color">{{ msg }}</h2>
  <h2>{{ n1 }}</h2>
  <button :disabled="activo">Botón</button>
  <div :="objAtrib">Hola</div>
  <h3 :style="h2color">{{ msg.toLocaleUpperCase() }}</h3>
  <h3>{{ activo ? "h2 activo" : "h2 inactivo" }}</h3>

  <h1 v-if="activo">Muestra el h3 positivo</h1>
  <h1 v-else-if="activo ===null">H3 nulo</h1>  
  <h1 v-else>Muestra el h3 negativo</h1>  
  <h1 v-show="activo">Esto esta</h1>
</template>
<script setup>
const msg = "Hola ee";
const n1 = 33;
const h2color = "color : blue";
const activo=true;
const objAtrib={
  id:'contenedor',
  class:'rojo',
  style:'background-color:green',
}
</script>