<template>
  <section class="banner-section">
    <Header/>
    <div id="particle-container">
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
      <div class="particle"></div>
    </div>
    <div class="container">
        <div class="row banner align-items-center">
            <div class="col-md-6 intro col-sm-12">
                <h5>{{ data.greeting }} </h5>
                <h1>{{ data.banner_title }}</h1>
                <p>{{ data.greeting_note }}</p>
                <div class="buttons">
                    <router-link to="about"> About </router-link>
                    <router-link to="portfolio"> Recent Projects </router-link>
                </div>
            </div>
            <div class="col-6 banner-preview">
                <div class="banner-img">
                    <img src="../images/banner.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
import Header from './includes/Header';
export default {
  name: 'banner',
  data: function(){
    return{
      data: {},
    }
  },
  components: {
    Header,
  },
  mounted(){
      this.getVisitors()
  },
  methods: {
      getVisitors(){
          axios.post('./get-data/about')
          .then(response => {
            this.data = response.data;
            // console.log(response);
          })
          .catch(error => {
            // console.log(error);
          });
      },
  }
}
</script>

<style>

</style>
