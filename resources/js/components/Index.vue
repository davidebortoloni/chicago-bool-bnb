<template>
    <section>
        <Search class="mb-5" @search="getApartments" />
        <div class="row justify-content-center flex-wrap w-100">
            <!-- <div v-for="(apartment, index) in apartments.data" :key="index"> 
            {{ apartment.description }}
        </div> -->
            <ApartmentCard
                @click="showComponent()"
                v-for="apartment in apartments.data"
                :key="apartment.id"
                :apartment="apartment"
                class="m-3"
            />
            <ApartmentShow :class="show === false ? '' : 'd-none'" />
        </div>
    </section>
</template>

<script>
import axios from "axios";
import Search from "./Search.vue";
import ApartmentCard from "./ApartmentCard.vue";
import ApartmentShow from "./ApartmentShow.vue";

export default {
    name: "Index",
    components: {
        Search,
        ApartmentCard,
        ApartmentShow,
    },
    props: ["apartments"],
    data() {
        return {
            show: true,
            apartments: [],
            baseUri: "http://127.0.0.1:8000/api/apartments",
        };
    },
    computed: {},
    methods: {
        getApartments(query) {
            const params = {
                params: {
                    query,
                },
            };
            axios.get(`${this.baseUri}`, params).then((res) => {
                this.apartments = res.data;
                console.log(this.apartments);
            });
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

<style></style>
