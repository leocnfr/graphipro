/**
 * Created by YANTAO on 16/7/27.
 */
var Vue = require('vue');

import Getprice from './components/Getprice.vue';


new Vue({
    el: '#app',

    components: { Getprice },

    ready() {
        alert('Vue and Vueify all set to go!');
    }
});