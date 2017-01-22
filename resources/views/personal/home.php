<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema | Panel Control</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="css/sistemalaravel.css">

    <link rel="stylesheet" href="css/main.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <style type="text/css">
.displayText  {margin-top: -35px!important;opacity: 0; width: 203px!important;}
</style>
<!-- Content
============================================= -->
<div id="content2" class="toggler ui-corner-all ui-state-default" style="background: none;">

        <header class="medidas_header" >
     <!--      <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        
          <a class="navbar-brand" href="#">Project name</a>
        
        <div class="nav ">
          <ul class="nav ">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            
          </ul>
          <ul class="nav  navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
      </div>
    </nav> -->

  

    <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">logo</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Logotipo</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
         <li>
                <a href="logout" class="btn btn-primary btn-large">Salir</a>
              </li>
            </ul>
          </div>
        </nav>
        </header>

        <h4>Estimado Alumno</h4>

        <div id="descripcion" width="100%">
        
          <p class="evaluacion_staff" style="color:#161616;">
            El objetivo del Centro Escolar Cuauhtémoc, A.C. es conseguir un alto nivel de calidad en el servicio educativo que otorgamos.           
            <br><br>
            La informaci&oacute;n que nos proporciones es muy valiosa para nosotros, ya que nos permitir&aacute; continuar y mejorar el servicio en nuestra instituci&oacute;n.
            <br><br>
            Te recordamos que tu evaluaci&oacute;n es totalmente <b>CONFIDENCIAL</b> por lo que es fundamental contestes de la manera m&aacute;s precisa posible para asegurar un muy exitoso proceso de retroalimentaci&oacute;n.
          </p>

        </div>
      

        <form id="formulario" method="POST" action="include/alum_pmayor/inicio.php" style="margin:0;" >

        <table width="100%">
          <thead>
            <tr>
              <td class="ancho_fila">
                <h5 style="color: red;">Datos del Alumno</h5>

                <div class="margen_datos">

                <table width="100%">
                  <tr>
                    <td align="left"><p class="p_nom"><b>Apellido Paterno:</b></p></td>
                    <td align="left"><p class="p_nom"><b>Apellido Materno:</b></p></td>
                    <td align="left"><p class="p_nom"><b>Nombre(s):</b></p></td>
                    <td align="left"><p class="p_nom"><b>Colegio:</b></p> </td>
                  </tr>
                  <tr>
                    <td align="center" ><div class="field_x">
                          <input type="text" name="apellido_paterno" id="apellido_paterno" value="" required>                                         
                        </div>
                      </td>
                    
                    <td align="center" ><div class="field_x">
                          <input type="text" name="apellido_materno" id="apellido_materno" value="" required>                                         
                          </div>
                        </td>
                    
                    <td align="center" ><div class="field_x">
                            <input type="text" name="nombre" id="nombre" value="" required>                                         
                          </div>
                        </td>
                        <td align="left">
                          <select style="background-color: ghostwhite!important;" name="colegio" id="colegio" title="Ingrese el Colegio al que pertenece" required="required">
                        <option value="0">  </option>
                        <option value="ICC">Colegio Isabel La Católica</option>
                        <option value="LSC">Colegio La Salle</option>
                      </select>
                        </td>
                  </tr>
                </table>
                    
                    
                

                </div>

              </td>
              
            </tr>
          </thead>
          
          <tbody>

          </tbody>
        </table>

        <br><br>
        <div id="botones" align="center">
          <button type="submit" id="btn_Iniciar" name="btn_Iniciar" class="btn btn-info" style="margin-right: 0%;">Iniciar Encuesta</button>
          <button id="btn_Salir" class="btn btn-danger" style="margin-right: 0%;">Cancelar</button>
        </div>

        </form>


      </div>

      <script type="text/javascript" >
        document.getElementById('btn_Salir').onclick=function(){
          event.preventDefault();
                location.href="index.php";
            };
      </script>


    <script type="text/javascript" >
      $(document).ready(function(){
          $("#content2").effect("slide",300);
      });
    </script>

    <script >

    $(document).ready(function() {     

    $("#formulario").validate({
            rules: {
                apellido_paterno: { required: true, minlength: 3},
                apellido_materno: { required: true, minlength: 3},
                nombre: { required: true, minlength: 3},
                colegio: { selectcheck: true }
            },
            messages: {
          apellido_paterno : "Introduce tu Apellido Paterno",
          apellido_materno : "Introduce tu Apellido Materno",
          nombre : "Introduce tu Nombre(s).",
          colegio : "Introduce tu colegio",
            },
            submitHandler: function(form){
             //introduce lo que quieres que se haga cuando se vaya a enviar el formulario
            form.submit();
            }
        }); 

      jQuery.validator.addMethod('selectcheck', function (value) {
            return (value != '0');
        }, "Debe introducir un colegio");
      
      }); 

    </script>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- javascript del sistema laravel -->
   <script src="js/sistemalaravel.js"></script>
  </body>
</html>
