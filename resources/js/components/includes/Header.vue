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
                    <ul class="mobile-nav">
                        <li><router-link :to="{ name: 'home' }"> Home </router-link></li>
                        <li><router-link :to="{ name: 'about' }"> About </router-link></li>
                        <li><router-link :to="{ name: 'services' }"> Services </router-link></li>
                        <li><router-link :to="{ name: 'portfolio' }"> Portfolio </router-link></li>
                        <li><router-link :to="{ name: 'contact' }"> Contact </router-link></li>
                        <li><router-link :to="{ name: 'products' }"> Products </router-link></li>
                    </ul>
                    <ul class="right ml-auto">
                        <li v-if="setting.facebook" ><a :href="setting.facebook" target="_blank"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li v-if="setting.linkedin" ><a :href="setting.linkedin" target="_blank"> <i class="fab fa-linkedin-in"></i> </a></li>
                        <li v-if="setting.github" ><a :href="setting.github" target="_blank"> <i class="fab fa-github"></i> </a></li>
                        <li v-if="setting.stack" ><a :href="setting.stack" target="_blank"> <i class="fab fa-stack-overflow"></i> </a></li>
                        <li v-if="setting.quora" ><a :href="setting.quora" target="_blank"> <i class="fab fa-quora"></i> </a></li>
                        <li ><a href="" @click.prevent class="hire-me" @click="showModal = true"> Hire Me </a></li>
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
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Your email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="budget">What is your budget?</label>
                        <select name="budget" class="form-control">
                            <option value="">Select your budget</option>
                            <option value="">$100 to $500 </option>
                            <option value="">$500 to $1000 </option>
                            <option value="">$1000 to $5000 </option>
                            <option value="">$5000+ </option>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label for="email">Your social</label>
                        <input type="text" class="form-control" name="email" placeholder="Skype/Telegram/Whatsapp/Viber">
                    </div>
                    <div class="form-group">
                        <label for="message">Your message</label>
                        <textarea name="message" rows="4" class="form-control" placeholder="Enter your message"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="showModal = false">Close</button>
                    <button type="button" class="btn btn-primary"> Send Offer </button>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data: function() {
         return  {
           showModal: false,
           setting: [],
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
        }
    }
}
</script>

<style lang="scss">    
    #hireMe {
        display: block;
        z-index: 100;
        &:after {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-header{
            button {
                border: 0;
                background: transparent;
                font-size: 24px;
                /* height: auto; */
                line-height: 24px;
                outline: 0;
                cursor: pointer;
            }
        }
        .modal-content {
            overflow: auto;
            max-height: calc(100vh - 60px);
        }
    }
</style>
