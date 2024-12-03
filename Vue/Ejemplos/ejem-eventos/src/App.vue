<template>
  <h1>Eventos</h1>
  <button v-on:click="mensajeConsola">Boton</button>
  <br>
  <button @click="mensajeConsola">Boton</button>
  <hr>
  <form @submit.prevent="submitPulsado">
    <input type="text" @keydown="teclaPulsada">
    <input type="submit" @keydown.enter="submitPulsado">
  </form>
  <button @click="mensajeConsola2('este mensaje va como parametro')">BtnMensaje</button>
  <button @click.right.prevent="mensajeConsola2('este mensaje va como parametro')">BtnMensajeDerecho</button>
  <button @click.middle="mensajeConsola2('este mensaje va como parametro')">BtnMensajeMedio</button>

</template>
<script setup>
function mensajeConsola() {
  alert("Has dado click en el botón")
}
function mensajeConsola2(texto) {
  alert(texto)
}
function teclaPulsada(event) {
  console.log("Has pulsado la tecla: " + event.key)
}
function submitPulsado() {
  alert("Has pulsado el botón de submit")
}
</script>