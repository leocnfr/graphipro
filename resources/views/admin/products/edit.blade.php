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
            <div class="form-group">
                {{Form::label('','设计费')}}
                {{Form::number('design_price',$product->design_price)}}
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
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>数量</th>
                <th>价格</th>
    		</tr>
    	</thead>
    	<tbody>
        <form action="{{url('/admin/promotion')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" value="{{$product->id}}" name="product_id">
    		<tr>
    			<td><input type="number" name="count" ></td>
                <td><input type="number" name="price"></td>
                <td><button class="btn btn-default">添加</button></td>
    		</tr>
        </form>
        @foreach($pros as $pro)
                <tr>
                    <form action="{{url('/admin/promotion/'.$pro->id)}}" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <input type="hidden" name="id" value="{{$pro->id}}">
                    <td><input type="number" value="{{$pro->count}}" name="count"></td>
                    <td><input type="number" value="{{$pro->price}}" name="price"></td>
                    <td>
                        <button class="btn btn-default" onclick="return confirm('确认修改?')">修改</button>
                    </form>
                    <form action="{{url('/admin/promotion/'.$pro->id)}}" method="post" style="display: inline-block">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger" onclick="return confirm('确认删除?')">删除</button>
                    </form>
                    </td>
                </tr>
            @endforeach
    	</tbody>
    </table>
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
                    <td>{{$pricetablelist->showPelliculage($pricetablelist->id)}}
                    </td>
                    <td>
                        <a   class="btn btn-default" href="{{url('/admin/products/'.$product->id.'/price/'.$pricetablelist->id)}}">编辑</a>
                        <form action="{{url('/admin/price-table/'.$pricetablelist->id)}}" method="post">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger" onclick="return confirm('确认删除?')">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <h4>特殊产品价格</h4>
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
@endsection