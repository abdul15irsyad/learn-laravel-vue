<template>
  <div class="container users">
    <div class="row justify-content-end">
      <div class="col-auto pt-3">
        <router-link class="btn btn-primary" to="/form/adduser">Add User</router-link>
      </div>
    </div>
    <div class="row">
      <div class="col text-center mt-3" id="no_user" v-show="isLoaded&&users.length==0">
        <div class="alert alert-danger" role="alert">There is no user!</div>
      </div>
      <div class="col-md-4 mt-3" v-for="user in users" :key="user.id_user">
        <div class="card">
          <!-- <img src="img/default_profil.png" class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h4 class="card-title mb-0">{{user.name}}</h4>
            <p class="card-text text-email">{{user.email}}</p>
            <!-- <p class="card-text"></p> -->
            <div class="text-right">
            <router-link class="btn btn-info" :to="`/form/edituser/${user.id_user}`">Edit</router-link>
              <button class="btn btn-danger" v-on:click="deleteData(user.id_user)">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .text-email{
    color: rgb(160, 160, 160);
  }
</style>

<script>
export default {
  data(){
    return{
      users: [],
      isLoaded: false
    }
  },
  created() {
    this.loadUser();
  },
  methods: {
    loadUser(){
      axios.get(process.env.MIX_APP_URL+"users").then(response => {
        if(response.status==200){
          this.users = response.data.users
          this.users.sort((a,b)=>(a.name.toLowerCase() > b.name.toLowerCase()) ? 1 : ((b.name.toLowerCase() > a.name.toString()) ? -1 : 0));
          this.isLoaded = true
        }
      });
    },
    deleteData: function(id){
      axios.delete(process.env.MIX_APP_URL+"users/"+id).then((response)=>{
        if(response.status==200){
          this.users = this.users.filter((user)=>user.id_user!=id)
        }
      });
    }
  }
}
</script>