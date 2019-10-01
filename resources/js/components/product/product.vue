<template>
  <div class="product-box">
    <div class="image">
      <img src="../../images/portfolio1.jpg" alt="" class="img-fluid">
    </div>
    <div class="info">
      <div class="title">
        <router-link :product="product" :to="{ name:'product', params: {slug: product.slug }}">{{product.title}}</router-link>
        <p>Category</p>
      </div>
      <div class="price">
        <p>Free</p>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['product'],
  }
</script>

<style>

</style>
