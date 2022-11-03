import index from './components/employee/index.vue'
import edit from './components/employee/edit.vue'
import create from './components/employee/create.vue'

import city from './components/city/index.vue'
import EditCity from './components/city/edit.vue'
import createCity from './components/city/create.vue'


import editCountry from './components/country/edit.vue'
import countryIndex from  './components/country/index.vue'
import countrycreate from  './components/country/create.vue'


import statIndex from  './components/stat/index.vue'


import departmentIndex from  './components/department/index.vue'

export const routes= [
    {
        path: "/employee",
        component:index
    },{
        path: "/employee/create",
        component:create
    },

    { path: '/EditEmployee/:id', component: edit },
    { path: '/Editcountry/:id', component: editCountry },
    { path: '/country', component: countryIndex },
    { path: '/country/create', component: countrycreate },
    { path: '/city', component: city },

    { path: '/EditCity/:id', component: EditCity },
    { path: '/createCity', component: createCity },


    { path: '/stat', component: statIndex },

    {path:"/department",component:departmentIndex},


];
