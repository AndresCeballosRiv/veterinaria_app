import Vue from "vue";
import VueRouter from 'vue-router'

import ClinicHistory from './components/ClinicHistory/History/ClinicHistory.vue';
import ClinicHistoryDetail from './components/ClinicHistory/HistoryDetail/ClinicHistoryDetail.vue';
import AppComponent from './components/AppComponent.vue';

Vue.use(VueRouter)

const routes = [
    {
        path: "/clinic-history",
        name: "history",
        component: ClinicHistory
    },
    {
        path: "/clinic-history-detail",
        name: "historyDetail",
        component: ClinicHistoryDetail
    },
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;