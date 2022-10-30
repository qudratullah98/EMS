<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <router-link to="/employee/create" class=" float-end btn btn-outline-primary">New Employee</router-link>
      </div>
     <p class="alert alert-success " v-if="message.length>1">{{message}}</p>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(items, index) in employe  " :key="index"  >
                  <td>{{ items.id}}</td>
                  <td>{{ items.name}}</td>
                  <td>{{ items.last_name}}</td>
                  <td>{{ items.addrass}}</td>
                    <td><router-link :to="{ path: 'EditEmployee/'+items.id}"   class="btn btn-outline-secondary m-1">Edit</router-link><a class="btn btn-outline-danger m-1" @click="EmployeeDelete(items.id)">Delete</a></td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default{
   data(){
    return{
        employe:[],

        name:"ddata",
        message:""
    }
   },
    created(){
        this.getEmployee();
    },
    methods: {
        getEmployee(){
            axios.get("/api/employee").then(res=>
               this.employe=res.data
            );
        },
        EmployeeDelete(id){
            axios.get("/api/employee/delete/"+id).then(res=>{this.message=res.data;this.getEmployee()})
        }
    },
}
</script>

