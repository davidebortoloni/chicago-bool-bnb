window.axios = require("axios");
window.Vue = require("vue");

import router from "./routes";
import App from "./components/App.vue";

const app = new Vue({
    el: "#app",
    router,
    render: (h) => h(App),
});
