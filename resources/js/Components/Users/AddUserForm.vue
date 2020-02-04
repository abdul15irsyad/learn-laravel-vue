<template>
  <div class="adduserform container py-3">
    <h3 class="text-center">Add User</h3>
    <form v-on:submit="addUser">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="eg: John Doe" v-model="form.name">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email"  placeholder="example@example.com" v-model="form.email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="your password..." v-model="form.password">
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary" v-if="form.name&&form.email&&form.password">Add</button>
        <router-link class="btn btn-secondary" to="/users">Cancel</router-link>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data(){ 
    return{
      form:{
        name: '',
        email: '',
        password: '',
      }
    }
  },
  methods: {
    addUser: function(e){
      e.preventDefault()
      axios.post(process.env.MIX_APP_URL+"users",this.form).then(response => {
        if(response.status==200                                                                                                                                                                                                                                                                                                             ){
          this.$router.push('/users')
        }
      });
    }
  }
}
</script>