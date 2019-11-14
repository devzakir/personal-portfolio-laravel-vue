<template>
  <div>
    <section class="services-section" id="services">
      <div class="container">
          <div class="row services">
              <div class="col-12 col-md-4 col-lg-5 section-heading">
                  <div class="icon"><i class="fas fa-user-cog"></i></div>
                  <h2>My Services</h2>
                  <p>I make things happen. Lorem ipsum dolor sit, amet consectetur adipisicing elit. At earum cum
                      id autem velit quidem, vel, amet adipisci nesciunt!</p>
                  <div class="row counter">
                      <div class="col-lg-6 col-md-12 col-sm-6 col-6">
                          <div class="item">
                              <h4>3+</h4>
                              <p>Years of experience</p>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-6 col-6">
                          <div class="item">
                              <h4>47+</h4>
                              <p>Project completed.</p>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-6 col-6">
                          <div class="item">
                              <h4>31+</h4>
                              <p>Awesome clients</p>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-6 col-6">
                          <div class="item">
                              <h4>4806+</h4>
                              <p>Hours of coding</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-md-8 col-lg-7">
                  <div class="d-flex flex-wrap my-services">
                      <div class="item item1" v-for="service in services" :key="service.id">
                          <div class="item-info">
                              <div class="icon bg-white">
                                  <img :src="service.icon" alt="" class="img-fluid">
                              </div>
                              <h3>{{ service.title }}</h3>
                              <p> {{ service.description }} </p>
                          </div>
                      </div>
                      <!-- <div class="item item2">
                          <div class="item-info">
                              <div class="icon bg-white">
                                  <img src="../../images/web-development.svg" alt="" class="img-fluid">
                              </div>
                              <h3>Web Development</h3>
                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione debitis
                                  deserunt repellat quas quia nesciunt, praesentium beatae consequatur officia
                                  enim.</p>
                          </div>
                      </div>
                      <div class="item item3">
                          <div class="item-info">
                              <div class="icon bg-white">
                                  <img src="../../images/web-application.svg" alt="" class="img-fluid">
                              </div>
                              <h3>Application</h3>
                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione debitis
                                  deserunt repellat quas quia nesciunt, praesentium beatae consequatur officia
                                  enim.</p>
                          </div>
                      </div>
                      <div class="item item4">
                          <div class="item-info">
                              <div class="icon bg-white">
                                  <img src="../../images/wordpress.svg" alt="" class="img-fluid">
                              </div>
                              <h3>WordPress</h3>
                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione debitis
                                  deserunt repellat quas quia nesciunt, praesentium beatae consequatur officia
                                  enim.</p>
                          </div>
                      </div> -->
                  </div>
              </div>
          </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
    data: function(){
        return {
            services: [],
            app_url: '',
        }
    },
    mounted (){
        this.getServices();
        this.app_url = window.location.href;
        console.log(window.location.pathName);        
        console.log(window.location);        
        console.log(window.location.href);
        console.log(document.location);
        console.log(document.location.href);
    },
    methods: {
        getServices() {
            axios.post('get-data/services')
            .then(response => {
                // console.log(response);
                this.services = response.data;
            })
            .then(error => {
                // console.log(error);
            });
        }
    }
}
</script>

<style>

</style>
