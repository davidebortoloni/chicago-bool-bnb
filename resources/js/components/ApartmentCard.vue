<template>
    <div class="apartment-card">
        <figure>
            <img :src="apartment.image" alt="TITOLO" class="img-fluid" />
        </figure>
        <h3>TITOLO</h3>
        <ul class="rooms">
            <li>Camere: {{ apartment.n_rooms }}</li>
            <li>Letti: {{ apartment.n_beds }}</li>
            <li>Bagni: {{ apartment.n_baths }}</li>
        </ul>

        <ul class="services"></ul>

        <p>{{ apartment.description }}</p>
    </div>
</template>

<script>
export default {
    name: "ApartmentCard",
    props: ["apartment"],
};
</script>
