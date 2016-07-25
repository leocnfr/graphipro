<h4>特殊产品价格</h4>
<div class="row">
	<div class="col-md-6">
		<form action="{{url('/admin/special')}}" method="post" role="form">
			{!! csrf_field() !!}
			<input type="hidden" name="product_id" value="{{$product->id}}">
			<div class="form-group">
				<label for="">尺寸</label>
				<input type="text" class="form-control" name="size" id="" placeholder="Input...">
			</div>
			<div class="form-group">
				<label for="">价格</label>
				<input type="number" step="0.01" class="form-control" name="price" id="" placeholder="Input...">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>
	<div class="col-md-6">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>尺寸</th>
				<th>价格</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
			@foreach($product->hasSpec as $spec)
				<tr>
					<td>{{$spec->size}}</td>
					<td>{{$spec->price}}</td>
					<td>
						<form action="{{url('/admin/special/'.$spec->id)}}" method="post">
							{!! csrf_field() !!}
							{!! method_field('DELETE') !!}
							<button class="btn btn-danger" onclick="return confirm('确认删除')">删除</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
