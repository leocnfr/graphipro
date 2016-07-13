@extends('admin.template.admin_template')
@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th>客户</th>
            <th>内容</th>
            <th>数量</th>
            <th>价格</th>
            <th>文件下载</th>
            <th>创建时间</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td></td>
                <td>{{empty($order->belongsUser->societe)?$order->belongsUser->nom:$order->belongsUser->societe}}</td>
                <td>{!! $order->content !!}</td>
                <td>{{$order->ex}}</td>
                <td>{{$order->price}}</td>
                <td>{{basename($order->file_src)}}</td>
                <td> {{$order->created_at}} <br>
                    {{$order->created_at->diffForHumans()}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $orders->links() !!}


@endsection