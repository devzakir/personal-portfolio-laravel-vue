<template>
  <div>
		<section class="testiomonial-section">
			<div class="container">
				<div class="row">
					<div class="col-12 section-heading">
						<h2>Testimonials</h2>
						<p>What client say about me</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div id="testimonialSlider" class="carousel slide" data-ride="carousel">
							<Carousel class="carousel-inner">
								<CarouselSlide v-for="(slide, index) in slides" :key="index" class="carousel-item carousel-item-next carousel-item-left">
									<div class="item">
										<div class="client-avatar">
											<img :src="slide.avatar" alt="" class="img-fluid">
										</div>
										<div class="testimonial-description">
											<p> {{slide.description}} </p>
											<div class="client-intro">
												<h6> {{slide.name}} </h6>
												<i> {{slide.designation}} </i>
											</div>
										</div>
									</div>
								</CarouselSlide>
							</Carousel>
						</div>
					</div>
				</div>
			</div>
		</section>
  </div>
</template>

<script>
import Carousel from '../carousel/Carousel.vue';
import CarouselSlide from '../carousel/CarouselSlide.vue';
export default {
	data() {
		return {
			testimonials: [],			
			slides: [
				{ 
					id: 1,
					avatar: 'http://t.commonsupport.com/amatic/images/resource/team-3.jpg',
					quote: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eligendi corrupti, deserunt voluptas nisi perspiciatis non voluptate earum doloribus architecto nulla molestias natus quidem, ducimus quis praesentium, aliquid possimus magni?',
					name: 'Zakir Hossen',
					designation: 'Chairman of 1',
				},
				{ 
					id: 2,
					avatar: 'http://t.commonsupport.com/amatic/images/resource/team-1.jpg',
					quote: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eligendi corrupti, deserunt voluptas nisi perspiciatis non voluptate earum doloribus architecto nulla molestias natus quidem, ducimus quis praesentium, aliquid possimus magni?',
					name: 'Zamir Hossen',
					designation: 'Chairman of 2',
				},
				{ 
					id: 3,
					avatar: 'http://t.commonsupport.com/amatic/images/resource/team-2.jpg',
					quote: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores eligendi corrupti, deserunt voluptas nisi perspiciatis non voluptate earum doloribus architecto nulla molestias natus quidem, ducimus quis praesentium, aliquid possimus magni?',
					name: 'Rifat Hossen',
					designation: 'Chairman of 3',
				},
			]
		}
	},

	components:{
		Carousel,
		CarouselSlide
	},

	methods: {
		getTestimonialData(){
			axios.post('get-data/testimonials')
			.then(response => {
				this.slides = response.data;
				console.log(response.data);
			})
			.then(error => {
				// console.log(error)
			});
		}
	},
	created() {
		this.getTestimonialData();
		// console.log(this.$route.path);
	},
}
</script>

<style>

</style>
