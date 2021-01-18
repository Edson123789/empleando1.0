<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_SESSION['lssemsaid'])) {
  include_once('includes/header.php');
  } 
else{
    include_once('includes/header copy.php');
  }

?>
<!DOCTYPE html>
<html>



<head>
<html lang="en">
<link href="assets/img/e.png" rel="icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="static/css/css/login.css">
  <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <title>Empleando</title>
  <link href="assets/img/e.png" rel="icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


</head>
<body>
	<!-- <div class="preloader"><span class="preloader-gif"></span></div> -->
	<!-- <div class="theme-wrap clearfix"> -->

 
	<section id="hero">
		<div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
			<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
			<div class="carousel-inner">
				<!-- Slide 1 -->
				<div class="carousel-item active" style="background-image: url(assets/img/fondotrabajo2.jpg)">
					<div class="carousel-container">
						<div class="container">
							<h2 class="animate__animated animate__fadeInDown">Encuentra tu trabajo ideal</span></h2>
							<!-- <form class="clearfix" name="search" action="serviceman-search.php" method="post"> -->
							<form name="search" action="serviceman-search.php" method="post">
								<p id="slide1">
									<!-- <div class="select-field-wrap pull-left"> -->
									<i class="icofont-google-map"></i> Ubicación
									<input class="p-2 m-3 input-field" type="text" placeholder="Ubicación" id="textBusqueda" name="location" required="required" >
									</select>
									<!-- </div> -->
									<br>
									<!-- <div class="select-field-wrap pull-left"> -->
									<i class="icofont-search-job"></i> Categorias
									<select class="p-2 m-3 search-form-select" name="categories" id="textLugar">
										<option class="options" id="option" value="all-categories">Selecciona</option>
										<?php

										$sql2 = "SELECT * from   tblcategory ";
										$query2 = $dbh->prepare($sql2);
										$query2->execute();
										$result2 = $query2->fetchAll(PDO::FETCH_OBJ);

										foreach ($result2 as $row) {
										?>
											<option value="<?php echo htmlentities($row->Category); ?>"><?php echo htmlentities($row->Category); ?></option>
										<?php } ?>
									</select>
									<!-- </div> -->
									<!-- <div class="submit-field-wrap pull-right"> -->
								<div>
									<input class="search-form-submit m-3 btn-get-started animate__animated animate__fadeInUp scrollto" name="search" type="submit" />
								</div>

								</p>
							</form>
						</div>
					</div>
				</div>

				<!-- Slide 2 -->
				<div class="carousel-item" style="background-image: url(assets/img/fondotrabajo.jpg)">
					<div class="carousel-container">
						<div class="container">
							<h2 class="animate__animated animate__fadeInDown">Sobre Empleando</h2>
							<p class="animate__animated animate__fadeInUp" id="slide2">Conoce un poco más sobre nosotros y nuestra historia.</p>
							<a href="about.php" class="btn-get-started animate__animated animate__fadeInUp scrollto" target="_blank">Nosotros</a>
						</div>
					</div>
				</div>

				<!-- Slide 3 -->
				<div class="carousel-item" style="background-image: url(assets/img/fondotrabajo3.jpg)">
					<div class="carousel-container">
						<div class="container">
							<h2 class="animate__animated animate__fadeInDown">Contáctanos</h2>
							<p class="animate__animated animate__fadeInUp" id="slide3">Te ayudamos en tu nueva búsqueda de trabajo, para que 
              lo logres de forma seguro y en el más breve tiempo posible. </p>
							<a href="contact.php" class="btn-get-started animate__animated animate__fadeInUp scrollto" target="_blank">¡Vamos para allá!</a>
						</div>
					</div>

				</div>

				<a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>

				<a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div>
	</section>

	<!-- <section id="search-form">
		<div class="container">
			<div class="search-form-wrap">
				<form class="clearfix" name="search" action="serviceman-search.php" method="post">

					<div class="select-field-wrap pull-left">

						<input class="input-field" type="text" placeholder="Ubicación" name="location" style="height:55px;" required="required">
						</select>
					</div>
					<div class="select-field-wrap pull-left">
						<select class="search-form-select" name="categories">
							<option class="options" value="all-categories">Todas las Categorías</option>
							<?php

							$sql2 = "SELECT * from   tblcategory ";
							$query2 = $dbh->prepare($sql2);
							$query2->execute();
							$result2 = $query2->fetchAll(PDO::FETCH_OBJ);

							foreach ($result2 as $row) {
							?>
								<option value="<?php echo htmlentities($row->Category); ?>"><?php echo htmlentities($row->Category); ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="submit-field-wrap pull-right">
						<input class="search-form-submit bgyallow-1 white" name="search" type="submit" />
					</div>
				</form>
			</div>
		</div>
	</section> -->

	<!-- ======= Main ======= -->
	<section id="team" class="team section-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="member d-flex align-items-start">
            <div class="pic">
              <img src="assets/img/empresa.png" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>Para empleados</h4>
              <p>Este es el sitio ideal para buscar una oferta de puesto de trabajo</p>
              <a href="category.php"><i class="icofont-curved-double-right">¡Publicar ahora!</i></a>
            </div>
            <div class="pic">
              <img src="assets/img/manos.png" class="img-fluid" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
          <div class="member d-flex align-items-start">
            <div class="pic">
              <img src="assets/img/cv.png" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>¿Aún tienes dudas?</h4>
              <p>Contacta con nosotros para brindarte orientación en todo el proceso de tu búsqueda.</p>
              <a href="contact.php"><i class="icofont-curved-double-right">¡Leer más!</i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section id="portfolio" class="portfolio">
    <div class="container">
      <h2><span>Búsquedas Recientes</span></h2>

      <div class="row portfolio-container">
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/arequipa.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Arequipa</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/informatica.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Informatica</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/salud.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Salud</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/tiempo.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Medio Tiempo</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
    <div class="container">
      <h2><span>Sectores</span></h2>  
      <div class="row portfolio-container">
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/informatica.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Informática</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/gasfiteria.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Gasfitería</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/salud.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Salud</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/secretariado.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Secretariado</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="container">
      <h2><span>Ciudades</span></h2>  
      <div class="row portfolio-container">
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/arequipa.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Arequipa</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/camana.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Camaná</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/mollendo.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Mollendo</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/lajoya.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>La Joya</h4>
              <div class="portfolio-links">
                <a href="category.php" title="Ver más"><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>


	<?php include_once('includes/footer.php'); ?>
	<!-- </div> -->


	<!--================================JQuery===========================================-->

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.js"></script><!-- jquery 1.11.2 -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

	<!--================================BOOTSTRAP===========================================-->

	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!--================================NAVIGATION===========================================-->

	<script type="text/javascript" src="js/menu.js"></script>

	<!--================================SLIDER REVOLUTION===========================================-->

	<script type="text/javascript" src="assets/revolution_slider/js/revolution-slider-tool.js"></script>
	<script type="text/javascript" src="assets/revolution_slider/js/revolution-slider.js"></script>

	<!--================================OWL CARESOUL=============================================-->

	<script src="js/owl.carousel.js"></script>
	<script src="js/triger.js" type="text/javascript"></script>

	<!--================================FunFacts Counter===========================================-->

	<script src="js/jquery.countTo.js"></script>

	<!--================================jquery cycle2=============================================-->

	<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>

	<!--================================waypoint===========================================-->

	<script type="text/javascript" src="js/jquery.waypoints.min.js"></script><!-- Countdown JS FILE -->

	<!--================================RATINGS===========================================-->

	<script src="js/jquery.raty-fa.js"></script>
	<script src="js/rate.js"></script>

	<!--================================ testimonial ===========================================-->
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">

		<div class="rg-image-wrapper">
				<div class="rg-image"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
						<h5></h5>
						<div class="caption-metas">
							<p class="position"></p>
							<p class="orgnization"></p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</script>
	<script type="text/javascript" src="assets/testimonial/js/jquery.tmpl.min.js"></script>
	<script type="text/javascript" src="assets/testimonial/js/jquery.elastislide.js"></script>
	<script type="text/javascript" src="assets/testimonial/js/gallery.js"></script>

 <!-- jQuery -->
 <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
	<!--================================custom script===========================================-->

	<script type="text/javascript" src="js/custom.js"></script>

	<!--================================nosotros===========================================-->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/venobox/venobox.min.js"></script>
	<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
	<!-- Vendor JS Files -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script type="text/javascript" src="forms/scripts.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>