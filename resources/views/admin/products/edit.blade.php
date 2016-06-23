@extends('admin.template.admin_template')
@section('page_title','Product List')
@section('content')
    <link rel="stylesheet" href="/css/fileinput.css">
    <script src="/js/fileinput.js"></script>
    <style>
        button.btn.btn-default.fileinput-upload.fileinput-upload-button{
            display: none;
        }

    </style>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('url' => 'admin/products/'.$product->id,'method'=>'post','enctype'=>'multipart/form-data','id'=>'edit_product')) !!}
            <div class="form-group-sm">
                {{Form::label('name','产品名称')}}
                {{Form::text('name',$product->name,array('class'=>'form-control','id'=>'name','required'=>'required'))}}
            </div>
            <div class="form-group-sm">
                {{Form::label('cat','产品类别')}}
                <select name="type_id" id="cat" class="form-control">
                    @if(isset($product->cate->name))
                        <option value="{{$product->cate->id}}">{{$product->cate->name}}</option>
                    @endif
                    <option value="null" disabled>---select one---</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}"> {{$type->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group-sm">
                <img src="/storage/uploads/{{$product->productimg}}" alt="" style="width: 100px;height: 100px;display: block">
                {{Form::label('photo','产品图片')}}
                {{Form::file('photo',array('data-min-file-count'=>0,'class'=>'file form-control','id'=>'file-0a'))}}

            </div>
            <div class="form-group-sm" >
                {{Form::label('','介绍文字')}}
                {{Form::textarea('intro',$product->intro,array('cols'=>30,'rows'=>10,'placeholder'=>'介绍文字','class'=>'form-control','required'=>'required'))}}
            </div>
            <div class="form-group-sm" >
                {{Form::label('','Format')}}
                {{Form::textarea('format',$product->format,array('cols'=>30,'rows'=>10,'placeholder'=>'format','class'=>'form-control'))}}
            </div>
            <div class="form-group-sm" >
                {{Form::label('','Papier')}}
                {{Form::textarea('papier',$product->papier,array('cols'=>30,'rows'=>10,'placeholder'=>'papier','class'=>'form-control'))}}
            </div>
            <div class="form-group-sm" >
                {{Form::label('','Delais')}}
                {{Form::textarea('delais',$product->delais,array('cols'=>30,'rows'=>10,'placeholder'=>'papier','class'=>'form-control'))}}
            </div>
            <div>
                <div class="form-group-sm">
                    {{Form::label('','首页显示')}}:
                    @if($product->is_show==1)
                        {{Form::radio('is_show','1',array('checked'=>'checked'))}}显示
                    @else
                        {{Form::radio('is_show','1')}}显示
                    @endif
                    @if($product->is_show==0)
                        {{Form::radio('is_show','0',array('checked'=>'checked'))}}不显示
                    @else
                        {{Form::radio('is_show','0')}}不显示
                    @endif
                </div>
            </div>
            <div class="form-group-sm">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加价格列表</button>
        @include('admin.products.price_table_list')
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Format</th>
                <th>Papier</th>
                <th>Imprimer</th>
                <th>Pelliculage</th>
            </tr>
            </thead>
            <tbody>
            @inject('pricetablelists','App\Pricetablelist')
            @foreach($pricetablelists->showAll($product->id) as $pricetablelist)
                <tr>
                    <td>{{$pricetablelist->showFormat($pricetablelist->id)}}</td>
                    <td>{{$pricetablelist->showPapier($pricetablelist->id)}}</td>
                    <td>{{$pricetablelist->showImprimer($pricetablelist->id)}}</td>
                    {{--<td>{{$pricetablelist->showPelliculage($pricetablelist->id)}}</td>--}}
                    <td>
                        <a   class="btn btn-default" href="{{url('/admin/products/'.$product->id.'/price/'.$pricetablelist->id)}}">编辑</a>
                        <button class="btn btn-danger">删除</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection