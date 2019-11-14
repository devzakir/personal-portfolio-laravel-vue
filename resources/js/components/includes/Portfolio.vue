<template>
  <div>
    <section class="portfolio-section" id="portfolio">
      <div class="container">
          <div class="row">
              <div class="col-12 portfolio-heading">
                  <div class="section-heading">
                      <h2>Portfolio</h2>
                      <p>My Recent Work</p>
                  </div>
                  <!-- <ul class="portfolio-menu">
                      <li><a href="#">WordPress</a></li>
                      <li><a href="#">Web Development</a></li>
                      <li><a href="#">Web Design</a></li>
                      <li><a class="active" href="#">All</a></li>
                  </ul> -->
              </div>
          </div>
          <div class="row portfolio-list">
              <div class="col-12 col-md-6 col-lg-4" v-for="portfolio in portfolios" :key="portfolio.id">
                  <div class="item">
                      <div class="preview">
                          <img :src="portfolio.image" alt="" class="img-fluid">
                      </div>
                      <div class="details">
                          <small>{{ portfolio.category_name }}</small>
                          <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, quidem!</h6>
                          <div class="text-center">
                              <a :href="portfolio.link" target="_blank">Preview</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <div class="buttons text-center">
                      <button @click="getPotfolioData(next_page_url)" :disabled="!loadMore">Load More</button>
                  </div>
              </div>
          </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
    data: () => {
        return {
            portfolios: [],
            prev_page_url: null,
            next_page_url: null,
            portfolioMainPage: true,
            loadMore: null,
        }
    },
    mounted(){
        this.getPotfolioData();
    },
    methods: {
        getPotfolioData(nextPageUrl){
            let  mainURl = 'get-data/portfolios';
            let  dataUrl = nextPageUrl || mainURl;
            axios.post(dataUrl)
            .then(response => {
                // console.log(response.data);
                if(this.portfolioMainPage){
                    this.portfolios = response.data.data;
                }else {
                    for (let i = 0; i < response.data.data.length; i++){
                        this.portfolios.push(response.data.data[i]); 
                    }
                }
                this.portfolioMainPage = false;
                this.prev_page_url = response.data.prev_page_url;
                this.next_page_url = response.data.next_page_url;
                if(response.data.next_page_url){
                    this.loadMore = true;
                }else {
                    this.loadMore = false;
                }
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
