/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app', require('./components/AppComponent.vue').default);

Vue.component('clinichistory', require('./components/ClinicHistory/History/ClinicHistory.vue').default);
Vue.component('createclinichistory', require('./components/ClinicHistory/History/CreateClinicHistory.vue').default);
Vue.component('editclinichistory', require('./components/ClinicHistory/History/EditClinicHistory.vue').default);

Vue.component('clinichistorydetail', require('./components/ClinicHistory/HistoryDetail/ClinicHistoryDetail.vue').default);
Vue.component('createclinichistorydetail', require('./components/ClinicHistory/HistoryDetail/CreateClinicHistoryDetail.vue').default);
Vue.component('editclinichistorydetail', require('./components/ClinicHistory/HistoryDetail/EditClinicHistoryDetail.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './router';

const app = new Vue({
    el: '#app',
    router
});
