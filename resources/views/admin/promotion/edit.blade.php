@extends('admin.template.admin_template')
@section('content')
<form action="{{url('/admin/pro/'.$pro->id)}}" method="post" role="form">
    <div class="form-group">
        <label for="">选择产品</label>
        <select name="product_id" id="" class="form-control">
            <option value="{{$pro->product->id}}">{{$pro->product->name}}</option>
            <option value="" disabled>---select--</option>
            @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">描述</label>
        <textarea name="des" id="" cols="30" rows="10" class="form-control">{{$pro->des}}</textarea>
    </div>
    <div class="form-group">
        <label for="">原价</label>
        <input type="number" class="form-control" name="price" value="{{$pro->price}}">
    </div>
    <div class="form-group">
        <label for="">折扣价</label>
        <input type="number" class="form-control" name="pro_price" value="{{$pro->pro_price}}">
    </div>
    <div class="form-group">
        <label for="">是否显示:</label> <br>
        <div class="radio-inline">
        	<label>
        		<input type="radio" value="0" id="" name="is_show"
                {{$pro->is_show==0?'checked':''}}
                >不显示
            </label>
        </div>
        <div class="radio-inline">
            <label>
                <input type="radio" value="1" id="" name="is_show"
                        {{$pro->is_show==1?'checked':''}}
                >显示
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-default" href="{{url('/admin/pro')}}">返回</a>
</form>
@endsection