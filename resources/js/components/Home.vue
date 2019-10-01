<template>
    <div>
      <Banner/>
      <About/>
      <Products/>
      <Promote/>
      <Services/>
      <Testimonial/>
      <Contact/>
    </div>
</template>

<script>
  import Banner from './Banner';
  import About from './includes/About';
  import Services from './includes/Services';
  import Promote from './includes/Promote';
  import Products from './product/Products';
  import Testimonial from './includes/Testimonial';
  import Contact from './includes/Contact';
  export default {
    name: 'app',
    components: {
      Banner,
      About, 
      Services,
      Products,
      Promote,
      Testimonial,
      Contact,
    }
  }
</script>

<style>

</style>
