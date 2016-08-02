<style>
	#new-address input {
		margin: 5px 0;
	}
</style>
<div style="font-size:20px; color:#29ABE2; margin-top:20px;">2. Option de livraison</div>
<br/>
<div style="padding:10px; width:400px; border-radius:3px; background-color:#F2F2F2;">
	Votre address:
	<br>
	<input type="radio" name="livraison_address" checked="checked" value="0">Récupérer au bureau Graphipro <br>

	@if(Auth::check())
		<input type="radio" name="livraison_address" id="" value="1">
		{{Auth::user()->address}},{{Auth::user()->post}},{{ucfirst(Auth::user()->ville)}}
		<br>
	@endif
	<input type="radio" name="livraison_address" id="new" value="2">New address
	<div id="new-address" style="display: none">
		<input type="number" minlength="5" placeholder="votre post code" name="postcode" id="postcode"> <br>
		<input type="text" placeholder="votre ville" name="ville"> <br>
		<input type="text" placeholder="votre address" name="address">
	</div>

</div>
<script>
	$("input[name$='livraison_address']").change(function () {
		showNewAddress();
//		computedPrice();
//		getLvprice(proid);
	});
	function showNewAddress() {
		var liv_address = $('input[name="livraison_address"]:checked ').val();
		if (liv_address == 2) {
			$('#new-address').show();
		} else {
			$('#new-address').hide();
		}
	}

</script>