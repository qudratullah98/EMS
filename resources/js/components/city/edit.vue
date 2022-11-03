<template>
    <div class="container">
        <div class="card">
            <div class="card-header" v-if="!alert">

                Edit City
                <router-link to="/city" class="btn btn-outline-danger float-end">Back</router-link>
                <p class="alert alert-success m-4" v-if="message.length>0">{{ message }}</p>
            </div>





            <div class="card-body">
                <form @submit.prevent="UpdateCity">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            City
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control error" name="name" required
                                autocomplete="name" autofocus v-model="form.city" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">
                            stat
                        </label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control error" name="last_name" required
                                autocomplete="last_name" autofocus v-model="form.stat" />
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Update City</button>
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
        return {
            message: "",
            form: {
                city: "",
                stat: "",

            }
        }
    },
    created() {
        axios.get("/api/editCity/" + this.$route.params.id)
            .then(res => {
                this.form.city = res.data.name;
                this.form.stat = res.data.stat_id;

            });

    },
    methods: {
        UpdateCity() {
            axios.post("/api/UpdatCity/"+this.$route.params.id,{
            name:this.form.city,
            stat_id:this.form.stat

        }).then(res=>{
            this.message=res.data.message;
            this.form.city="";
            this.form.stat=""
        })
        }

    }



}
</script>

