@extends('admin.template.admin_template')
@section('content')
    @foreach($files as $file)
        <a href="{{url('/admin/file')}}">{{$file}}</a> <br>
    @endforeach

@endsection