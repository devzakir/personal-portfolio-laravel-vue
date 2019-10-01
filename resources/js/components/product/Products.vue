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
          <div class="buttons text-center">
            <a href="#">Load More</a>
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
        products: [
          {
            id: 1,
            slug: 'product-01',
            title: 'Product Title Goes Here 1'
          },
          {
            id: 2,
            slug: 'product-02',
            title: 'Product Title Goes Here 2'
          },
          {
            id: 3,
            slug: 'product-03',
            title: 'Product Title Goes Here 3'
          },
          {
            id: 4,
            slug: 'product-04',
            title: 'Product Title Goes Here 4'
          },
          {
            id: 5,
            slug: 'product-05',
            title: 'Product Title Goes Here 5'
          },
          {
            id: 6,
            slug: 'product-06',
            title: 'Product Title Goes Here 6'
          },
        ],
      }
    },
    components: {
      Product,
    }
  }
</script>
<style>

</style>
