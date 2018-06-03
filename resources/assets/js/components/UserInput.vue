<template lang="html">
  <div>
    <input type="text" v-on:input="changeTitle">
    <p>{{ title }}</p>
    <p>{{ error }}</p>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      title: "Type something",
      error: ""
    };
  },
  methods: {
    changeTitle: function(event) {
      let reg = /^[a-zA-Z0-9 _'"?!]+$/i;
      if (event.target.value.match(reg) == undefined) {
        this.error = "This character is not allowed";
      } else {
        this.title = event.target.value;
        this.error = "";
      }
    }
  }
};
</script>

<style scoped>
</style>