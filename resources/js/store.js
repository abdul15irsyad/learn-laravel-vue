import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    // drinks: [
    //   {id_drink:1,name:'Es Teh Manis',price:3000},
    //   {id_drink:2,name:'Es Jeruk',price:4000},
    //   {id_drink:3,name:'Jus Jambu',price:9000},
    // ]
    drinks: []
  },
  mutations: {
    SET_DRINKS: (state, { drinks }) => {
      state.drinks = drinks
    },
    SAVE_DRINK: (state, {id,drink})=>{
      state.drinks = [
        ...state.drinks.filter(drink=>drink.id_drink!=id),
        drink
      ]
    }
  },
  getters: {
    getDrink: state=>id_drink=>{
      return state.drinks.find(drink=>drink.id_drink==id_drink)
    }
  },
  actions: {
    GET_DRINKS: function ({ commit }) {
      Axios.get(process.env.MIX_APP_URL+'drinks').then(res => {
        commit('SET_DRINKS', { drinks:res.data.drinks})
      }, (err) => {
        console.log(err)
      })
    },
    SET_DRINKS: function(context,{drinks}){
      context.commit('SET_DRINKS', {drinks})
    },
    SAVE_DRINK: function(context,{id,drink}){
      let drinks = [
        ...context.state.drinks.filter(drink=>drink.id_drink!=id),
        drink
      ]
      context.commit('SET_DRINKS', {drinks})
    },
    ADD_DRINK: function(context,{drink}){
      let drinks = [
        ...context.state.drinks,
        drink
      ]
      context.commit('SET_DRINKS', {drinks})
    },
  },
  modules: {

  }
})