<template>
  <div class="container drinks">
    <div class="row justify-content-end">
      <div class="col-auto pt-3">
        <router-link class="btn btn-primary" to="/form/adddrink">Add Drink</router-link>
      </div>
    </div>
    <div class="row">
      <div class="col text-center mt-3" v-if="drinks.length==0">
        <div class="alert alert-danger" role="alert">There is no drink!</div>
      </div>
      <div class="col-md-4 mt-3" v-for="drink in drinks" :key="drink.id_drink">
        <div class="card">
          <!-- <img src="img/default_profil.png" class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h4 class="card-title mb-0">{{drink.name}}</h4>
            <p class="card-text text-price">Rp {{drink.price}}</p>
            <div class="text-right">
            <router-link class="btn btn-info" :to="`/form/editdrink/${drink.id_drink}`">Edit</router-link>
              <button class="btn btn-danger" v-on:click="deleteData(drink.id_drink)">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .text-price{
    color: rgb(160, 160, 160);
  }
</style>

<script>
import {mapState} from 'vuex'
export default {
  computed: {
    drinks(){
      let drinks = this.$store.state.drinks.sort((a,b)=>(a.name.toLowerCase() > b.name.toLowerCase()) ? 1 : ((b.name.toLowerCase() > a.name.toString()) ? -1 : 0))
      return this.$store.state.drinks
    }
  },
  methods: {
    deleteData: function(id){
      axios.delete(process.env.MIX_APP_URL+"drinks/"+id).then((response)=>{
        if(response.status==200){
          this.$store.dispatch('SET_DRINKS',{drinks:this.$store.state.drinks.filter(drink=>drink.id_drink!=id)})
        }
      });
    }
  }
}
</script>