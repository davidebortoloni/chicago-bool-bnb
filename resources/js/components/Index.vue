<template>
    <div class="row justify-content-center flex-wrap w-100">
        <!-- <div v-for="(apartment, index) in apartments.data" :key="index"> 
            {{ apartment.description }}
        </div> -->
        <ApartmentCard
            v-on:click="showComponent()"
            v-for="apartment in apartments.data"
            :key="apartment.id"
            :apartment="apartment"
            class="m-3"
            :class="show === true ? '' : 'd-none'"
        />
        <ApartmentShow class="d-none" :class="show === true ? '' : 'd-none'" />
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
            show: false,
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

        showComponent() {
            return (this.show = !this.show);
        },
    },
    created() {
        this.getApartments();
    },
};
</script>

<style></style>
