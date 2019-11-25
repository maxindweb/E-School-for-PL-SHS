import Vue from 'vue';
import VueRouter from 'vue-router'
import RootApp from './components/RootApp.vue'
import RootParent from './components/Parent/RootParent.vue'
import RootTeacher from './components/Teachers/RootTeacher.vue'
import RootStudent from './components/Student/RootStudent.vue'
import LandingPage from './components/LandingPage.vue';

Vue.use(VueRouter)

const routes = [
    {path: '/', component: RootApp,
    children: [
        {path: '/', component: LandingPage}
    ]
    },
    
    {path: '/teacher', component: RootTeacher},
    {path: '/parent', component: RootParent},
    {path: '/student', component: RootStudent}
]

const router = new VueRouter({
    routes,
    hasbang:false,
    mode:'history'
})

export default router;