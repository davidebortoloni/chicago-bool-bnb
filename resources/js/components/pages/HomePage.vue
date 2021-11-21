<template>
    <section id="home">
        <h1 class="mt-5 text-center">Benvenuto su BoolBnb</h1>
        <Search class="mb-2" @search="getApartments" />
        <div class="row justify-content-center flex-wrap w-100 m-0">
            <ApartmentCard
                v-for="apartment in apartments.data"
                :key="apartment.id"
                :apartment="apartment"
                class="m-3"
            />
        </div>
        <div class="d-flex justify-content-center">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <!-- <button type="button" class="btn btn-secondary">←</button> -->
            <button type="button" class="btn btn-secondary" v-for="n in apartments.last_page" :key="n" @click="getApartments(['', []], n)">{{n}}</button>
            <!-- <button type="button" class="btn btn-secondary">→</button> -->
        </div>
        </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";
import Search from "../apartments/Search.vue";
import ApartmentCard from "../apartments/ApartmentCard.vue";

export default {
    name: "Index",
    components: {
        Search,
        ApartmentCard,
    },
    data() {
        return {
            show: false,
            apartments: [],
            baseUri: "http://127.0.0.1:8000/api/apartments",
        };
    },
    computed: {},
    methods: {
        getApartments(search = ["", []], page = 1) {
            console.log(search);
            const checkedServices = search[1];
            const distance = search[3];
            if (search[0] != "") {
                axios
                    .get(
                        `https://api.tomtom.com/search/2/geocode/${search[0]}.json?key=vtdFSJllnslhwVN2fYmWoOC1byNKWxbG`
                    )
                    .then((res) => {
                        const position = res.data.results[0].position;
                        const lat = position.lat;
                        const lon = position.lon;
                        console.log(position);
                        axios
                            .get(
                                `${this.baseUri}/?lat=${lat}&lon=${lon}&distance=${distance}&page=${page}`
                            )
                            .then((r) => {
                                this.apartments = r.data;
                                console.log(r.data);
                                const filteredApartments = [];
                                if (checkedServices.length) {
                                    this.apartments.data.forEach(
                                        (apartment) => {
                                            let counter = 0;
                                            apartment.services.forEach(
                                                (service) => {
                                                    if (
                                                        checkedServices.includes(
                                                            service.name
                                                        )
                                                    ) {
                                                        counter++;
                                                        if (
                                                            !filteredApartments.includes(
                                                                apartment
                                                            ) &&
                                                            counter ==
                                                                checkedServices.length
                                                        ) {
                                                            filteredApartments.push(
                                                                apartment
                                                            );
                                                        }
                                                    }
                                                }
                                            );
                                        }
                                    );
                                    this.apartments.data = filteredApartments;
                                }
                            });
                    });
            } else {
                axios.get(`${this.baseUri}?page=${page}`).then((res) => {
                    this.apartments = res.data;
                    console.log(this.apartments)
                    const filteredApartments = [];
                    if (checkedServices.length) {
                        this.apartments.data.forEach((apartment) => {
                            let counter = 0;
                            apartment.services.forEach((service) => {
                                if (checkedServices.includes(service.name)) {
                                    counter++;
                                    if (
                                        !filteredApartments.includes(
                                            apartment
                                        ) &&
                                        counter == checkedServices.length
                                    ) {
                                        filteredApartments.push(apartment);
                                    }
                                }
                            });
                        });
                        this.apartments.data = filteredApartments;
                    }
                });
            }
        },

        setCurrentApartment(index) {
            this.currentApartment = index;
        },
    },
    created() {
        this.getApartments();
    },
};
</script>
