<form id="particulier" action="{{url('/register/particulier')}}" method="post" xmlns="http://www.w3.org/1999/html">
    {{csrf_field()}}

    <input id="nom" name="nom" type="text" size="30" placeholder="Nom" required/>

    <br/><br/>

    <input id="prenom" name="prenom" type="text" size="30" placeholder="Prénom"/>
    <br/><br/>

    <input class="{{$errors->has('email')?'error-input':''}}" name="email" type="email" size="30"
           placeholder="Votre adresse mail"
           required/><br/><br/>

    <input class="{{$errors->has('tel')?'error-input':''}}" name="tel" type="text" size="30"
           placeholder="N° de téléphone"
           style="font-size:16px; padding:5px" required/><br/><br/>

    <input name="address" type="text" size="30" placeholder="Adresse de facture: N° Rue"
          /><br/><br/>

    <input name="post" type="text" size="8" placeholder="Code postal" />
    <input name="ville" type="text" size="15" placeholder="Ville" /><br/><br/><br/>

    <input id="passe" name="password" type="password" size="30" placeholder="Votre mot de passe"
           minlength="6" required/><br/><br/>

    <input id="passe2" name="password_confirmation" type="password" size="30" placeholder="Confirmer votre mot de passe"
            minlength="6" equalTo="#passe" required/><br/><br/>
    <button class="btn submit-form">Valider</button>
    <br/><br/>
</form>