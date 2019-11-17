<template>
  <div>
    <section class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 item">
                    <h5>Links</h5>
                    <ul>
                        <li><router-link :to="{name: 'about' }">About Me</router-link></li>
                        <li><router-link :to="{name: 'services' }">Services</router-link></li>
                        <li><router-link :to="{name: 'portfolio' }">Portfolio</router-link></li>
                        <li><router-link :to="{name: 'contact' }">Contact Me</router-link></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-3 item">
                    <h5>Find Me</h5>
                    <ul>
                        <li v-if="setting.facebook" ><a :href="setting.facebook" target="_blank"> Facebook  </a></li>
                        <li v-if="setting.linkedin" ><a :href="setting.linkedin" target="_blank"> Linkedin </a> </li>
                        <li v-if="setting.github" ><a :href="setting.github" target="_blank"> Github </a> </li>
                        <li v-if="setting.stack" ><a :href="setting.stack" target="_blank"> Stack Overflow  </a></li>
                        <li v-if="setting.quora" ><a :href="setting.quora" target="_blank"> Quora  </a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-3 item">
                    <h5>Resource</h5>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">My Resource</a></li>
                        <li><a href="#">Useful Links</a></li>
                        <li><a href="#">Free Tools</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-3 item">
                    <h5>Hire Me</h5>
                    <ul>
                        <li><a href="#">Upwork Profile</a></li>
                        <li><a href="#">Fiverr Profile</a></li>
                        <li><a href="#">Freelancer Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-text text-center">
                        <p class="mb-0"> Design & Developed with 🧡 by <a href="#"> Zakir Hossen</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  </div>
</template>

<script>
  export default {

    data: function() {
         return  {
           setting: [],
         }
    },
    mounted(){
        this.getSettingData();
    },

    methods: {
        getSettingData(){
            axios.post('get-data/settings')
            .then(response => {
                this.setting = response.data;
            })
            .then(error => {
                // console.log(error);
            })
        },
    }
  }
</script>

<style>

</style>
