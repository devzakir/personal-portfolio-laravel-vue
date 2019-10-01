<template>
    <div>
      <Header/>
      <Portfolio/>
      <Testimonial/>
    </div>
</template>

<script>

import Header from './includes/Header';
import Portfolio from './includes/Portfolio';
import Testimonial from './includes/Testimonial';
export default {
  name: 'app',
  components: {
    Header,
    Portfolio,
    Testimonial,
  }
}

</script>

<style>

</style>
