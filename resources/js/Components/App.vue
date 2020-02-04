<template>
  <div class="app">
    <Navbar></Navbar>
    <router-view></router-view>
    <Footer></Footer>
  </div>
</template>

<style>
</style>

<script>
import Navbar from './Navbar'
import Footer from './Footer'
export default {
  created(){
    this.$store.dispatch('GET_DRINKS')
  },
  components:{
    Footer,
    Navbar
  }
}
</script>