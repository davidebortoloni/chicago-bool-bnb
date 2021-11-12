<template>
<div>
    <Header />
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
