@inject('status','App\Status')
<div class="btn-group">
    <button type="button" class="btn btn-danger">{{$order->orderStatus->status}}</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        @foreach($status->all() as $statu)
            <li><a href="">{{$statu->status}}</a></li>
        @endforeach
    </ul>
</div>