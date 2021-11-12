<template>
  <div>
      <div v-for="(apartment, index) in apartments.data" :key="index">{{apartment.description}}</div>
  </div>
</template>

<script>
export default {
    name: 'Index',
      data(){
        return {
          apartments: [],
        }
    },
    computed: {
        
    },
    methods: {
        getApartments(){
            axios.get('http://127.0.0.1:8000/api/apartments').then((res) => {
              this.apartments = res.data;
              console.log(this.apartments);
        })
        }
    },
    created(){
        this.getApartments()
    }}
</script>

<style>

</style>