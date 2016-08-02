@extends('admin.template.admin_template')
@section('page_title','商品属性')
@section('content')
    <div class="row">
        <div class="col-md-4">
            {!! Form::open(array('url'=>'admin/formate/create','method'=>'post')) !!}
            <div class="form-group">
                {{Form::label('format','Format')}}
                {{Form::text('format','',array('class'=>'form-control','id'=>'name','required'=>'required'))}}
            </div>
            <div class="form-group">
                {{Form::submit('Submit',array('class'=>'btn btn-default pull-right','formaction'=>'formate/create','formmethod'=>'post'))}}
            </div>
            {!! Form::close() !!}
            <format-template></format-template>
        </div>
        <div class="col-md-4">
            {!! Form::open() !!}
            <div class="form-group">
                {{Form::label('','Papier')}}
                {{Form::text('papier','',array('class'=>'form-control','id'=>'papier','required'=>'required'))}}
            </div>
            <div class="form-group">
                {{Form::submit('Submit',array('class'=>'btn btn-default pull-right','formaction'=>'papier/create','formmethod'=>'post'))}}
            </div>
            {!! Form::close() !!}
            <papier-template></papier-template>
        </div>
        <div class="col-md-4">
            {!! Form::open() !!}
            <div class="form-group">
                {{Form::label('','Pelliculage')}}
                {{Form::text('pelliculage','',array('class'=>'form-control','id'=>'pelliculage','required'=>'required'))}}
            </div>
            <div class="form-group">
                {{Form::submit('Submit',array('class'=>'btn btn-default pull-right','formaction'=>'pelliculage/create','formmethod'=>'post'))}}
            </div>
            {!! Form::close() !!}
            <pelliculage-template></pelliculage-template>
        </div>
    </div>
    @include('admin.product_attribute_template.papier_template')
    @include('admin.product_attribute_template.formate_template')
    @include('admin.product_attribute_template.pelliculage_template')
    <script src="/js/papier-template.js"></script>
    <script src="/js/format-template.js"></script>
    <script src="/js/pelliculage-template.js"></script>
    <script>
        new Vue({
            el:'body'
        });
    </script>
@endsection