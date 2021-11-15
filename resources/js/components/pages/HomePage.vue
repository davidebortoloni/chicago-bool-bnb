<template>
    <section class="text-center">
        <Search class="mb-5" @search="getApartments" />
        <div class="row justify-content-center flex-wrap w-100">
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
    computed: {
    },
    methods: {
        getApartments(search = ['', []]) {
            const checkedServices = search[1];
            axios.get(`${this.baseUri}?city=${search[0]}`).then((res) => {
                this.apartments = res.data;
                const filteredApartments = [];
                if (checkedServices.length || (beds >= 0 && beds < 10) || (rooms >= 0 && rooms < 10) ) {
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
