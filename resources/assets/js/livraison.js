/**
 * Created by YANTAO on 16/7/27.
 */
// import Vue from 'vue';

global.Vue = require('vue');
var VueResource = require('vue-resource');
Vue.use(VueResource);

new Vue({
    el: 'body',
    data: {
        numbers: '',
        price: '',
        postcode: '',
        product_id:'',
        results: []
    },
    ready(){
        this.fetch();
    },
    methods: {
        store () {
            this.$http.post('/admin/livraison', {
                numbers: this.numbers,
                price: this.price,
                postcode: this.postcode,
                product_id:this.product_id
            }).then(function (response) {
                this.results.push({
                    numbers: this.numbers,
                    price: this.price,
                    postcode: this.postcode,
                    id:response.json()
                })
            })
        },
        fetch(){
            this.$http.get('/admin/livraison').then(function (res) {
                this.$set('results', res.json())
            })
        },
        delete(result){
           var message= confirm('确定删除');
            if(message==true){
                this.$http.delete('/admin/livraison/' + result.id).then(function (res) {
                        this.results.$remove(result);
                })
            }

        }
    }

});