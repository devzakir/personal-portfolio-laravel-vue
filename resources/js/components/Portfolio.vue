<template>
    <div>
      <Portfolio/>
      <Testimonial/>
    </div>
</template>

<script>
import Portfolio from './includes/Portfolio';
import Testimonial from './includes/Testimonial';
export default {
  name: 'app',
  components: {
    Portfolio,
    Testimonial,
  }
}

</script>

<style>

</style>
