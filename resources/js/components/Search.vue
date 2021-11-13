<template>
    <section>
        <section>
            <h1 class="mt-5">BoolBnB</h1>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-9">
                        <input
                            type="text"
                            class="form-control search-bar"
                            placeholder="Dove vuoi andare?"
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
                        <button type="button" class="btn btn-success">
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
                <div class="row text-left d-flex">
                    <div class="col-1 d-flex justify-content-between">
                        <label for="n_beds">Letti:</label>
                        <select name="n_beds" id="n_beds" class="mx-2">
                            <option value="n_beds" v-for="n in 10" :key="n">
                                {{ n }}
                            </option>
                        </select>
                    </div>

                    <div class="col-1 d-flex justify-content-between">
                        <label for="rooms">Stanze:</label>
                        <select name="rooms" id="rooms" class="mx-2">
                            <option value="rooms" v-for="n in 5" :key="n">
                                {{ n }}
                            </option>
                        </select>
                    </div>

                    <div class="col-3">
                        <ul>
                            <li class="d-flex justify-content-between">
                                <label for="Wi-Fi">Wi-Fi:</label>
                                <input
                                    type="checkbox"
                                    name="Wi-Fi"
                                    id="Wi-Fi"
                                />
                            </li>

                            <li class="d-flex justify-content-between">
                                <label for="Aria condizionata"
                                    >Aria condizionata:</label
                                >
                                <input
                                    type="checkbox"
                                    name="Aria condizionata"
                                    id="Aria condizionata"
                                />
                            </li>

                            <li class="d-flex justify-content-between">
                                <label for="Lavatrice">Lavatrice:</label>
                                <input
                                    type="checkbox"
                                    name="Lavatrice"
                                    id="Lavatrice"
                                />
                            </li>

                            <li class="d-flex justify-content-between">
                                <label for="Posto auto">Posto auto:</label>
                                <input
                                    type="checkbox"
                                    name="Posto auto"
                                    id="Posto auto"
                                />
                            </li>

                            <li class="d-flex justify-content-between">
                                <label for="Televisione">Televisione:</label>
                                <input
                                    type="checkbox"
                                    name="Televisione"
                                    id="Televisione"
                                />
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <ul>
                            <li class="d-flex justify-content-between">
                                <label for="Lavastoviglie"
                                    >Lavastoviglie:</label
                                >
                                <input
                                    type="checkbox"
                                    name="Lavastoviglie"
                                    id="Lavastoviglie"
                                />
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <ul>
                            <li class="d-flex justify-content-between">
                                <label for="Ascensore">Ascensore:</label>
                                <input
                                    type="checkbox"
                                    name="Ascensore"
                                    id="Ascensore"
                                />
                            </li>

                            <li class="d-flex justify-content-between">
                                <label for="Asciugacapelli"
                                    >Asciugacapelli:</label
                                >
                                <input
                                    type="checkbox"
                                    name="Asciugacapelli"
                                    id="Asciugacapelli"
                                />
                            </li>

                            <li class="d-flex justify-content-between">
                                <label for="Vasca da bagno"
                                    >Vasca da bagno:</label
                                >
                                <input
                                    type="checkbox"
                                    name="Vasca da bagno"
                                    id="Vasca da bagno"
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
    name: "Header",
    props: ["apartments", "addresses", "services"],

    data() {
        return {
            show: false,
        };
    },

    methods: {
        showComponent() {
            return (this.show = !this.show);
        },
    },
};
</script>
