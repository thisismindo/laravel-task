<template lang="html">
  <div class="task-list">
    <p v-if="tasks.length === 0">You have not created any task. Create a new one below.</p>
    <ul class="list-group">
      <li class="list-group-item" v-for="value, index in tasks">
        <p>Title:
          <div v-if="currentTaskId === value.id">
            <input type="text" placeholder="Task Title" v-model="taskTitle" />
          </div>
          <div v-else>
            {{ value.task_title }}
          </div>
        </p>
        <p>Description:
          <div v-if="currentTaskId === value.id">
            <input type="text" placeholder="Task Description" v-model="taskDescription" />
          </div>
          <div v-else>
            {{ value.task_description }}
          </div>
        </p>
        <p>Action:
          <button v-on:click="deleteTask(value.id, index)">Delete</button>
          <button v-on:click="currentTaskId = value.id">Edit</button>
          <div v-if="currentTaskId === value.id">
            <button v-on:click="updateTask(value.id, index)">Update</button>
          </div>
        </p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["tasks"],
  data: function() {
    return {
      currentTaskId: null,
      taskTitle: "",
      taskDescription: ""
    };
  },
  methods: {
    deleteTask(id, index) {
      axios.delete("/task/" + id).then(response => {
        this.tasks.splice(index, 1);
      });
    },
    updateTask(id, index) {
      if (this.taskTitle === "" && this.taskDescription === "") {
        alert("All fields required");
      } else {
        axios
          .put("/task/" + id, {
            task_title: this.taskTitle,
            task_description: this.taskDescription
          })
          .then(response => {
            this.currentTaskId = null;
            this.$set(this.tasks, index, {
              task_title: this.taskTitle,
              task_description: this.taskDescription
            });
          });
      }
    }
  }
};
</script>

<style lang="css" scoped>
</style>