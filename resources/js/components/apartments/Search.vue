<template>
    <section>
        <section>
            <h1 class="mt-5">Benvenuto su BoolBnb</h1>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-9">
                        <input
                            type="text"
                            class="form-control search-bar"
                            placeholder="Dove vuoi andare?"
                            v-model.trim="searchInput"
                            @keyup.enter="emitSearch()"
                        />
                    </div>
                    <div
                        class="
                            col-2
                            d-flex
                            align-items-center
                            justify-content-center
                        "
                    >
                        <button
                            type="button"
                            class="btn btn-light"
                            @click="showComponent()"
                        >
                            Ricerca avanzata
                        </button>
                    </div>
                    <div class="col-1">
                        <button
                            type="button"
                            class="btn btn-success"
                            @click="emitSearch()"
                        >
                            Cerca
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="advanced-search mt-5"
            :class="show === false ? '' : 'd-none'"
        >
            <div class="container">
                <div class="row">
                <div class="col-2 d-flex justify-content-between form-group">
                    <label for="distance">Distanza</label>
                    <select name="distance" class="form-control ml-2" v-model="range" id="distance">
                        <option value="5">5 km</option>
                        <option value="10">10 km</option>
                        <option value="20">20 km</option>
                        <option value="50">50 km</option>
                    </select>
                    </div>

                    <div class="col">
                        <ul class="d-flex flex-wrap" id="services-list">
                            <li v-for="service in services" :key="service.id" class="d-flex justify-content-between aling-items-center mx-3">
                                <label :for="service.name" class="mr-2">{{service.name}}</label>
                                <input v-model="checkedServices"
                                    type="checkbox"
                                    :name="service.name"
                                    :id="service.name"
                                    :value="service.name"
                                />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
export default {
    name: "Search",

    data() {
        return {
            show: true,
            searchInput: "",
            services: [],
            baseUri: 'http://127.0.0.1:8000/api/services',
            checkedServices:[],
            beds:0,
            rooms:0,
            range: '10',
        };
    },

    methods: {
        showComponent() {
            return (this.show = !this.show);
        },
        emitSearch() {
            this.$emit("search", [this.searchInput, this.checkedServices, this.range]);
        },
        getServices() {
            axios.get(`${this.baseUri}`).then(res => {
                this.services = res.data;
            })
        }
    },
    created(){
        this.getServices()
    }
};
</script>

<style lang="scss" scoped>
    #services-list{
        input{
            position: relative;
            top: 5px;
        }
    }
</style>