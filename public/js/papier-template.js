/**
 * Created by YANTAO on 16/6/16.
 */
Vue.component('papier-template',{
    template:'#papier-list',
    data: function () {
        return {
            papiers:[]
        }
    },
    created: function () {
        this.$http.get('/admin/papier', function (res) {

            this.papiers=res;
        });
    },
    methods:{
        delPapier: function (papier) {
            this.$http.delete('/admin/papier/'+papier.id, function (res) {
                this.papiers.$remove(papier);
            })
        },
        editPapier: function () {

        }
    }
});
