<script>
import axios from "axios";

export default {
  name: "TaskComponent",
  data() {
    return {
      tasks: [],
      newTaskText: "",
    };
  },
  methods: {
    createTask() {

      const params = {
        text: this.newTaskText,
      };

      const config = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      };

      axios.post("http://localhost/php-todo-list-json/back-end/createTask.php", params, config)
        .then((res) => {
          this.tasks = res.data;
        });
    },
    toggleTask(index) {
        
        const params = {
        index: index
      };

        const config = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      };

      axios.post("http://localhost/php-todo-list-json/back-end/toggleTask.php", params, config)
        .then((res) => {
            this.tasks = res.data;
        })
        
    }
  },
  mounted() {
    axios.get("http://localhost/php-todo-list-json/back-end/").then((res) => {
      this.tasks = res.data;
    });
  },
};
</script>

<template>
  <h1>MY TODOLIST</h1>

  <h3>Add New Task</h3>
  <form @submit.prevent="createTask">
    <input type="text" name="text" v-model="newTaskText" />
    <input type="submit" value="SEND" />
  </form>

  <ul>
    <li v-for="(task, index) in tasks" :key="index" @click="toggleTask(index)">
        <del v-if="task.completed">
            {{ task.text }}
        </del>
        <span v-else>
            {{ task.text }}
        </span>
    </li>
  </ul>
</template>

<style scoped></style>
