import Home from './Components/Home/Home.vue'

//Users
import Users from './Components/Users/Users.vue'
import AddUserForm from './Components/Users/AddUserForm.vue'
import EditUserForm from './Components/Users/EditUserForm.vue'

//Drinks
import Drinks from './Components/Drinks/Drinks.vue'
import AddDrinkForm from './Components/Drinks/AddDrinkForm.vue'
import EditDrinkForm from './Components/Drinks/EditDrinkForm.vue'

export const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      title: 'Home | Laravel Vue'
    }
  },{
    path: '/users',
    name: 'users',
    component: Users,
    meta: {
      title: 'Users | Laravel Vue'
    }
  },{
    path: '/form/adduser',
    name: 'add user',
    component: AddUserForm,
    meta: {
      title: 'Add User | Laravel Vue'
    }
  },{
    path: '/form/edituser/:id_user',
    name: 'edit user',
    props: true,
    component: EditUserForm,
    meta: {
      title: 'Edit User | Laravel Vue'
    }
  },{
    path: '/drinks',
    name: 'drinks',
    component: Drinks,
    meta: {
      title: 'Drinks | Laravel Vue'
    }
  },{
    path: '/form/adddrink',
    name: 'add drink',
    component: AddDrinkForm,
    meta: {
      title: 'Add Drink | Laravel Vue'
    }
  },{
    path: '/form/editdrink/:id_drink',
    name: 'edit drink',
    props: true,
    component: EditDrinkForm,
    meta: {
      title: 'Edit Drink | Laravel Vue'
    }
  }
]