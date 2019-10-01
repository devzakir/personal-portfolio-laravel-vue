<template>
    <div>
      <Header/>
      <About/>
    </div>
</template>

<script>

import Header from './includes/Header';
import About from './includes/About';
export default {
  name: 'app',
  components: {
    Header,
    About
  }
}

</script>

<style>

</style>
