<template>
    <div class="container">
        <div class="card">
            <div class="card-header" v-if="!alert">

                Edit department
                <router-link to="/department" class="btn btn-outline-danger float-end">Back</router-link>
                <p class="alert alert-success m-4" v-if="message.length>0">{{ message }}</p>
            </div>





            <div class="card-body">
                <form @submit.prevent="Updatedepartment">


                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">
                            department
                        </label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control error" name="last_name" required
                                autocomplete="last_name" autofocus v-model="form.department" />
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Update Department</button>
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
                department: "",


            }
        }
    },
    created() {
        axios.get("/api/UpdatDepartment/" + this.$route.params.id)
            .then(res => {
                this.form.department = res.data.name;


            });

    },
    methods: {
        Updatedepartment() {
        }

    }



}
</script>

