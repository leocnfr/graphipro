@extends('admin.template.admin_template')
@section('page_title','添加专业客户')
@section('content')
    {!! Form::open(array('url' => 'admin/users/create','method'=>'post')) !!}
    <div class="form-group">
        {{Form::label('nom','Nom')}}
        {{Form::text('nom','',array('class'=>'form-control','id'=>'nom','required'=>'required'))}}
    </div>
    <div class="form-group">
        {{Form::label('prenom','Prenom')}}
        {{Form::text('prenom','',array('class'=>'form-control','id'=>'prenom','required'=>'required'))}}
    </div>
    <div class="form-group">
        {{Form::label('societe-name:','Societe Name:')}}
        {{Form::text('societe-name:','',array('class'=>'form-control','id'=>'societe-name'))}}
    </div>
    <div class="form-group">
        {{Form::label('tel:','Tel:')}}
        {{Form::text('tel:','',array('class'=>'form-control','id'=>'tel','required'=>'required'))}}
    </div>
    <div class="form-group">
        {{Form::label('address:','Address:')}}
        {{Form::text('address:','',array('class'=>'form-control','id'=>'address','required'=>'required'))}}
    </div>
    <div class="form-group">
        {{Form::label('post:','Post:')}}
        {{Form::text('post:','',array('class'=>'form-control','id'=>'post','required'=>'required'))}}
    </div>
    <div class="form-group">
        {{Form::label('ville:','Ville:')}}
        {{Form::text('ville:','',array('class'=>'form-control','id'=>'ville','required'=>'required'))}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'E-Mail Address:')}}
        {{Form::email('email', '',array('class'=>'form-control','id'=>'email','required'=>'required'))}}
    </div>
    <input type="hidden" value="1">
    {{Form::submit('Submit',array('class'=>'btn btn-default'))}}
    {!! Form::close() !!}


@endsection