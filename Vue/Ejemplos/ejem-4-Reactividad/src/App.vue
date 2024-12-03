<style>
.rojo{
  background-color:red;
}
.verde{
  background-color:blue;
}
</style>
<template>
  <h1>Vacio....</h1>
  <p>Mete tu el Valor de el contador</p>
  <input type="text" v-model="contador">
  <p :class="contador >= 0 ? 'verde': 'rojo'">Contador : {{ contador }}</p>
  <button @click="incrementar">Sumar</button>
  <button @click="restar">Restar</button>
  <button @click="reset">Reset</button>
</template>
<script setup>
import { ref } from 'vue';
const contador = ref(0);
function incrementar(){
  contador.value++;
}
function restar(){
  contador.value--;
}
function reset(){
  contador.value = 0;
}
</script>