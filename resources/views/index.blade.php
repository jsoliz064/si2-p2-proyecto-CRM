<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Inicio CRM</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900|Lato:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/prettyphoto/css/prettyphoto.css" rel="stylesheet">
  <link href="lib/hover/hoverex-all.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Solid
    Template URL: https://templatemag.com/solid-bootstrap-business-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="{{url('/')}}">PROYECTO CRM</a>
      </div>
      <div class="navbar-collapse collapse navbar-right">
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{url('/')}}">INICIO</a></li>
          <li><a href="{{route('login')}}">INGRESAR</a></li>
          <li><a href="{{route('register')}}">REGISTRATE</a></li>
          
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
 
   <div id="headerwrap" >
    <div class="container" >
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <h3>Administra tu negocio</h3>
          <h1>Todo en un solo lugar con CRM</h1>
          <h3>Gestiona tus clientes, productos, empleados, correos, tareas, reuniones, documentos, etc.</h3>
          <h3>¡Suscribete Ahora!</h3>
        </div>
        <div class="col-lg-8 col-lg-offset-2 himg">
          <img src="img/pic2.jpg" width="75%" height="75%" class="img-responsive">
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>

  {{--Servicios--}}

            
     
    <div class="headerwrapC">
        <h2 class="title2">Nuestros planes</h2> 
        <div class="row">    
             
          
           <!--Services Item-->
           <div class="col-md-6">
               <div class="services-box">
                   <div class="services-icon"> </div> 
                   <div class="services-desc">
                      <h4>1 MES</h4>
                      <p>Incluye todas las funcionalidades por 30$</p>
                   </div>
               </div>
           </div>
            <!--End services Item-->
            
            <!--Services Item-->
           <div class="col-md-6">
               <div class="services-box">
                   <div class="services-icon"> </div> 
                   <div class="services-desc">
                      <h4>3 MESES</h4>
                      <p>Incluye todas las funcionalidades por 55$</p>
                   </div>
               </div>
           </div>
           <!--End services Item-->
        </div> 
          
        <div class="row">    
           <!--Services Item -->
           <div class="col-md-6">
               <div class="services-box">

                
                   <div class="services-icon"> 
                   
                  </div> 
                   <div class="services-desc">
                      <h4>6 MESES</h4>
                      <p>Incluye todas las funcionalidades por 100$ </p>
                   </div>
               </div>
           </div>
           <!--End services Item-->
           
           <!--Services Item-->
           <div class="col-md-6">
               <div class="services-box">
                   <div class="services-icon">  </div> 
                   <div class="services-desc">
                      <h4>1 AÑO</h4>
                      <p>Incluye todas las funcionalidades por 190$ </p>
                   </div>
               </div>
           </div>
          <!--End services Item-->
           </div>
           <div class="headerwrapButtom">
           <a href="{{route('register')}}" class="btn btn-success" type="button">REGISTRATE YA</a>
           </div>
        </div> <!--/.row-->
      
</div>


  <!-- /headerwrap -->

  

  <!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
  <div id="footerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>Acerca de</h4>
          <div class="hline-w"></div>
          <p>Estudiantes de 7mo semestre de Ingenieria en Sistemas. Facultad de Computacion FICCT</p>
        </div>
        <div class="col-lg-4">
          <h4>Redes Sociales</h4>
          <div class="hline-w"></div>
          <p>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
          </p>
        </div>
        <div class="col-lg-4">
          <h4>Ubicación</h4>
          <div class="hline-w"></div>
          <p>
            UAGRM
          </p>
        </div>

      </div>
    </div>
  </div>

  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>Grupo 4</strong>. Todos los derechos reservados
      </p>
    </div>
  </div>
  <!-- / copyrights -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/php-mail-form/validate.js"></script>
  <script src="lib/prettyphoto/js/prettyphoto.js"></script>
  <script src="lib/isotope/isotope.min.js"></script>
  <script src="lib/hover/hoverdir.js"></script>
  <script src="lib/hover/hoverex.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
