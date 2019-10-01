<template>
    <div>
      <Header/>
      <Products/>
    </div>
</template>

<script>

import Header from './includes/Header';
import Products from '../components/product/Products';
export default {
  name: 'app',
  components: {
    Header,
    Products,
  }
}

</script>

<style>

</style>
