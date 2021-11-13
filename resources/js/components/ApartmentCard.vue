<template>
    <div class="apartment-card col-4 pointer">
        <figure class="apartment-img">
            <img :src="apartment.image" alt="TITOLO" class="img-fluid" />
        </figure>
        <h3>TITOLO</h3>
        <ul class="rooms">
            <li>Camere: {{ apartment.n_rooms }}</li>
            <li>Letti: {{ apartment.n_beds }}</li>
            <li>Bagni: {{ apartment.n_baths }}</li>
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
