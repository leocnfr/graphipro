@extends('graphipro.template')
@section('content')
    <style>
        .error{
            color: red;
        }
        .error-input{
            border: 1px solid red;
        }
    </style>
    <div style=" width:1000px; margin:20px auto; min-height:350px;  ">


            <div
                    style="padding:10px; border:thin ridge #29ABE2; border-radius:3px; font-size:14px; color:#666; width:400px; margin:40px auto;">
                <center>
                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <span style="font-size:24px; color:#29ABE2;">INSCRIPTION</span><br/><br/>

                    <select name="type" id="show-type">
                        <option value="1">Particulier</option>
                        <option value="2">Société</option>
                    </select>
                    <br/>
                    @include('graphipro.auth.particulier_form')
                    @include('graphipro.auth.societe_form')
                </center>
            </div>



    </div>
    <script>
        $('#show-type').change(function () {
            var index=$('#show-type').val();
            if(index==1){
                $('#particulier').show();
                $('#societe').hide();
            }else {
                $('#particulier').hide();
                $('#societe').show();
            }
        })
    </script>
@endsection