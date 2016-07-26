<div style="font-size:20px; color:#29ABE2; margin-top:20px;">2. Option de livraison</div>
<br/>
<div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2;">
   Votre address:
    @if(Auth::check())
    <input type="radio" name="livraison_address" id="" value="" checked="checked">{{Auth::user()->address}}
    @endif
</div>