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
                    <span style="font-size:24px; color:#29ABE2;">INSCRIPTION</span><br/><br/>

                    <select name="type" id="show-type">
                        <option value="1">Particulier</option>
                        <option value="2">Société</option>
                    </select>
                    <br/>
                    <form id="particulier" action="{{url('/register')}}" method="post">
                    {{csrf_field()}}
                    <div id="particulier">
                        <input id="nom" name="nom" type="text" size="30" placeholder="Nom" style="font-size:16px; padding:5px" required/>
                        <br/><br/>
                        <input id="prenom" name="prenom" type="text" size="30" placeholder="Prénom"
                               style="font-size:16px; padding:5px" /><br/><br/>
                    </div>
                        @if ($errors->has('email'))
                            <span class="error">
                         <strong>*{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input class="{{$errors->has('email')?'error-input':''}}" name="email" type="email" size="30" placeholder="Votre adresse mail"
                           style="font-size:16px; padding:5px" required/><br/><br/>


                        <input name="tel" type="text" size="30" placeholder="N° de téléphone"
                               style="font-size:16px; padding:5px" required/><br/><br/>
                        <input name="address" type="text" size="30" placeholder="Adresse de facture: N° Rue"
                               style="font-size:16px; padding:5px" /><br/><br/>
                        <input name="post" type="text" size="8" placeholder="Code postal" style="font-size:16px; padding:5px" />
                        <input name="ville" type="text" size="15" placeholder="Ville" style="font-size:16px; padding:5px" /><br/><br/><br/>
                        <input id="passe" name="passe" type="password" size="30" placeholder="Votre mot de passe"
                               style="font-size:16px; padding:5px" minlength="6" required/><br/><br/>
                        <input id="passe2" name="passe2" type="password" size="30" placeholder="Confirmer votre mot de passe"
                               style="font-size:16px; padding:5px" minlength="6" equalTo="#passe" required/><br/><br/>

                        <input style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; display:inline; font-size:18px;outline-style: none " value="Valider" type="submit" />
                        <input type="hidden" name="type" value="1">
                    <br/><br/>
                    </form>

                    <form id="societe" action="{{url('/register')}}" method="post" style="display: none">
                        {!! csrf_field() !!}

                            <input id="nom" name="nom" type="text" size="30" placeholder="Nom" style="font-size:16px; padding:5px" required/>
                            <br/><br/>
                            <input id="prenom" name="prenom" type="text" size="30" placeholder="Prénom"
                                   style="font-size:16px; padding:5px" /><br/><br/>
                            <input type="text" name="societename" placeholder="Société Name" size="30"
                                   style="font-size:16px; padding:5px" ><br/><br/>

                            <input name="email" type="email" size="30" placeholder="Votre adresse mail"
                               style="font-size:16px; padding:5px" required/><br/><br/>
                            <input name="tel" type="text" size="30" placeholder="N° de téléphone"
                               style="font-size:16px; padding:5px" required/><br/><br/>
                            <input name="address" type="text" size="30" placeholder="Adresse de facture: N° Rue"
                               style="font-size:16px; padding:5px" /><br/><br/>
                            <input name="pos" type="text" size="8" placeholder="Code postal" style="font-size:16px; padding:5px" />
                            <input name="ville" type="text" size="15" placeholder="Ville" style="font-size:16px; padding:5px" /><br/><br/><br/>
                            <input id="passe" name="passe" type="password" size="30" placeholder="Votre mot de passe"
                                   style="font-size:16px; padding:5px" minlength="6" required/><br/><br/>
                            <input id="passe2" name="passe2" type="password" size="30" placeholder="Confirmer votre mot de passe"
                                   style="font-size:16px; padding:5px" minlength="6" equalTo="#passe" required/><br/><br/>

                            <input style=" padding:8px; border-radius:3px; background-color:#29ABE2; color:#FFF; display:inline; font-size:18px;outline-style: none " value="Valider" type="submit" />
                            <input type="hidden" name="type" value="2">

                        <br/><br/>
                    </form>
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