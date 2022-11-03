<template>
    <div class="container">
        <div class="card">
            <div class="card-header" v-if="!alert">

                Edit Country
                <router-link to="/country" class="btn btn-outline-danger float-end">Back</router-link>
            </div>
            <div class="card-header" v-if="alert">

              <span class="alert alert-success" > Employee inserted successfull</span>
                <router-link to="/employee" class="btn btn-outline-danger float-end">Back</router-link>
            </div>

            <div class="card-body">
                <form @submit.prevent="UpdateEmployee">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                           Country
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control error" name="name" required
                                autocomplete="name" autofocus v-model="form.country" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">
                           Code
                        </label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control error" name="last_name"
                                 required autocomplete="last_name" autofocus v-model="form.code" />
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
export default {
    data() {
        return{
            form:{
                country:"",
                code:"",

            }
        }
    },
    created(){
        axios.get("/api/editCountry/"+this.$route.params.id)
        .then(res=>{
           this.form.country=res.data.name;
           this.form.code=res.data.country_code;
        })
    }


}
</script>

