/**
 * Created by YANTAO on 16/6/16.
 */
Vue.component('pelliculage-template',{
    template:'#pelliculage-list',
    data: function () {
        return {
            pelliculages:[]
        }
    },
    created: function () {
        this.$http.get('/admin/pelliculage', function (res) {

            this.pelliculages=res;
        });
    },
    methods:{
        delPelliculage: function (pelliculage) {
            this.$http.delete('/admin/pelliculage/'+pelliculage.id, function (res) {
                this.pelliculages.$remove(pelliculage);
            })
        },
        editPelliculage: function () {

        }
    }
});
