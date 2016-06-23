@extends('admin.template.admin_template')
@section('page_title','添加产品')
@section('content')

    <link rel="stylesheet" href="/css/fileinput.css">
    <script src="/js/fileinput.js"></script>
    <style>
        button.btn.btn-default.fileinput-upload.fileinput-upload-button{
            display: none;
        }
    </style>
<form action="{{url('admin/products/new')}}" method="post" role="form" enctype="multipart/form-data">

	<div class="form-group-sm">
		<label for="">产品名称</label>
        <input type="text" class="form-control" placeholder="产品名称" name="name" required>
	</div>
    <div class="form-group-sm">
        <label for=""> 产品分类</label>:<span id="show_cat"></span>
        <select name="type_id" id="cat" class="form-control">
            @foreach($types as $type)
                <option value="{{$type->id}}"> {{$type->name}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group-sm">
        <label for="">产品图片</label>
        <input id="file-0a" class="file form-control" type="file" multiple data-min-file-count="1" name="photo">
    </div>
    <div class="form-group-sm">
        <label for="">介绍文字</label>
        <textarea name="intro" id="" cols="30" rows="10" placeholder="介绍文字" class="form-control" ></textarea>
    </div>

    <div class="form-group-sm">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<script>
    $('#cat').change(function () {
        var cat=$( "#cat option:selected" ).text();
        $('#show_cat').html(cat);
    })
</script>
@endsection