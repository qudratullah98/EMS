<template>
    <div class="container">
        <div class="card">
            <div class="card-header" v-if="!alert">

                Create New Employee
                <router-link to="/employee" class="btn btn-outline-danger float-end">Back</router-link>
            </div>
            <div class="card-header" v-if="alert">

              <span class="alert alert-success" > Employee inserted successfull</span>
                <router-link to="/employee" class="btn btn-outline-danger float-end">Back</router-link>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveData">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            Name
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control error" name="name" required
                                autocomplete="name" autofocus v-model="form.name" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">
                            Last Name
                        </label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control error" name="last_name"
                                v-model="form.last_name" required autocomplete="last_name" autofocus />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            Address
                        </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control error" name="name" v-model="form.address"
                                required autocomplete="name" autofocus />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            Country
                        </label>

                        <div class="col-md-6">
                            <select class="form-control error" v-model="form.country" @change="getStat">
                                <option v-for="(item, index) in country" :key="index" :value="item.id">{{ item.name }}
                                </option>
                            </select>
                        </div>
                    </div>




                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            Stats
                        </label>

                        <div class="col-md-6">
                            <select class="form-control error" v-model="form.stats" @change="getCity">
                                <option v-for="(item, index) in stat" :key="index" :value="item.id">{{ item.name }}
                                </option>
                            </select>
                        </div>
                    </div>





                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            City
                        </label>

                        <div class="col-md-6">
                            <select class="form-control error" v-model="form.city">
                                <option v-for="(item, index) in city" :key="index" :value="item.id">{{ item.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">
                            Department
                        </label>

                        <div class="col-md-6">
                            <select class="form-control error" v-model="form.department">
                                <option v-for="(item, index) in department" :key="index" :value="item.id">{{ item.name
                                }}
                                </option>
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
export default {
    data() {
        return {
            country: [],
            stat: [],
            city: [],
            department: [],
            alert: false,
            form: {
                name: "",
                last_name: "",
                address: "",
                country: "",
                city: "",
                stats: "",
                department: ""
            }
        }
    }
    ,
    created() {
        this.getData();
        this.getDepartment();
    }
    ,
    methods: {
        getData() {
            axios.get("/api/gitEmployeeData").then(resu =>
                this.country = resu.data);
        },
        getStat() {
            axios.get("/api/gitStatData/" + this.form.country).then(res => this.stat = res.data)
                .catch(error => { console.log(console.error) })
        },
        getCity() {
            axios.get("/api/gitCityData/" + this.form.stats).then(res => this.city = res.data)
                .catch(error => { console.log(console.error) })
        },
        getDepartment() {
            axios.get("/api/getdapartment").then(res =>
                this.department = res.data
            )
        },
        saveData() {
            axios.post("/api/saveEmployee/", {
                name: this.form.name,
                last_name: this.form.last_name,
                address: this.form.address,
                country: this.form.country,
                stats: this.form.stats,
                city: this.form.city,
                department: this.form.department,
            }).then(res => { this.alert = true });

        }
    }
}
</script>

