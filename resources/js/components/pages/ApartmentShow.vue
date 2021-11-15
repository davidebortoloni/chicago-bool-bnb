<template>
    <section class="container text-left">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize">{{ apartment.apartment.title }}</h1>
            </div>
            <div class="col-6">
                <figure>
                    <img :src="apartment.apartment.image" :alt="apartment.apartment.title" class="img-fluid" />
                </figure>
                <div class="row">
                    <div class="col-12">
                        <p>{{ apartment.apartment.description }}</p>
                    </div>
                    <div class="col-12">
                        <div id="info" class="d-flex justify-content-between align-items-center my-3">
                            <div>Numero stanze: <strong>{{apartment.apartment.n_rooms}}</strong></div>
                            <div>Numero letti: <strong>{{apartment.apartment.n_beds}}</strong></div>
                            <div>Numero bagni: <strong>{{apartment.apartment.n_baths}}</strong></div>
                            <div>Metri quadri: <strong>{{apartment.apartment.sqrmt}}</strong></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h3>Servizi</h3>
                        <div id="services" class="row align-items-center my-3">
                            <div class="col-3" v-for="service in apartment.services" :key="service.id">
                                {{ service.name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <figure>
                    <img src="https://liveatnolan.com/wp-content/uploads/2018/06/Placeholder-Map.jpg" alt="apartment location" class="img-fluid" />
                </figure>
            </div>
        </div>      
    </section>
</template>

<script>
import axios from 'axios';
export default {
    name: "ApartmentShow",
    data(){
        return {
            apartment: null,
        }
    },
    methods: {
        getApartment(){
            axios.get(`http://127.0.0.1:8000/api/apartments/${this.$route.params.id}`)
            .then((res)=>{
                console.log(res.data);
                this.apartment = res.data;
            })
            .catch((e)=>{
                console.error(e.message);
            });
        }
    },
    created() {
        this.getApartment();
    }
};
</script>
