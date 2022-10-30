import index from './components/employee/index.vue'
import edit from './components/employee/edit.vue'
import create from './components/employee/create.vue'
import countryIndex from  './components/country/index.vue'
import countrycreate from  './components/country/create.vue'
export const routes= [
    {
        path: "/employee",
        component:index
    },{
        path: "/employee/create",
        component:create
    },

    { path: '/EditEmployee/:id', component: edit },
    { path: '/country', component: countryIndex },
    { path: '/country/create', component: countrycreate },


];
