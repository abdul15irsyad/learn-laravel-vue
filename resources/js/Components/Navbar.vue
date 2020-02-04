<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <router-link class="navbar-brand" to="/">Laravel Vue</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li> -->
          <li class="nav-item">
            <router-link class="nav-link" to="/users">Users</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/drinks">Drinks</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
nav{
  box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.26)
}
</style>

<script>
export default {
  
}
</script>