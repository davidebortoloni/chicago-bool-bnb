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
                            @click="showComponent()"
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

        <section
            class="advanced-search mt-5"
            :class="show === false ? '' : 'd-none'"
        >
            <div class="container">
                <div class="row">
                    <!-- <div class="col-2">
                    <div class="d-flex">
                        <label for="n_beds">Letti:</label>
                        <select v-model="beds" name="n_beds" id="n_beds" class="mx-2">
                            <option value="0"></option>
                            <option  v-for="n in 10" :key="n" :value="n">
                                {{ n }}
                            </option>
                        </select>
                    </div>

                    <div class="d-flex ">
                        <label for="rooms">Stanze:</label>
                        <select v-model="rooms" name="rooms" id="rooms" class="mx-2">
                            <option value=""></option>
                            <option  v-for="n in 10" :key="n" :value="n">
                                {{ n }}
                            </option>
                        </select>
                    </div>
                    </div> -->

                    <div class="col-12 p-0">
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
            show: true,
            searchInput: "",
            services: [],
            baseUri: "http://127.0.0.1:8000/api/services",
            checkedServices: [],
            beds: 0,
            rooms: 0,
        };
    },

    methods: {
        showComponent() {
            return (this.show = !this.show);
        },
        emitSearch() {
            this.$emit("search", [
                this.searchInput,
                this.checkedServices,
                this.beds,
                this.rooms,
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
