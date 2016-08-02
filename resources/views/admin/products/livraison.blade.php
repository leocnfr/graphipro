<h3>运输价格</h3>
<div class="row">
	<div class="col-md-4">
		{{--<form action="/admin/livraison" method="post" role="form">--}}
			<input type="hidden" value="{{$product->id}}" name="product_id" v-model="product_id">
			<div class="radio">
				<label>
					<input type="radio" name="postcode" id="inputID" value="1" checked="checked" v-model="postcode">75
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="postcode" id="inputID" value="2" v-model="postcode">75以外
				</label>
			</div>
			<div class="form-group">
				<label for=""></label>
				<input type="text" class="form-control" name="numbers" id="" placeholder="数量或平米数" v-model="numbers" required>
			</div>
			<div class="form-group">
				<label for=""></label>
				<input type="number" step="0.01" class="form-control" name="price" id="" placeholder="价格" v-model="price" required>
			</div>
			<button type="submit" class="btn btn-primary" @click="store()">Submit</button>
		{{--</form>--}}
	</div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>邮编</th>
				<th>数量/平米数</th>
				<th>价格</th>
			</tr>
			</thead>
			<tbody>
				<tr v-for="result in results">
					<td>@{{ result.postcode==1?'75省':'75省以外' }}</td>
					<td>@{{ result.numbers }}</td>
					<td>@{{ result.price }}</td>
					<td><button class="btn btn-danger" @click='delete(result)'>删除</button></td>
				</tr>
			{{--@foreach($livrasions as $livrasion)--}}
				{{--<tr>--}}
					{{--<td>{{$livrasion->postcode==1?75:'75以外'}}</td>--}}
					{{--<td>{{$livrasion->numbers}}</td>--}}
					{{--<td>{{$livrasion->price}}</td>--}}
					{{--<td>--}}
						{{--<form action="/admin/livraison/{{$livrasion->id}}" method="post">--}}
							{{--{{method_field('DELETE')}}--}}
							{{--<button onclick="return confirm('确定删除?')" class="btn btn-danger">删除</button>--}}
						{{--</form>--}}
					{{--</td>--}}
				{{--</tr>--}}
			{{--@endforeach--}}
			</tbody>
		</table>
	</div>
</div>
<script src="/js/livrasion.js"></script>
