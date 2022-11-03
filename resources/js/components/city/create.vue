<template>
    <div class="container">
        <div class="card">
            <div class="card-header" >
                <p  v-if="message.length>0" class="alert alert-success">{{message}}</p>
                <h4>  Create New City</h4>

                <router-link to="/City" class="btn btn-outline-danger float-end">Back</router-link>
            </div>
            <div class="card-header" >

            </div>

            <div class="card-body">
                <form @submit.prevent="saveData">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                           City Name
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control error" name="name" required
                              v-model="form.city"  autocomplete="name" autofocus  />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">
                        Stats
                        </label>

                        <div class="col-md-6">

                            <select  class="form-control error" autofocus v-model="form.stat_id" >
                                <option :value="item.id "  v-for="(item,index) in stat" :key="index"> {{item.name}} </option>
                            </select>

                        </div>
                    </div>



                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                    stat:[],
                form:{
                     city:"",
                     stat_id:"",
                },
                message:"",
            }
        },
        created(){this.getData()},
        methods:{
            getData(){
                axios.get("/api/getstat").then(res=>{ this.stat=res.data })

            },
            saveData(){
                axios.post("api/city/store",{
                   name: this.form.city,
                   stat_id:this.form.stat_id
                }).then(res=>
                {this.message=res.data.message; })
            }
        }
    }
</script>

