<template>
  <div id="app">
    <b-navbar toggleable="lg" type="dark" variant="primary">
      <b-navbar-brand href="#">iPok - Teste</b-navbar-brand>
    </b-navbar>
    <home />
  </div>
</template>

<script>
import Home from "./views/Home";

export default {
  name: "app",
  components: {
    Home
  }
};
</script>
