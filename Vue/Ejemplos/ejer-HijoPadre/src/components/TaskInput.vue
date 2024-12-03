<template>
  <div>
    <input v-model="taskText" placeholder="Nueva tarea" />
    <button @click="submitTask">Agregar Tarea</button>
  </div>
</template>

<script>
export default {
  name: 'TaskInput',
  data() {
    return {
      taskText: '' // Campo para almacenar el texto de la nueva tarea
    };
  },
  methods: {
    // Método para emitir el evento al padre con el texto de la nueva tarea
    submitTask() {
      if (this.taskText.trim()) {
        this.$emit('add-task', this.taskText); // Emite el evento con el texto de la tarea
        this.taskText = ''; // Limpia el campo de entrada
      }
    }
  }
};
</script>
