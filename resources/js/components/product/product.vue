<template>
  <div class="product-box">
    <div class="image">
      <img :src="product.image" alt="" class="img-fluid">
    </div>
    <div class="info">
      <div class="title">
        <router-link :product="product" :to="{ name:'product', params: {slug: product.slug }}">{{product.title}}</router-link>
      </div>
      <div class="info-footer">
        <div class="category">
          <p>{{ product.category_name }}</p>
        </div>
        <div class="price">
          <p>Free</p>
        </div>
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
