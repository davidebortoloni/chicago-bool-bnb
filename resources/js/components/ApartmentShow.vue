<template>
    <section class="container text-left">
        <div class="row">
            <div class="col-6">
                <figure>
                    <img :src="apartment.image" alt="TITOLO" />
                </figure>
            </div>
            <div class="col-6">MAPPA</div>
        </div>
        <div class="row">
            <div class="col-3">
                <ul>
                    <li>Camere: {{ apartment.n_rooms }}</li>
                    <li>Letti: {{ apartment.n_beds }}</li>
                    <li>Bagni: {{ apartment.n_baths }}</li>
                </ul>
            </div>
            <div class="col-3">
                <ul>
                    <li>{{ service.name }}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <p>{{ apartment.description }}</p>
        </div>
    </section>
</template>

<script>
export default {
    name: "ApartmentShow",
    props: ["apartment"],
};
</script>
