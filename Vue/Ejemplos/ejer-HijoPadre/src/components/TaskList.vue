<template>
  <div>
    <h1>Lista de Tareas</h1>
    
    <TaskInput @add-task="addTask" />

    <ul>
      <li v-for="(task,index) in tasks" :key="task.id">
        {{ task.text }}
        <button @click="removeTask(index)">Eliminar</button>
      </li>
    </ul>
  </div>
</template>

<script>
import TaskInput from './TaskInput.vue';

export default {
  name: 'TaskList',
  components: {
    TaskInput
  },
  data() {
    return {
      tasks: []
    };
  },
  methods: {
    addTask(task) {
      this.tasks.push({ id: Date.now(), text: task });
    },
    removeTask(index) {
      this.tasks.splice(index, 1);
    }
  }
};
</script>
