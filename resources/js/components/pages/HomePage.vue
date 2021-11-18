<template>
    <section class="">
        <h1 class="mt-5 text-center">Benvenuto su BoolBnb</h1>
        <Search class="mb-2" @search="getApartments" />
        <div class="row justify-content-center flex-wrap w-100 m-0">
            <ApartmentCard
                @click="showComponent()"
                v-for="apartment in apartments.data"
                :key="apartment.id"
                :apartment="apartment"
                class="m-3"
            />
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
            show: true,
            apartments: [],
            baseUri: "http://127.0.0.1:8000/api/apartments",
        };
    },
    computed: {},
    methods: {
        getApartments(search = ['', []]) {
            console.log(search);
            const checkedServices = search[1];
            const distance = search[3]
            if(search[0] != ''){
                axios.get(`https://api.tomtom.com/search/2/geocode/${search[0]}.json?key=vtdFSJllnslhwVN2fYmWoOC1byNKWxbG`).then(res => {
                   const position = res.data.results[0].position;
                   const lat = position.lat;
                   const lon = position.lon;
                    console.log(position);
                   axios.get(`${this.baseUri}/?lat=${lat}&lon=${lon}&distance=${distance}`).then((r) => {
                    this.apartments = r.data;
                    console.log(r.data);
                    const filteredApartments = [];
                    if (checkedServices.length) {
                        this.apartments.data.forEach(apartment => {
                            let counter = 0;
                            apartment.services.forEach((service) => {
                                if(checkedServices.includes(service.name)) {
                                    counter++;
                                    if(!filteredApartments.includes(apartment) && counter == (checkedServices.length)) {
                                        filteredApartments.push(apartment);
                                    }
                                }
                            })
                        })
                        this.apartments.data = filteredApartments;
                    }

                    }
                )
                })
                } else{
            axios.get(`${this.baseUri}`).then((res) => {
                this.apartments = res.data;
                const filteredApartments = [];
                if (checkedServices.length) {
                    this.apartments.data.forEach(apartment => {
                        let counter = 0;
                        apartment.services.forEach((service) => {
                            if (checkedServices.includes(service.name)) {
                                counter++;
                                if (
                                    !filteredApartments.includes(apartment) &&
                                    counter == checkedServices.length
                                ) {
                                    filteredApartments.push(apartment);
                                }
                            }
                        });
                    });
                    this.apartments.data = filteredApartments;
                }

                }
            )}
        },

        setCurrentApartment(index) {
            this.currentApartment = index;
        },

        showComponent() {
            console.log(this.show);
            return (this.show = !this.show);
        },
    },
    created() {
        this.getApartments();
    },
};
</script>
