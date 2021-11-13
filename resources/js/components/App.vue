<template>
    <div>
        <Search class="mb-5" />
        <Index />
    </div>
</template>

<script>
import Search from "./Search.vue";
import Index from "./Index.vue";
export default {
    name: "App",
    components: {
        Search,
        Index,
    },
};
</script>
