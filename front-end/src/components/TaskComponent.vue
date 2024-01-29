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
      axios
        .post("http://localhost/php-todo-list-json/back-end/createTask.php", {
          params: {
            text: this.newTaskText,
          },
        })
        .then((res) => {
          this.tasks = res.data;
        });
    },
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

  <h3>New Task</h3>
  <form @submit.prevent="createTask">
    <input type="text" name="text" v-model="newTaskText" />
    <input type="submit" value="SEND" />
  </form>

  <ul>
    <li v-for="(task, index) in tasks" :key="index">
      {{ task.text }}
      <br />
      {{ task.data }}
    </li>
  </ul>
</template>

<style scoped></style>
