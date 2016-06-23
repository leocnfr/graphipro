@extends('admin.template.admin_template')
@section('page_title','')
@section('content')
	<style>
		.btn , form{
			display: inline-block;
		}
	</style>
<form action="{{url('/admin/category')}}" method="post" role="form" style="width: 20%">
	@if (isset($errors) && count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<legend>添加产品分类</legend>
    {!! csrf_field() !!}
	<div class="form-group">
		<label for=""></label>
		<input type="text" class="form-control" name="name" id="" placeholder="Input..." required>
	</div>

    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>编号</th>
				<th>分类名称</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($types as $key=>$type)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$type->name}}</td>
					<td>
						<button class="btn btn-primary">编辑</button>
						<form action="{{url('/admin/products/category')}}" method="POST">
							<input type="hidden" value="{{$type->id}}" name="id">
							<input type="hidden" name="_method" value="delete">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button class="btn btn-danger" onclick="return confirm('确定删除')">删除</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection