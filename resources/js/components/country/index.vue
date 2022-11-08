<template>
    <div class="container">
      <div class="card">
        <div class="card-header">
        <strong>Country List</strong>

          <router-link to="/country/create" class=" float-end btn btn-outline-primary">New country</router-link>
        </div>
       <p class="alert alert-success " v-if="message.length>1">{{message}}</p>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Code</th>
                <th scope="col-2"> </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(items, index) in employe  " :key="index"  >
                    <td>{{ items.id}}</td>
                    <td>{{ items.name}}</td>
                    <td>{{ items.country_code}}</td>
                    <td> </td>
                      <td><router-link :to="{ path: 'Editcountry/'+items.id}"   class="btn btn-outline-secondary m-1">Edit</router-link><button class="btn btn-outline-danger m-1" @click="countryDelete(items.id)">Delete</button></td>

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
          this.getCountry();
      },
      methods: {
          getCountry(){
              axios.get("/api/country").then(res=>
                 this.employe=res.data
              );
          },
          countryDelete(id){
              axios.get("/api/country/delete/"+id).then(res=>{this.message=res.data;this.getCountry()})
          }
      },
  }
  </script>

