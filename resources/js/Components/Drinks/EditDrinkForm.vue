<template>
  <div class="edit-drink-form container py-3">
    <h3 class="text-center">Edit User</h3>
    <form v-on:submit="saveDrink" v-if="drink">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="eg: Es Teh Manis" v-model="drink.name">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="price" class="form-control" id="price"  placeholder="Cheap please..." v-model="drink.price">
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary" v-if="drink.name&&drink.price">Save</button>
        <router-link class="btn btn-secondary" to="/drinks">Cancel</router-link>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  computed: {
    drink(){
      return this.$store.getters.getDrink(this.$route.params.id_drink)
    }
  },
  methods: {
    saveDrink: function(e){
      e.preventDefault()
      axios.put(process.env.MIX_APP_URL+"drinks/"+this.$route.params.id_drink,this.form).then(response => {
        if(response.status==200){
          this.$store.dispatch('SAVE_DRINK',{id:this.drink.id_drink,drink:this.drink})
          this.$router.push('/drinks')
        }
      });
    }
  },
}
</script>