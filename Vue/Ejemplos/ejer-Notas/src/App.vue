<template>
  <form>
    Titulo: <input type="text" v-model="newNota">
    <br>
    <input type="submit" value="Añadir" @click.prevent="anadir">
  </form>
  
  <div class="notas-container">
    <div v-for="(nota, index) in notas" :key="index" class="nota">
      <input type="text" v-model="nota.text" :readonly="!nota.editable">
      <button @click="eliminar(index)">Eliminar</button>
      <button v-if="nota.editable" @click="guardar(index)">Guardar</button>
      <button v-else @click="editar(index)">Editar</button>
      <!-- <button @click="editar(index)">{{ nota.editable ? 'Guardar' : 'Editar' }}</button> -->
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

let newNota = ref('');
let notas = ref([]);

const anadir = () => {
  notas.value.push({
    text: newNota.value,
    editable: false,
  });
  newNota.value = '';
}

const editar = (index) => {
  notas.value[index].editable = true;
}

const guardar = (index) => {
  notas.value[index].editable = false;
}

const eliminar = (index) => {
  notas.value.splice(index, 1);
}
</script>

<style>
.notas-container {
  display: flex;
  flex-wrap: wrap;
}

.nota {
  margin-right: 15px;
}
</style>
