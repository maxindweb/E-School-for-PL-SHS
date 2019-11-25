window.Vue = require('vue');

import Vuetify from 'vuetify'
import 'vuetify/lib'
import axios from 'axios'
import router from './router'

Vue.use(Vuetify)
window.axios = axios.create()

import RootApp from './components/RootApp.vue';
const app = new Vue({
    el:'#app',
    router,
    component: [
        RootApp
    ]
})

