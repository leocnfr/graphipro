@extends('admin.template.admin_template')
@section('content')
    <style>
        .societe{
            background: #0cad88;
        }
        .personal{
            background: #ffcccc;
        }
    </style>
    <div class="row">
        <div class="personal" style="width: 10px;height: 10px;display: inline-block" ></div>个人客户
    </div>
    <div class="row">
        <div class="societe" style="width: 10px;height: 10px;display: inline-block"></div>专业客户
    </div>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th></th>
            <th>客户</th>
            <th>内容</th>
            <th>数量</th>
            <th>价格</th>
            <th>文件下载</th>
            <th>创建时间</th>
            <th>状态</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr class="{{empty($order->belongsUser->societe)?'personal':'societe'}}">
                <td></td>
                <td>{{empty($order->belongsUser->societe)?$order->belongsUser->nom:$order->belongsUser->societe}}</td>
                <td>
                    <strong>{{$order->product_name}}</strong><br>
                    {!! $order->content !!}
                </td>
                <td>{{$order->ex}}ex</td>
                <td>{{$order->price}}€</td>
                <td>
                    @if(!empty($order->file_src))
                        <p style="display:inline-block">{{basename($order->file_src)}}</p>
                        <form action="{{url('/admin/files/download')}}" method="post">
                            <input type="hidden" value="{{$order->file_src}}" name="file_path">
                            <button class="fa fa-download" >Download</button>
                        </form>
                    @endif
                </td>
                <td> {{$order->created_at}} <br>
                    <strong>{{$order->created_at->diffForHumans()}}</strong>
                </td>
                <td>
                    @include('admin.order.status')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $orders->links() !!}


@endsection