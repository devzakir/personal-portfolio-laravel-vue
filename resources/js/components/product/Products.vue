<template>
  <section class="products">
    <div class="container">
      <div class="row">
        <div class="col-12 heading text-center">
          <h2> Free Products </h2>
          <p>Grab websites for free</p>
        </div>
      </div>
      <div class="row">
        <div class="col-4" v-for="product in products" :key="product.id">
          <Product :product="product"></Product>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h5 v-if="products.lenght || products.length == 0 ? true : false" class="text-center">No Products Found</h5>
          <div class="buttons text-center">
            <button v-if="products.length > 0 ? true : false" href="#" @click="getProductData(next_page_url)" :disabled="!loadMore">Load More</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import Product from './product'
  export default {
    data() {
      return {
        products: [],
        prev_page_url: null,
        next_page_url: null,
        productMainPage: true,
        loadMore: false,
      }
    },
    components: {
      Product,
    },
    mounted(){
        this.getProductData();
    },
    methods: {
        getProductData(nextPageUrl){
            let  mainURl = 'get-data/products';
            let  dataUrl = nextPageUrl || mainURl;
            axios.post(dataUrl)
            .then(response => {
                // console.log(response.data);
                if(this.productMainPage){
                    this.products = response.data.data;
                    console.log(this.products);
                    console.log(this.products.length);
                }else {
                    for (let i = 0; i < response.data.data.length; i++){
                        this.products.push(response.data.data[i]); 
                    }
                }
                this.productMainPage = false;
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
