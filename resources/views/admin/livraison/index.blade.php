@extends('admin.template.admin_template')
@section('page_title','送货地址管理')
@section('content')
    <form action="/admin/livraison" method="post" role="form">
        <legend>添加地址及送货费</legend>
        <div class="form-group">
            <label for="">Ville</label>
            <input type="text" class="form-control" name="ville" id="" placeholder="Input..." required>
        </div>
        <div class="form-group">
            <label for="">price</label>
            <input type="number" step="0.1" class="form-control" name="price" id="" placeholder="Input..." required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table table-hover">
        <tbody>
        <tr>
            <td>No.</td>
            <td>地址</td>
            <td>送货费</td>
            <td>操作</td>
        </tr>
        @foreach($villes as $key=>$ville)

            <tr>
                <td>{{$key+1}}</td>
                <form action="/admin/livraison/{{$ville->id}}" method="post" style="display: inline-block">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <td>
                        <input type="text" value="{{$ville->ville}}" name="ville">
                    </td>
                    <td>
                        <input type="number" value="{{$ville->price}}" step="0.01" name="price">
                    </td>
                    <td>
                        <button class="btn btn-info" onclick="return confirm('确定修改?')">提交修改</button>
                </form>
                <form action="/admin/livraison/{{$ville->id}} " method="post" style="display: inline-block">
                    <button class="btn btn-danger" onclick="return confirm('确定删除?')">删除</button>
                </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@stop