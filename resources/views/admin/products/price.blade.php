@extends('admin.template.admin_template')
@section('content')
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
        <form action="{{url('/admin/price-table/edit')}}" method="post">
            {!! csrf_field() !!}
    		<tr>
    			<td>
                    @inject('pricetable','App\Pricetablelist')
                    @foreach($formats as $format)
                        <div class="checkbox">
                        	<label>
                        		<input type="checkbox" value="{{$format->id}}" id="" name="formats" {{in_array($format->id,$pricetable->formats($ptlid))?'checked':''}}>{{$format->format}}
                            </label>
                        </div>
                    @endforeach
                </td>
                <td>
                    @foreach($papiers as $papier)
                        <div class="checkbox">
                        	<label>
                        		<input type="checkbox" value="" id="" {{in_array($papier->id,$pricetable->papiers($ptlid))?'checked':''}}>{{$papier->papier}}

                        	</label>
                        </div>
                    @endforeach
                </td>
                <td>
                    <div class="radio">
                    	<label>
                    		<input type="radio" name="imprimers" id="inputID" value="1" {{$pricetable->imprimers($ptlid)==1?'checked':''}}>
                    		Recto
                    	</label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="imprimers" id="inputID" value="2" {{$pricetable->imprimers($ptlid)==2?'checked':''}}>
                            Recto er verso
                        </label>
                    </div>
                </td>
                <td>
                    @foreach($pelliculages as $pelliculage)
                        <div class="checkbox">
                        	<label>
                        		<input type="checkbox" value="" id="" {{in_array($pelliculage->id,$pricetable->pelliculages($ptlid))?'checked':''}}>{{$pelliculage->pelliculage}}

                        	</label>
                        </div>
                    @endforeach
                </td>
    		</tr>
            <tr>
                <td><button class="btn btn-default" onclick="return confirm('确认修改?')">提交修改</button></td>
            </tr>
        </form>
    	</tbody>
    </table>
                <h4 class="modal-title" id="exampleModalLabel">添加价格</h4>
                   <table class="table">
                   	<thead>
                   		<tr>
                   			<th>count</th>
                            <th>price1</th>
                            <th>price2</th>
                            <th>price3</th>
                   		</tr>

                   	</thead>
                   	<tbody>
                    <tr>
                        <form action="/admin/time" method="post">
                        <th>选择完成时间</th>
                            @inject('times','App\Time')
                            @inject('s_time','App\FinishTime')
                        <th>
                            <select name="time1" id="">
                                @if($s_time->showtime($ptlid)!=null)
                                    <option value="{{$s_time->showtime($ptlid)->time1}}">{{$s_time->showtime($ptlid)->time1}}</option>
                                @endif
                                <option value="" disabled>--选择时间--</option>
                                @foreach($times->showAll() as $time)
                                    <option value="{{$time->name}}">{{$time->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>

                            <select name="time2" id="">
                                @if($s_time->showtime($ptlid)!=null)
                                    <option value="{{$s_time->showtime($ptlid)->time2}}">{{$s_time->showtime($ptlid)->time2}}</option>
                                @endif
                                    <option value="" disabled>--选择时间--</option>
                                @foreach($times->showAll() as $time)
                                    <option value="{{$time->name}}">{{$time->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select name="time3" id="">
                                @if($s_time->showtime($ptlid)!=null)
                                    <option value="{{$s_time->showtime($ptlid)->time3}}">{{$s_time->showtime($ptlid)->time3}}</option>
                                @endif
                                <option value="" disabled>--选择时间--</option>
                                @foreach($times->showAll() as $time)
                                    <option value="{{$time->name}}">{{$time->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            {!! csrf_field() !!}
                            <input type="hidden" value="{{$ptlid}}" name="price_table_list_id">
                            <button class="btn btn-default">提交</button>
                        </th>

                        </form>
                    </tr>
                   		<tr>
                            <form action="{{url('/admin/price')}}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" value="{{$ptlid}}" name="price_table_list_id">
                   			<td><input type="number" class="form-control" name="count" required></td>
                            <td><input type="number" class="form-control" name="price1" required></td>
                            <td><input type="number" class="form-control" name="price2" required></td>
                            <td><input type="number" class="form-control" name="price3" required></td>
                            <td>
                                <button class="btn btn-default">提交</button>
                            </td>
                            </form>
                        </tr>
                        @foreach($prices as $price)
                            <tr>
                                <form action="{{url('/admin/price/')}}" method="post">
                                    {!! csrf_field() !!}
                                    {!! method_field('PUT') !!}
                                    <input type="hidden" value="{{$price->id}}" name="id">
                                <td><input type="number" value="{{$price->count}}" class="form-control" name="count"></td>
                                <td><input type="number" value="{{$price->price1}}" class="form-control" name="price1"></td>
                                <td><input type="number" value="{{$price->price2}}" class="form-control" name="price2"></td>
                                <td><input type="number" value="{{$price->price3}}" class="form-control" name="price3"></td>
                                <td>
                                    <button class="btn btn-default" onclick="return confirm('确认修改?')">修改</button>
                                </form>
                                <form action="{{url('/admin/price/'.$price->id)}}" method="post" style="display:inline-block;">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger" onclick="return confirm('确认删除?')">删除</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                   	</tbody>
                   </table>

@endsection