@extends('admin.template.admin_template')
@section('content')
    <form action="/admin/status/" method="post">
        <input type="text" placeholder="状态名称" name="status">
        <button class="btn btn-default">提交</button>
    </form>
    <ol class="list-group" style="width: 50%">
        @foreach($status as $statu)
            <li class="list-group-item">
                {{$statu->status}}
                <button class="pull-right btn-danger btn " style="padding: 2px">删除</button>
            </li>
        @endforeach
    </ol>
@endsection