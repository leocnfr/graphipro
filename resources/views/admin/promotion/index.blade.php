@extends('admin.template.admin_template')
@section('content')
<form action="{{url('/admin/pro')}}" method="post" role="form">
    <div class="form-group">
        <label for="">选择产品</label>
        <select name="product_id" id="" class="form-control">
            @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
	<div class="form-group">
		<label for="">描述</label>
        <textarea name="des" id="" cols="30" rows="10" class="form-control"></textarea>
	</div>
    <div class="form-group">
        <label for="">原价</label>
        <input type="number" step="0.01" class="form-control" name="price">
    </div>
    <div class="form-group">
        <label for="">折扣价</label>
        <input type="number" class="form-control" name="pro_price" step="0.01">
    </div>
	<div class="form-group">
		<label for="">送货省份</label> <br>
		<div class="radio-inline">
			<label>
				<input type="radio" name="city" id="inputID" value="1" >
				75省
			</label>
		</div>
		<div class="radio-inline">
			<label>
				<input type="radio" name="city" id="inputID" value="2">
				75省以外
			</label>
		</div>
	</div>
	<div class="form-group">
		<label for="">送货价格</label>
		<input type="number" class="form-control" name="lv_price" id="" step="0.01" >
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>产品</th>
                <th style="width: 46vw">描述</th>
                <th>原价</th>
                <th>折扣价</th>
                <th>是否显示</th>
                <th>操作</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($pros as $pro)
                    <tr>
                        <td>{{$pro->product->name}}</td>
                        <td>
                            {!! $pro->des !!}
                        </td>
                        <td>
                            {{$pro->price}}
                        </td>
                        <td>
                            {{$pro->pro_price}}
                        </td>
                        <td>
                            {{$pro->is_show==0?'不显示':'显示'}}
                        </td>
                        <td>
                            <form action="{{url('/admin/pro/'.$pro->id)}}" style="display: inline-block" method="post">
                                {!! method_field('DELETE') !!}
                            <button class="btn btn-danger">删除</button>
                            </form>
                            <a class="btn btn-default" href="{{url('/admin/pro/'.$pro->id)}}">修改</a>
                        </td>
                    </tr>
            @endforeach
    	</tbody>
    </table>
@endsection