@extends('admin.template.admin_template')
@section('page_title','个人客户')
@section('content')
<table class="table table-hover">
	<tr>
		<td>No.</td>
		<td>Nom</td>
		<td>Email</td>
		<td>创建时间</td>
		<td>操作</td>
	</tr>
	@foreach($users as $key=>$user)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$user->nom}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->created_at}}</td>
			<td>
				<form action="{{'/amdin/users/person/'.$user->id}}" method="post">
					{{csrf_field()}}
					{{method_field('DELETE')}}
					<button class="btn btn-danger">删除</button>
					<a href="{{'/admin/users/person/'.$user->id}}" class="btn btn-info">详细信息</a>
				</form>
				
			</td>
		</tr>
	@endforeach
</table>
{!! $users->render() !!}

@endsection