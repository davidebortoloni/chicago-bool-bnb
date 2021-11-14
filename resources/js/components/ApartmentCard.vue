<template>
    <div class="apartment-card col-4 pointer">
        <figure class="apartment-img">
            <img :src="apartment.image" :alt="apartment.title" class="img-fluid" />
        </figure>
        <h3 class="apartment-title">{{ apartment.title }}</h3>
        <ul class="rooms">
            <li class="mr-2">Città: {{ apartment.city }}</li>
            <li class="mr-2">Camere: {{ apartment.n_rooms }}</li>
            <li class="mr-2">Letti: {{ apartment.n_beds }}</li>
            <li class="mr-2">Bagni: {{ apartment.n_baths }}</li>
        </ul>

        <!-- <ul class="services">
            <li v-for="(service, id) in apartment_service" :key="id">
                {{ service.name }}
            </li>
        </ul> -->

        <p class="text-left">{{ apartment.description }}</p>
    </div>
</template>

<script>
export default {
    name: "ApartmentCard",
    props: ["apartment"],
};
</script>

<style scoped>
.apartment-title{
text-transform: capitalize;
}
</style>
