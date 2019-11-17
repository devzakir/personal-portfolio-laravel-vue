<template>
    <div>
      <section class="breadcrum">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="heading">
                <h2>Product Title Goes Here</h2>
                <div class="index">
                  <router-link :to="{name: 'home'}">Home</router-link> <i class="fas fa-chevron-right"></i> <router-link :to="{ name: 'product', params: {slug: product.slug }}">Product</router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="single-product">
        <div class="container">
          <div class="row">
            <div class="col-8">
              <div class="product-image">
                <img src="../images/banner.png" alt="" class="img-fluid">
              </div>
              <div class="description">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam a nulla voluptatem, illum sint quis nihil temporibus aut necessitatibus perspiciatis aspernatur quos sed provident, harum laudantium cumque nisi maxime est!</p>
              </div>
            </div>
            <div class="col-4">
              <div class="template-box">
                <a href="#" class="demo"> <i class="far fa-eye"></i> Demo</a>
                <a href="" class="download"> <i class="fas fa-cloud-download-alt"></i> Downloads</a>
              </div>
              <div class="sidebar-box">
                <h3>Template Summery</h3>
                <div class="content">
                  <table>
                    <tr> 
                      <td> Category </td>
                      <td> Version </td>  
                    </tr>
                    <tr> 
                      <td> Version </td>
                      <td> Version </td>  
                    </tr>
                    <tr> 
                      <td> Layout </td>
                      <td> Responsive </td>  
                    </tr>
                    <tr> 
                      <td> Created </td>
                      <td> Responsive </td>  
                    </tr>
                    <tr> 
                      <td> Last Updated </td>
                      <td> Responsive </td>  
                    </tr>
                    <tr> 
                      <td> License </td>
                      <td> GNU GPL 2 </td>  
                    </tr>
                    <tr> 
                      <td> Tags </td>
                      <td> GNU GPL 2 </td>  
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</template>
<script>
  export default {
    // props: ['product'],
    data() {
      return {
        slug: this.$route.params.slug,
        product: {
          id: 1,
          slug: 'product-01',
          title: 'Product Title Goes Here 1'
        }
      }
    }
  }
</script>

<style>

</style>
