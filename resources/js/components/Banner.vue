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
                <h5>Hi! I am Zakir. </h5>
                <h1>Full Stack Web Developer</h1>
                <p>Let me help you increase business egagement with qualityful Websites and Web Applications</p>
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
  components: {
    Header,
  }
}
</script>

<style>

</style>
