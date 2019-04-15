import Notifications from 'vue-notification'
window.axios = require('axios');
window.Vue = require('vue');
require('bootstrap');

Vue.use(Notifications)
Vue.component('cardButton', require('./components/cardButton.vue').default);
Vue.component('multiple-select', require('./components/multiple-select.vue').default);
Vue.component('gallery', require('./components/gallery.vue').default);
var app = new Vue({
    el: '#app'
});
