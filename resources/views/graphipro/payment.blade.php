@extends('graphipro.template')
@section('content')
    <form action="{{url('/payment')}}" method="post">
    <input type="number" class="form-control" name="card_number">
        <button>submit</button>
    </form>
@endsection