<template>
    <div class="row justify-content-center flex-wrap w-100">
        <!-- <div v-for="(apartment, index) in apartments.data" :key="index"> 
            {{ apartment.description }}
        </div> -->
        <ApartmentCard
            v-for="(apartment, index) in apartments.data"
            :key="index"
            :apartment="apartment"
            class="m-3"
        />
        <ApartmentShow class="d-none" @click="setCurrentApartment(index)" />
    </div>
</template>

<script>
import ApartmentCard from "./ApartmentCard.vue";
import ApartmentShow from "./ApartmentShow.vue";

export default {
    name: "Index",
    components: {
        ApartmentCard,
        ApartmentShow,
    },
    data() {
        return {
            apartments: [],
        };
    },
    computed: {},
    methods: {
        getApartments() {
            axios.get("http://127.0.0.1:8000/api/apartments").then((res) => {
                this.apartments = res.data;
                console.log(this.apartments);
            });
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

<style></style>
