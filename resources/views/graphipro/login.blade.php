@extends('graphipro.template')
@section('content');
<div style=" width:1000px; margin:20px auto; min-height:350px;  ">


    <form action="{{url('/login')}}" method="post">
        {!! csrf_field() !!}
        <div style="padding:10px; border:thin ridge #29ABE2; border-radius:3px; font-size:14px; color:#666; width:400px; margin:40px auto;">
            <center>
                <span style="font-size:24px; color:#29ABE2;">LOGIN</span><br /><br />
                <input name="useremail" type="text" size="30" placeholder="Votre adresse mail" style="font-size:16px; padding:5px" required /><br /><br />
                <input name="password" type="password" size="30" placeholder="Votre mot de passe" style="font-size:16px; padding:5px" required/><br /><br />
                <input type="submit" value="Valide" style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; display:inline; font-size:18px; "><br /><br />
                <a href="{{url('/register')}}" style="text-decoration:underline; color:#29ABE2">Mot de passe oublié?</a> / <a href="{{url('/register')}}" style="text-decoration:underline; color:#29ABE2">Inscription</a>
            </center>
        </div>
    </form>



</div>
</div>
@endsection