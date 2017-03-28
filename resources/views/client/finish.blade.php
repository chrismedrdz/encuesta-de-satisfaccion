<div class="col_full topmargin center">	
	<img class="img-gracias" src="{{ url('/images/gracias.png') }} " style="margin-bottom:40px;">
	<H1 style="color: black;">Haz terminado satisfactoriamente la Encuesta.</H1></br>
	<h2 style="color: black;"> En un momento serás redireccionado </h2>
</div>

<div class="col_full nobottommargin center">

	<a class="button button-3d button-red nomargin" id="login-form-logout terminar" name="login-form-logout" type="button"  href="{{ url('/logout', [$usuario_id . 'e']) }}">Salir</a>
</div>

<script>
@php 
$url =action('Auth\LoginController@logout', [$usuario_id . 'e']);
@endphp
	function terminado(){
		 window.location.href ="{{$url}}";
	}

	setInterval(terminado, 6350);

</script>