<template>
  <div class="adddrinkform container py-3">
    <h3 class="text-center">Add Drink</h3>
    <form v-on:submit="addDrink">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="eg: Es Teh Manis" v-model="drink.name">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="price" class="form-control" id="price"  placeholder="Cheap please..." v-model="drink.price">
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary" v-if="drink.name&&drink.price">Add</button>
        <router-link class="btn btn-secondary" to="/drinks">Cancel</router-link>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data(){ 
    return{
      drink:{
        name: '',
        price: '',
      }
    }
  },
  methods: {
    addDrink: function(e){
      e.preventDefault()
      axios.post(process.env.MIX_APP_URL+"drinks",this.drink).then(response => {
        if(response.status==200){
          this.drink.id_drink=response.data.data.id_drink
          this.$store.dispatch('ADD_DRINK',{drink:this.drink})
          this.$router.push('/drinks')
        }
      });
    }
  }
}
</script>