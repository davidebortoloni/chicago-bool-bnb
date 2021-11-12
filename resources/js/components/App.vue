<template>
    <div>
        <Header class="mb-5" />
        <Index />
        <ApartmentShow class="d-none" />
    </div>
</template>

<script>
import Header from "./Header.vue";
import Index from "./Index.vue";
import ApartmentShow from "./ApartmentShow.vue";
export default {
    name: "App",
    components: {
        Header,
        Index,
        ApartmentShow,
    },
};
</script>
