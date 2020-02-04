<template>
<div>
  <div class="space"></div>
  <div class="footer text-center p-3 bg-dark text-white">
    <p class="m-0">&copy;copyright irsyad abdul, {{year}}</p>
  </div>
</div>
</template>

<style scoped>
.space{
  margin-bottom: 80px;
}
.footer{
  box-shadow: 0px -3px 3px rgba(0, 0, 0, 0.26);
  bottom: 0;
  left: 0;
  right: 0;
  margin: 0 auto;
  position: fixed;
  width: 100%;
}
</style>

<script>
const d = new Date()
export default {
  data(){
    return{
      year: d.getFullYear()
    }
  }
}
</script>