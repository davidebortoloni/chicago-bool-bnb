<template>
<div>
    <Header />
    <Index :apartments="apartments"/>
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
    data(){
        return {
            apartments: [],
        }
    },
    computed: {
    },
    methods: {
        getApartments(){
            axios.get('http://127.0.0.1:8000/api/apartments').then(function(res){
            this.apartments =  res.data;
        })
        }
    },
    created(){
        this.getApartments();
    }
};
</script>
