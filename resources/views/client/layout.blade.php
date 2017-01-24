<?php 
setlocale(LC_ALL, "es_ES.UTF-8"); 
date_default_timezone_set('America/Monterrey');
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING );
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Christopher Medina | Alvaro Esparza" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/template/css/bootstrap.css" type="text/css" />
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="/template/css/style.css" type="text/css" />
	<link rel="stylesheet" href="/template/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="/template/css/font-icons.css" type="text/css" />	
	<link rel="stylesheet" href="/template/css/font-icons/medical/medical-icons.css" type="text/css" />

	<link rel="stylesheet" href="/template/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/template/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="/template/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->	

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="/template/js/jquery.js"></script>
	<script type="text/javascript" src="/template/js/plugins.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


	<!-- Vuejs script file -->
	<script src="https://unpkg.com/vue/dist/vue.js"></script>

	<style type="text/css">
	.logocecac{float: right;height: 100px;padding: 20px;}
	#logo img { padding: 10px;}
	@media (max-width: 991px){
		.logocecac{display: none;}
	}
	.welcome_heading{text-align: center;}

	.rating-container .caption {display: block!important;}

	/* Colors Palette*/
	.text-red { color: #C02942!important; }
	.text-yellow { color: #ECD078!important; }
	.text-green { color: #59BA41!important; }
	.text-brown { color: #774F38!important; }
	.text-aqua { color: #40C0CB!important; }
	.text-lime { color: #AEE239!important; }
	.text-purple { color: #5D4157!important; }
	.text-leaf { color: #A8CABA!important; }
	.text-pink { color: #F89FA1!important; }
	.text-dirtygreen { color: #1693A5!important; }
	.text-blue { color: #1265A8!important; }
	.text-amber { color: #EB9C4D!important; }
	.text-black { color: #111!important; }
	</style>

	<!-- Document Title
	============================================= -->
	<title>Encuesta Institucional CECAC 2017</title>
</head>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="no-sticky">

			<div id="header-wrap">

				<div class="container clearfix">

					<!-- Logo
					============================================= -->
					<div id="logo" class="center">
						<a href="/template/" class="standard-logo" data-dark-logo="img/logo2.png"><img alt="logo" src="{{ url('/img/logo2.png') }}"></a>

						<a href="/template/" class="retina-logo" data-dark-logo="img/logo2.png"><img alt="logo" src="{{ url('/img/logo2.png') }}"></a>
					</div>

					<div class="logocecac center" >
			            <img class="center" alt="logocecac" width="41" height="33" src="{{ url('/images/logo_cecac.png') }}">
			            <div class="welcome_heading"><h6>Centro Escolar Cuauht&eacute;moc A.C.</h6></div>
			        </div>

				</div>

			</div>

		</header><!-- #header end -->



		@yield('content')



   		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
		  
		  <!-- Copyrights
		  ============================================= -->
		  <div id="copyrights">

		    <div class="container clearfix">

		      <div class="col_full" style="margin-bottom: 0px; color:white;">
		        &copy; 2017 CECAC. Todos los Derechos Reservados.
		        <div class="copyright-links" style="float:right;"><a href="http://cecac.edu.mx/aviso-de-privacidad" target="_blank">Aviso de privacidad</a></div>
		      </div>


		    </div>

		  </div><!-- #copyrights end -->

		</footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ url('/template/js/functions.js') }}"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74183121-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>