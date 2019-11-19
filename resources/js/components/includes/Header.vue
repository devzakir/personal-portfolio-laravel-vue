<template>
  <div>
    <header :class="{active: this.$route.path !== '/'}">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="menu-part d-flex align-items-center">
                    <router-link to="/" class="logo d-flex align-items-center">
                        <img src="../../images/logo.svg" alt="" class="img-fluid">
                    </router-link>
                    <ul class="mobile-nav" :class="showMobileMenu ? 'active' : ''">
                        <li @click="hideMobileNav"><router-link :to="{ name: 'home' }"> Home </router-link></li>
                        <li @click="hideMobileNav"><router-link :to="{ name: 'about' }"> About </router-link></li>
                        <li @click="hideMobileNav"><router-link :to="{ name: 'services' }"> Services </router-link></li>
                        <li @click="hideMobileNav"><router-link :to="{ name: 'portfolio' }"> Portfolio </router-link></li>
                        <li @click="hideMobileNav"><router-link :to="{ name: 'products' }"> Products </router-link></li>
                        <li @click="hideMobileNav"><router-link :to="{ name: 'contact' }"> Contact </router-link></li>
                        <li v-if="showMobileMenu" @click="hideMobileNav"><a href="#" @click.prevent @click="showModal = true"> Hire Me </a></li>
                    </ul>
                    <ul class="right ml-auto">
                        <li v-if="setting.facebook" ><a :href="setting.facebook" target="_blank"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li v-if="setting.linkedin" ><a :href="setting.linkedin" target="_blank"> <i class="fab fa-linkedin-in"></i> </a></li>
                        <li v-if="setting.github" ><a :href="setting.github" target="_blank"> <i class="fab fa-github"></i> </a></li>
                        <li v-if="setting.stack" ><a :href="setting.stack" target="_blank"> <i class="fab fa-stack-overflow"></i> </a></li>
                        <li v-if="setting.quora" ><a :href="setting.quora" target="_blank"> <i class="fab fa-quora"></i> </a></li>
                        <li ><a href="" @click.prevent class="hire-me" @click="showModal = true"> Hire Me </a></li>
                        <li class="nav-toggle" @click="showMobileMenu = !showMobileMenu" :class="showMobileMenu ? 'active' : ''"> <i class="fas" :class="showMobileMenu ? 'fa-times' : 'fa-bars'"></i> </li>
                    </ul>
                  </nav>
              </div>
          </div>
      </div>
    </header>
    <div class="modal fade show" id="hireMe" v-if="showModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hire Me </h5>
                    <button type="button" @click="showModal = false">
                        <span>×</span>
                    </button>
                </div>
                <form @submit.prevent="hire" @keydown="form.onKeydown($event)">
                    <div class="modal-body">
                        <alert-success :form="form">Your message send successfully.</alert-success>
                        <alert-error :form="form"> 
                            <ul>
                                <li v-if="form.errors.has('name')"> {{ form.errors.get('name') }} </li>
                                <li v-if="form.errors.has('email')"> {{ form.errors.get('email') }} </li>
                                <li v-if="form.errors.has('budget')"> {{ form.errors.get('budget') }} </li>
                                <li v-if="form.errors.has('social')"> {{ form.errors.get('social') }} </li>
                                <li v-if="form.errors.has('message')"> {{ form.errors.get('message') }} </li>
                            </ul>
                        </alert-error>
                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                        </div>
                        <div class="form-group">
                            <label for="email">Your email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter your email" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }">
                        </div>
                        <div class="form-group">
                            <label for="budget">What is your budget?</label>
                            <select name="budget" class="form-control" v-model="form.budget" :class="{ 'is-invalid': form.errors.has('budget') }">
                                <option value="">Select your budget</option>
                                <option value="500">$100 to $500 </option>
                                <option value="1000">$500 to $1000 </option>
                                <option value="5000">$1000 to $5000 </option>
                                <option value="5000">$5000+ </option>
                            </select>
                        </div>                    
                        <div class="form-group">
                            <label for="email">Your social</label>
                            <input type="text" class="form-control" name="social" placeholder="Skype/Telegram/Whatsapp/Viber" v-model="form.social" :class="{ 'is-invalid': form.errors.has('social') }">
                        </div>
                        <div class="form-group">
                            <label for="message">Your message</label>
                            <textarea name="message" rows="4" class="form-control" placeholder="Enter your message" v-model="form.message" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="showModal = false">Close</button>
                        <button type="submit" class="btn btn-primary" :disabled="form.busy"> Send Offer </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import { Form, AlertError, AlertSuccess } from 'vform'
Vue.component(AlertError.name, AlertError)
Vue.component(AlertSuccess.name, AlertSuccess)
export default {
    data: function() {
         return  {
            showModal: false,
            setting: [],
            showMobileMenu: false,
            form: new Form({
                name: '',
                email: '',
                budget: '',
                social: '',
                message: '',
            }),
         }
    },
    mounted(){
        this.$root.$on('hireme_modal_from_promote', () => {
            this.showModal = true;
        });
        this.$root.$on('hireme_modal_from_about', () => {
            this.showModal = true;
        });

        this.getSettingData();
        // this.checkWindowSize();
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
        hire(){
            this.form.post('hireme')
            .then( ({data})  => { 
                // console.log(data);
                this.form.name = '',
                this.form.email = '',
                this.form.budget = '',
                this.form.social = '',
                this.form.message = ''
            });
        },
        // checkWindowSize(){
        //     window.onresize = function(event) {
        //         let width = document.body.clientWidth;
        //         if(width < 768){
        //             this.showMobileMenu = true;
        //         }
        //     }
        //     let width = document.body.clientWidth;
        //     window.onload = function(event){
        //         if(width < 768){
        //             this.showMobileMenu = true;
        //         }
        //     }
        // },
        hideMobileNav(){
            this.showMobileMenu = false;
        }
    },
}
</script>

<style lang="scss">    
    
</style>
