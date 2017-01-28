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

				{!! Form::open(['id' => 'form_user', 'name' => 'form_user', 'onsubmit' => 'return false', 'method' => 'POST',  'url' => url()->current().'/postSurveyUser' ] ) !!}

							{!! Form::hidden('survey_id', $survey->id ) !!}
							<h3>Datos del Alumno</h3>
							<div class="col_one_fourth">
								<label for="alumno_nombre">Nombre:</label>
								<input type="text" id="alumno_nombre" name="alumno_nombre" value="" class="form-control not-dark text-center" required="required" >
							</div>

							<div class="col_one_fourth">
								<label for="alumno_apaterno">Apellido Paterno:</label>
								<input type="text" id="alumno_apaterno" name="alumno_apaterno" value="" class="form-control not-dark text-center" required="required">
							</div>

							<div class="col_one_fourth">
								<label for="alumno_amaterno">Apellido Materno:</label>
								<input type="text" id="alumno_amaterno" name="alumno_amaterno" value="" class="form-control not-dark text-center" required="required">
							</div>

							<div class="col_one_fourth">
								<label for="alumno_colegio">Colegio:</label>
								<select id="alumno_colegio" name="alumno_colegio" onchange="loadSectors(this);" class="form-control text-center" required="required">
									<option value>Seleccione</option>

									@if ( strpos($survey->name, 'Mayor') !== false  )

							    		<option value="ICC">Colegio Isabel la Católica</option>
										<option value="LSC">Colegio La Salle</option>

							    	@elseif ( strpos($survey->name, 'Secundaria') !== false  )

							    		<option value="ICD">Colegio Isabel la Católica</option>
										<option value="FGS">Colegio Francisco G. Sada</option>

							    	@elseif ( strpos($survey->name, 'Padre') !== false  )
							    		<option value="ICB">Preescolar</option>
							    		<option value="ICA">Primaria Menor CILAC</option>
										<option value="LSB">Primaria Menor La Salle</option>
										<option value="LSC">Primaria Mayor CILAC</option>
										<option value="ICC">Primaria Mayor La Salle</option>
										<option value="ICD">Secundaria CILAC</option>
										<option value="FGS">Secundaria FGS</option>

							    	@elseif ( strpos($survey->name, 'Empleados') !== false  )

							    		<option value="ICB">Preescolar</option>
							    		<option value="ICA">Primaria Menor CILAC</option>
										<option value="LSB">Primaria Menor La Salle</option>
										<option value="LSC">Primaria Mayor CILAC</option>
										<option value="ICC">Primaria Mayor La Salle</option>
										<option value="ICD">Secundaria CILAC</option>
										<option value="FGS">Secundaria FGS</option>

							    	@endif

									
								</select>
							</div>

							<div class="col_full nobottommargin">

								<button class="button button-3d button-green nomargin" id="login-form-submit" name="login-form-submit" type="submit" onclick="validateFormUser();">Iniciar Encuesta</button>

								<a class="button button-3d button-red nomargin" id="login-form-logout" name="login-form-logout" type="button"  href="{{ url('/logout') }}">Salir</a>
							</div>
						</form>

						@if (count($errors) > 0)
						    <div class="style-msg errormsg">
						        <div class="sb-msg">
						            @foreach ($errors->all() as $error)
						                {{ $error }}
						            @endforeach
						        </div>
						    </div>
						@endif

						<div class="line line-sm"></div>

			</div>			


		</div>

	</div>

</section><!-- #content end -->

<script type="text/javascript">
	function validateFormUser() {
        $("#form_user").validate({
			submitHandler: function(form) {
			    form.submit();
			}
 		});
    }
</script>

@stop