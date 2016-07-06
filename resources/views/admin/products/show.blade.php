@extends('admin.template.admin_template')
@section('page_title','Product List')
@section('content')
	{{--<form action="{{url('/admin/products')}}" method="get">--}}
		{{--<input type="text" placeholder="根据分类和名称查找产品" class="form-control" name="query">--}}

	{{--</form>--}}
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>编号</th>
                <th>产品名称</th>
                <th>产品种类</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
        @foreach($products as $key=>$product)
    		<tr>
    			<td>{{$key+1}}</td>
                <td>{{$product->name}}</td>
				<td>{{isset($product->cate->name)?$product->cate->name:''}}</td>
				<td>
					<button class="btn btn-danger" onclick="return confirm('确认删除?')">删除</button>
					<a href="{{url('admin/products/'.$product->id)}}" class="btn btn-success">编辑</a>
				</td>
    		</tr>
            @endforeach
    	</tbody>
    </table>
	{!! $products->links() !!}

@endsection