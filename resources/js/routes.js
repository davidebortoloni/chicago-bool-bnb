import Vue from "vue";
import VueRouter from "vue-router";

import HomePage from "./components/pages/HomePage";
import ApartmentShow from "./components/pages/ApartmentShow";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/apartments/:id",
            component: ApartmentShow,
            name: "apartment-show",
        },
        {
            path: "*",
            component: HomePage,
            name: "home",
        },
    ],
});

export default router;
