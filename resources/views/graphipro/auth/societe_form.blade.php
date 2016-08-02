<form id="societe" action="{{url('/register/societe')}}" method="post" style="display: none">
    {!! csrf_field() !!}
    <input id="nom" name="nom" type="text" size="30" placeholder="Nom" required/>
    <br/><br/>
    <input id="prenom" name="prenom" type="text" size="30" placeholder="Prénom"
           required/><br/><br/>
    <input type="text" name="societe" placeholder="Société Name" size="30"
           required><br/><br/>

    <input class="{{$errors->has('email')?'error-input':''}}" name="email" type="email" size="30"
           placeholder="Votre adresse mail"
           required/><br/><br/>
    <input name="tel" type="number" size="30" placeholder="N° de téléphone"
           required/><br/><br/>
    <input name="address" type="text" size="30" placeholder="Adresse de facture: N° Rue"/><br/><br/>
    <input name="pos" type="text" size="8" placeholder="Code postal"/>
    <input name="ville" type="text" size="15" placeholder="Ville"/><br/><br/><br/>
    <input id="passe" name="passe" type="password" size="30" placeholder="Votre mot de passe"
           minlength="6" required/><br/><br/>
    <input id="passe2" name="passe2" type="password" size="30" placeholder="Confirmer votre mot de passe"
           minlength="6" equalTo="#passe" required/><br/><br/>

    <button class="btn submit-form">Valider</button>
    <br/><br/>
</form>
