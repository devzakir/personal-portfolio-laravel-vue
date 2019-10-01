<template>
  <section class="promote-section">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-12 col-md-6 promote-content">
                  <h2>Have any project idea?</h2>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At earum cum id autem velit
                      quidem, vel, amet adipisci nesciunt!</p>
                  <div class="buttons">
                      <a href="#contact" >Get Quote</a>
                      <a href="#" @click="showHireMeModal()">Hire Me</a>
                  </div>
              </div>
              <div class="col-12 col-md-6 content-preview">
                  <div class="d-flex justify-content-end">
                      <div>
                          <img src="../../images/project-idea.png" alt="" class="img-fluid">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</template>

<script>
  export default {
      methods:{
          showHireMeModal(){
              this.$root.$emit('hireme_modal_from_promote');
          }
      }
  }
</script>

<style>

</style>
