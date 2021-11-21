<template>
    <section class="container text-left">
        <div :class="[alertStatus]" class="alert" id="alert-message" v-if="callFlag">{{callResponse}}</div>
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize">{{ apartment.apartment.title }}</h1>
            </div>
            <div class="col-12 col-xl-6">
                <figure>
                    <img
                        :src="apartment.apartment.image"
                        :alt="apartment.apartment.title"
                        class="img-fluid"
                    />
                </figure>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div id="address">
                            <strong>
                                {{ apartment.apartment.address.street }},
                                {{ apartment.apartment.address.number }},
                                {{ apartment.apartment.address.cap }}
                                <span class="text-capitalize"
                                    >{{
                                        apartment.apartment.address.city
                                    }},</span
                                >
                                <span class="text-capitalize">{{
                                    apartment.apartment.address.province
                                }}</span>
                                <span class="text-capitalize">{{
                                    apartment.apartment.address.region
                                }}</span>
                            </strong>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            id="info"
                            class="
                                d-flex
                                justify-content-between
                                align-items-center
                                my-3
                            "
                        >
                            <div>
                                Numero stanze:
                                <strong>{{
                                    apartment.apartment.n_rooms
                                }}</strong>
                            </div>
                            <div>
                                Numero letti:
                                <strong>{{
                                    apartment.apartment.n_beds
                                }}</strong>
                            </div>
                            <div>
                                Numero bagni:
                                <strong>{{
                                    apartment.apartment.n_baths
                                }}</strong>
                            </div>
                            <div>
                                Metri quadri:
                                <strong>{{ apartment.apartment.sqrmt }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h3>Servizi:</h3>
                        <div id="services" class="row align-items-center my-3">
                            <ul>
                                <li
                                    v-for="service in apartment.services"
                                    :key="service.id"
                                >
                                    &#10003; {{ service.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <TomtomMap :lat='apartment.address.lat' :lon='apartment.address.lon' :street='apartment.address.street'/>
            </div>
        </div>
        <div>
            <h3 class="mt-5 h2">Contatta il proprietario</h3>
              <div class="form-group">
                <label for="mail">Indirizzo mail</label>
                <input type="email" class="form-control" id="mail" v-model="eMail">
              </div>
              <div class="form-group">
                <label for="message">Example textarea</label>
                <textarea class="form-control" id="message" rows="5" v-model="message"></textarea>
              </div>
              <button class="btn btn-dark" @click="sendMessage(message, eMail)">Invia</button>
        </div>
    </section>
</template>

<script>
import axios from "axios";
import TomtomMap from "../tomtom/TomtomMap.vue";

export default {
    name: "ApartmentShow",
    components: {
        TomtomMap,
    },
    data() {
        return {
            apartment: null,
            eMail: '',
            message: '',
            callResponse: '',
            callFlag: 0,
            alertStatus: '',
        };
    },
    methods: {
        getApartment() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/apartments/${this.$route.params.id}`
                )
                .then((res) => {
                    console.log(res.data);
                    this.apartment = res.data;
                })
                .catch((e) => {
                    console.error(e.message);
                });
        },
        sendMessage(message, eMail) {
            if(message != '' && eMail != '') {
                axios.post( `http://127.0.0.1:8000/api/message/?email=${this.eMail}&text=${this.message}&apartment_id=${this.apartment.apartment.id}`).then(res => {
                    console.log(res);
                    if(res.status == 200) {
                        this.callResponse = "Messaggio inviato con successo";
                        this.alertStatus = 'alert-success'
                        this.callFlag = 1;
                        setTimeout(() =>{
                            this.callFlag = 0;
                        }, 10000)
                        }
                }).catch(() => {
                            this.callResponse = "Messaggio non inviato";
                            this.alertStatus = 'alert-danger';
                            this.callFlag = 1;
                        setTimeout(() =>{
                            this.callFlag = 0;
                        }, 10000)
                        
                })
            }
        }
    },
    created() {
        this.getApartment();
    },
};
</script>
