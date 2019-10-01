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
                            <p class="mb-0">+880 1794 1724 79</p>
                        </div>
                        <div class="info-item">
                            <strong>Email</strong>
                            <p class="mb-0">web.zakirbd@gmail.com</p>
                        </div>
                        <div class="info-item">
                            <strong>Address</strong>
                            <p class="mb-0">Adabor, Dhaka-1207, Bangladesh</p>
                        </div>
                        <div class="info-item">
                            <ul class="find-me">
                                <li><a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                                <li><a href="#"> <i class="fab fa-linkedin-in"></i> </a></li>
                                <li><a href="#"> <i class="fab fa-github"></i> </a></li>
                                <li><a href="#"> <i class="fab fa-stack-overflow"></i> </a></li>
                                <li><a href="#"> <i class="fab fa-quora"></i> </a></li>
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
        <!-- <div class="row">
            <div class="col-6">
                <form class="contact-form">
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
            <div class="col-6">
                <div class="contact-info">
                    
                </div>
            </div>
        </div> -->
    </div>
  </section>
</template>

<script>
export default {

}
</script>

<style>

</style>
