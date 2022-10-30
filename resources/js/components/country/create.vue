<template>
    <div class="container">
        <div class="card">
            <div class="card-header" >
                <p>{{message}}</p>
                Create New country
                <router-link to="/country" class="btn btn-outline-danger float-end">Back</router-link>
            </div>
            <div class="card-header" >

            </div>

            <div class="card-body">
                <form @submit.prevent="saveData">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                           Country Name
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control error" name="name" required
                              v-model="form.country"  autocomplete="name" autofocus  />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">
                           country
                           code
                        </label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control error" name="last_name"
                              v-model="form.country_code" required autocomplete="last_name" autofocus />
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

                form:{
                     country:"",
                     country_code:"",
                },
                message:"",
            }
        },
        methods:{
            saveData(){
                axios.post("/api/country/store",{
                    country:this.form.country,
                    country_code:this.form.country_code,
                }).then(res=>{this.message="data inserted successful "})
            }
        }
    }
</script>

