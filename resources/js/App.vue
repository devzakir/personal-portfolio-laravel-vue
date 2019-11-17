<template>
  <div id="app">
    <Header v-if="this.$route.name !== 'home'"/>
    <router-view/>
    <Footer v-if="this.$route.name !== 'home'"/>
  </div>
</template>

<script>
import Header from './components/includes/Header';
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
    Header,
  },
  created(){
    console.log(this.$route);
  }
}
</script>

<style>

</style>
