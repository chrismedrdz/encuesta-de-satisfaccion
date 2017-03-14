@extends('client.layout')

@section('content')
	<section id="content">

	<div class="content-wrap" style="padding:0px;">

		<div class="container center clearfix" >		


				<div class="tabs tabs-bb clearfix ui-tabs ui-widget ui-widget-content ui-corner-all" id="tabs">

					<div class="tab-container">

						<div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tab-inicio" aria-labelledby="ui-id-29" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

							<div class="col_full topmargin">
								<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
									<div class="panel-body" style="padding: 40px;">
										
										<form id="login-form" name="login-form" class="nobottommargin" action="loginAdmin" method="post">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
			
											<h3><span class="text-red">Datos de Acceso</span></h3>

											<div class="form-group">
												    <label style="text-center">correo</label>
												    <input type="email" name ="email" class="form-control" id="email" placeholder="Email">
												  </div>
												  <div class="form-group">
												    <label for="exampleInputPassword1">contraseña</label>
												    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
											  </div>

											<div class="col_full ">
												<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" type="submit">Ingresar</button>
												
											</div>
											 

											@if (count($errors) > 0)
											    <div class="style-msg errormsg">
											        <div class="sb-msg">
											            @foreach ($errors->all() as $error)
											                {{ $error }}
											            @endforeach
											        </div>
											    </div>
											@endif
										</form>

										<div class="line line-sm"></div>
										
									</div>
								</div>
							</div>


						</div>
						

					</div>

				</div>


		</div>

	</div>

</section><!-- #content end -->

@stop