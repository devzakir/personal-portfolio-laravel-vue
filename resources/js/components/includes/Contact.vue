<template>
  <section class="contact-section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-heading text-center">
                    <h2>Contact Me</h2>
                    <p>I will be happy to help you. Fill out the form and I'll be in touch as soon as possible.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="contact-details d-flex">
                    <div class="details-left connect-info">
                        <div class="info-item">
                            <strong>Phone</strong>
                            <p class="mb-0">{{ setting.phone }}</p>
                        </div>
                        <div class="info-item">
                            <strong>Email</strong>
                            <p class="mb-0">{{ setting.email }}</p>
                        </div>
                        <div class="info-item">
                            <strong>Address</strong>
                            <p class="mb-0">{{ setting.address }}</p>
                        </div>
                        <div class="info-item">
                            <ul class="find-me">
                                <li v-if="setting.facebook" ><a :href="setting.facebook" target="_blank"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li v-if="setting.linkedin" ><a :href="setting.linkedin" target="_blank"> <i class="fab fa-linkedin-in"></i> </a></li>
                        <li v-if="setting.github" ><a :href="setting.github" target="_blank"> <i class="fab fa-github"></i> </a></li>
                        <li v-if="setting.stack" ><a :href="setting.stack" target="_blank"> <i class="fab fa-stack-overflow"></i> </a></li>
                        <li v-if="setting.quora" ><a :href="setting.quora" target="_blank"> <i class="fab fa-quora"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="details-right">
                        <form class="contact-form" @submit.prevent>
                            <div class="form-input">
                                <input type="text" name="name" placeholder="Your name">
                            </div>
                            <div class="form-input">
                                <input type="text" name="email" placeholder="Your email">
                            </div>
                            <div class="form-input">
                                <input type="text" name="subject" placeholder="Contact purpose">
                            </div>
                            <div class="form-input">
                                <textarea name="message" rows="4" placeholder="Your message"></textarea>
                            </div>
                            <div class="form-input text-center">
                                <button type="submit" class="send-message">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
    export default {
        data: function(){
            return {
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
            }
        }
    }
</script>

<style>

</style>
