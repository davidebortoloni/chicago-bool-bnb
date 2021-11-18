<template>
    <section>
        <section class="search">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12 col-xl-9 mb-3">
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
                            col-6 col-xl-2
                            d-flex
                            align-items-center
                            justify-content-center
                            mb-3
                        "
                    >
                        <button
                            type="button"
                            class="btn btn-light"
                            v-on:click="show = !show"
                        >
                            Ricerca avanzata
                        </button>
                    </div>
                    <div
                        class="
                            col-6 col-xl-1
                            d-flex
                            justify-content-center
                            mb-3
                        "
                    >
                        <button
                            type="button"
                            class="btn btn-success btn-src"
                            @click="emitSearch()"
                        >
                            Cerca
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="advanced-search mt-5" v-if="show">
            <div class="container">
                <div class="row">
                    <div
                        class="
                            col-3
                            d-flex
                            justify-content-between
                            flex-wrap
                            form-group
                        "
                    >
                        <label for="distance">Distanza</label>
                        <select
                            name="distance"
                            class="form-control"
                            v-model="range"
                            id="distance"
                        >
                            <option value="5">5 km</option>
                            <option value="10">10 km</option>
                            <option value="20">20 km</option>
                            <option value="50">50 km</option>
                        </select>
                    </div>
                    <div class="col-9 p-0 services">
                        <ul
                            class="d-flex flex-wrap justify-content-between p-0"
                            id="services-list"
                        >
                            <li
                                v-for="service in services"
                                :key="service.id"
                                class="d-flex aling-items-center mx-2"
                            >
                                <label :for="service.name" class="mr-2">{{
                                    service.name
                                }}</label>
                                <input
                                    v-model="checkedServices"
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
            show: false,
            searchInput: "",
            services: [],
            baseUri: "http://127.0.0.1:8000/api/services",
            checkedServices: [],
            beds: 0,
            rooms: 0,
            range: "10",
        };
    },

    methods: {
        emitSearch() {
            this.$emit("search", [
                this.searchInput,
                this.checkedServices,
                this.range,
            ]);
        },
        getServices() {
            axios.get(`${this.baseUri}`).then((res) => {
                this.services = res.data;
            });
        },
    },
    created() {
        this.getServices();
    },
};
</script>

<style lang="scss" scoped>
#services-list {
    input {
        position: relative;
        top: 5px;
    }
}
</style>
