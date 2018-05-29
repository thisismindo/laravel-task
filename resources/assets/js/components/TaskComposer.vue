<template lang="html">
    <div class="task-composer">
        <div class="form-group">
            <label for="taskTitle">Task Title:</label>
            <input type="text" placeholder="Task Title" v-model="taskTitle" />
        </div>
        <div class="form-group">
            <label for="taskDescription">Task Description:</label>
            <input type="text" placeholder="Task Description" v-model="taskDescription" />
        </div>
        <div class="form-group">
            <button class="btn btn-primary" @click="newTask">Create</button>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      taskTitle: "",
      taskDescription: ""
    };
  },
  methods: {
    newTask() {
      this.$emit("newtask", {
        task_title: this.taskTitle,
        task_description: this.taskDescription
      });

      this.taskTitle = "";
      this.taskDescription = "";
    }
  }
};
</script>

<style lang="css" scoped>
.task-composer {
  display: flex;
}
.task-composer input {
  flex: 1 auto;
}

.task-composer button {
  border-radius: 0;
}
</style>