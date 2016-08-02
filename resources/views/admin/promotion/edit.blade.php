@extends('admin.template.admin_template')
@section('content')
	<form action="{{url('/admin/pro/'.$pro->id)}}" method="post" role="form" id="form1">
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
			<input type="number" class="form-control" name="price" value="{{$pro->price}}" step="0.01">
		</div>
		<div class="form-group">
			<label for="">折扣价</label>
			<input type="number" class="form-control" name="pro_price" value="{{$pro->pro_price}}" step="0.01">
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

	</form>

	<div class="row" id="app">
		<div class="col-md-3">
			<form method="post" role="form" id="form2">
				<legend>送货价格</legend>

				<div class="form-group">
					<label for="">送货省份</label> <br>
					<div class="radio-inline">
						<label>
							<input type="radio" name="city" id="inputID" value="1" {{$pro->city==1?'checked':''}}
							v-model="checked">
							75省
						</label>
					</div>
					<div class="radio-inline">
						<label>
							<input type="radio" name="city" id="inputID" value="2" {{$pro->city==2?'checked':''}}
							v-model="checked">
							75省以外
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="">送货价格</label>
					<input type="number" class="form-control" name="lv_price" id="" step="0.01"
						   value="{{$pro->lv_price}}" v-model="price">
				</div>
				<button type="submit" class="btn btn-primary" formaction="{{url('/admin/prolivraison')}}">Submit</button>
			</form>

		</div>
		<div class="col-md-9">

		</div>
	</div>
	<a class="btn btn-default" href="{{url('/admin/pro')}}">返回</a>

@endsection