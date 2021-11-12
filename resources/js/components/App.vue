<template>
    <div>
        <Header class="mb-5" />
        <Index />
    </div>
</template>

<script>
import Header from "./Header.vue";
import Index from "./Index.vue";
export default {
    name: "App",
    components: {
        Header,
        Index,
    },
};
</script>
