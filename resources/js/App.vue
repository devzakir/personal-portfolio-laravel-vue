<template>
  <div id="app">
    <router-view/>
    <Footer/>
  </div>
</template>

<script>
import Footer from './components/includes/Footer'

// import scripts 
// import './scripts/main';

// Styles
import './styles/bootstrap.min.css';
import './styles/scss/style.scss';


export default {
  name: 'app',
  components: {
    Footer,
  }
}
</script>

<style>

</style>
