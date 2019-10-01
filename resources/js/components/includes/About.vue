<template>
  <div>
    <section :class="checkClass" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="my-photo">
                        <img src="../../images/my-photo.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="about-heading">
                        <h2>About Me</h2>
                        <p class="mb-0">My Introduction</p>
                    </div>
                    <div class="about-me">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a :class="(currentTab == 1)?'nav-link active':'nav-link'" @click="showTab(1)" @click.prevent href="#nav-home">Profile</a>
                                <a :class="(currentTab == 2)?'nav-link active':'nav-link'" @click="showTab(2)" @click.prevent href="#nav-profile">Skills</a>
                                <a :class="{ 'active' : currentTab == 3 }" class="nav-link" @click="showTab(3)" @click.prevent href="#nav-contact">Connect</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div :class="(currentTab == 1)?'tab-pane fade show active':'tab-pane fade'" v-if="currentTab == 1" id="nav-home">
                                <div class="intro">
                                    <h3>{{ data.name }}</h3>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure ipsum quidem beatae numquam doloremque consequuntur sequi, illum ab incidunt, quos quae adipisci suscipit accusantium labore ullam nihil nulla est soluta.</p>
                                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, cum. Voluptates nostrum nisi voluptatum, distinctio suscipit quasi eveniet officiis consectetur facilis? Earum distinctio dolorem assumenda pariatur illo, perspiciatis ratione provident!</p>

                                    <div class="buttons">
                                        <a href="#resume">My Resume</a>
                                        <a href="" @click.prevent @click="showHireModal">Hire Me</a>
                                    </div>
                                </div>
                            </div>
                            <div :class="(currentTab == 2)?'tab-pane fade show active':'tab-pane fade'" v-if="currentTab == 2" id="nav-profile">
                                <div class="skill-box">
                                    <h6>Front End</h6>
                                    <div>
                                        <span>Vue JS</span>
                                        <span>JavaScript</span>
                                        <span>jQuery</span>
                                        <span>BootStrap</span>
                                        <span>HTML5</span>
                                        <span>CSS3</span>
                                        <span>SCSS</span>
                                        <span>Flexbox</span>
                                    </div>
                                </div>
                                <div class="skill-box">
                                    <h6>Back End</h6>
                                    <div>
                                        <span>Laravel</span>
                                        <span>PHP</span>
                                        <span>MySQL</span>
                                        <span>REST API</span>
                                        <span>API Integration</span>
                                        <span>Database Design</span>
                                    </div>
                                </div>
                                <div class="skill-box">
                                    <h6>Others</h6>
                                    <div>
                                        <span>Project Planning</span>
                                        <span>Client Handling</span>
                                        <span>WordPress</span>
                                        <span>Adobe Photoshop</span>
                                        <span>Writing</span>
                                        <span>Affiliate Marketing</span>
                                    </div>
                                </div>
                            </div>
                            <div :class="{ 'show active' : currentTab == 3 }" class="tab-pane fade" v-if="currentTab == 3" id="nav-contact">
                                <div class="connect-info">
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
                                            <li><a href="#"><i class="fab fa-facebook-f"></i> </a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i> </a></li>
                                            <li><a href="#"><i class="fab fa-github"></i> </a></li>
                                            <li><a href="#"><i class="fab fa-stack-overflow"></i> </a></li>
                                            <li><a href="#"><i class="fab fa-quora"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            currentTab: 1,
            data: [],
        }
    },
    computed: {
        checkClass() {
            if(this.$route.path !== '/about') {
                return 'about-section'
            } else {
                return 'about-section active'
            }
        }
    },
    created() {
        // console.log(data);
    },
    methods: {
        showHireModal(){
            this.$root.$emit('hireme_modal_from_about');
        },

        showTab(selectedTab){
            this.currentTab = selectedTab
        },

    },
    mounted() {
        axios.post('./api-data/about')
        .then(response => {
            // console.log(response);
            this.data = response.data;
        })
        .catch(error => {
            // console.log(error);
        });
    },
}
</script>

<style>

</style>
