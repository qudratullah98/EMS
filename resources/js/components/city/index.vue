<template>
    <div class="container">
      <div class="card">
        <div class="card-header">
          <router-link to="createCity" class=" float-end btn btn-outline-primary">New City</router-link>
        </div>
       <p class="alert alert-success " v-if="message.length>1">{{message}}</p>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(items, index) in city  " :key="index"  >
                    <td>{{ items.id}}</td>
                    <td>{{ items.name}}</td>
                      <td><router-link :to="{ path: 'EditCity/'+items.id}"   class="btn btn-outline-secondary m-1">Edit</router-link><a class="btn btn-outline-danger m-1" @click="CityDelete(items.id)">Delete</a></td>

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
            city:[],
            stat_id:"",
            message:""
        }
    },
     created(){
        this.GetData();
     },methods:{
        CityDelete( id){
            axios.get("api/DeleteCity/"+id).
            then(res=>{
                this.message="data deleted successfullay"
            })
        },
        GetData(){
            axios.get("/api/city")
            .then(res=>{
                this.city=res.data;
              
            });
        }
     }
  }
  </script>

