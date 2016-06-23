@extends('admin.template.admin_template')
@section('content')
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
                                <td><input type="number" value="{{$price->count}}"></td>
                            </tr>
                        @endforeach
                   	</tbody>
                   </table>

@endsection