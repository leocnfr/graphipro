@extends('admin.template.admin_template')
@section('page_title','时间列表')
@section('content')
<div id="app">
    <div class="col-md-3" >
        <input type="text"  class="form-control" placeholder="完成时间" v-model="time">
        <button class="btn btn-default" @click="addTime()">提交</button>
    </div>
    <table class="table table-responsive">
        <thead>
         <th>编号</th>
        <th>时间</th>
        <th>编辑</th>
        </thead>
        <tr v-for="time in times">
            <td>@{{ $index +1 }}</td>
            <td>@{{ time.name }}</td>
            <td>
                <button class="btn btn-danger" @click='delTime(time)'>删除</button>
                <button class="btn btn-default">编辑</button>
            </td>
        </tr>
    </table>
</div>

    <script>
        new Vue({
            el:'#app',
            data:{
                'time':'',
                'times':[]
            },
            created: function () {
                var vm = this;
                vm.$http.get('/admin/finish-time/show', function (res) {
                    vm.times=res;
                })
            },
            methods:{
                addTime: function () {
                    var vm =this;
                    vm.$http.post('/admin/finish-time',{'name':this.time}, function (res) {
                        if(res=='200'){
                            vm.times.push({'name':vm.time});
                            vm.time='';
                        }
                    })
                },
                delTime: function (time) {
                    var vm=this;
                    vm.$http.delete('/admin/finish-time',{id:time.id}, function (res) {
                        if(res=='200')
                        {
                            vm.times.$remove(time);
                        }
                    })
                }
            }

        });
    </script>
@endsection