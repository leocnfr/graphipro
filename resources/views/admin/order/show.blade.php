@extends('admin.template.admin_template')
@section('content')
        <table class="table table-hover">
        	<thead>
        		<tr>
        			    <th></th>
                        <th>客户</th>
                        <th>内容</th>
                        <th>价格</th>
                        <th>创建时间</th>
        		</tr>
        	</thead>
        	<tbody>
            @foreach($orders as $order)
                    <tr>
                            <td>{{$order->belongsUser->nom}}</td>
                            <td>{{$order->content}}</td>
                            <td>{{$order->price}}</td>
                            <td> {{$order->created_at}} <br>
                                    {{$order->created_at->diffForHumans()}}
                            </td>
                    </tr>
            @endforeach
        	</tbody>
        </table>


@endsection