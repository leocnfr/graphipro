/**
 * Created by YANTAO on 16/6/16.
 */
Vue.component('format-template',{
    template:'#format-list',
    data: function () {
        return {
            formats:[]
        }
    },
    created: function () {
        this.$http.get('/admin/format', function (res) {

            this.formats=res;
        });
    },
    methods:{
        delFormat: function (format) {
            this.$http.delete('/admin/format/'+formate.id, function (res) {
                this.formats.$remove(format);
            })
        },
        editFormat: function () {

        }
    }
});