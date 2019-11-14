<template>
    <div>
      <Header/>
      <Services/>
      <Promote/>
    </div>
</template>

<script>

import Header from './includes/Header';
import Services from './includes/Services';
import Promote from './includes/Promote';
export default {
  name: 'app',
  components: {
    Header, 
    Services,
    Promote,
  }
}

</script>

<style>

</style>
