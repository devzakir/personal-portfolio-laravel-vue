<template>
  <div>
    <section class="not-found">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h2>The page you're looking for not found!</h2>
            <div class="buttons">
              <router-link :to="{name: 'home' }">Go Back to Home</router-link>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  export default {
  }
</script>

<style>

</style>
