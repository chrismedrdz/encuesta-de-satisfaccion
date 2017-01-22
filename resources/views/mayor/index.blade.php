@extends('client.layout')

@section('content')

<style type="text/css">
.displayText  {margin-top: -35px!important;opacity: 0; width: 203px!important;}
p{margin-bottom: 0px;}
.content-wrap{padding: 40px 0px;}
.col_one_fourth{ margin-right: 3%;}
</style>
<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap" style="">

		<div class="container clearfix" id="contenido_principal">	

			<div class="title-block">
				<h2>Estimado <span>Alumno</span>:</h2>
				<span>La información que nos proporciones es muy valiosa para nosotros, ya que nos permitirá continuar y mejorar el servicio en nuestra institución.</span>
				<p>Te recordamos que tu evaluación es totalmente <b>CONFIDENCIAL</b> por lo que es fundamental contestes de la manera más precisa posible para asegurar un muy exitoso proceso de retroalimentación.</p>
			</div>

			<div class="col_full topmargin center">	

				<form id="data-form" name="data-form" class="nobottommargin" action="form1" method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<h3>Datos del Alumno</h3>
							<div class="col_one_fourth">
								<label for="login-form-alumno_nombre">Nombre:</label>
								<input type="text" id="alumno_nombre" name="alumno_nombre" value="{{$usuario->info->student_name}}" class="form-control not-dark text-center" required="required" readonly="">
							</div>

							<div class="col_one_fourth">
								<label for="login-form-alumno_apaterno">Apellido Paterno:</label>
								<input type="text" id="alumno_apaterno" name="alumno_apaterno" value="{{$usuario->info->student_lastname1}}" class="form-control not-dark text-center" readonly="readonly" required="required">
							</div>

							<div class="col_one_fourth">
								<label for="login-form-alumno_amaterno">Apellido Materno:</label>
								<input type="text" id="alumno_amaterno" name="alumno_amaterno" value="{{$usuario->info->student_lastname2}}" class="form-control not-dark text-center" readonly="readonly" required="required">
							</div>

							<div class="col_one_fourth">
								<label for="login-form-alumno_colegio">Colegio:</label>
								<select id="alumno_colegio" name="alumno_colegio" class="form-control text-center" disabled="disabled" required="required">
									<option value="0">Seleccione</option>
									<option value="1">Colegio Isabel la Católica</option>
									<option value="2">Colegio La Salle y Fco. G. Sada</option>
								</select>
							</div>

							<div class="col_full nobottommargin">

								<a class="button button-3d button-green nomargin" id="login-form-logout" name="login-form-submit" type="button" href="{{ url('/mayor/survey/' . $usuario->survey_id ) }}">Iniciar Encuesta</a>

								<a class="button button-3d button-red nomargin" id="login-form-logout" name="login-form-logout" type="button" href="{{ url('/logout') }}">Salir</a>
							</div>
						</form>

						<div class="line line-sm"></div>

			</div>			


		</div>

	</div>

</section><!-- #content end -->

<script type="text/javascript">
	$(document).ready(function(){
		$("#alumno_colegio option[value='<?php if( isset($usuario->info->school_id) ) echo  $usuario->info->school_id;?>']").attr('selected', 'selected');
	});
</script>

@stop