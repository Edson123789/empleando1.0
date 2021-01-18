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


  <link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="css/color/color.css">

	


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

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
	<div class="preloader"><span class="preloader-gif"></span></div>
	<div class="theme-wrap clearfix">
		<!--================================responsive log and menu==========================================-->
		<div class="wsmenucontent overlapblackbg"></div>
		<div class="wsmenuexpandermain slideRight">
			<a id="navToggle" class="animated-arrow slideLeft"><span></span></a>
			<a href="#" class="smallogo"><img src="images/logo.png" width="120" alt="" /></a>
		</div>
		<?php include_once('includes/header.php');?>
		
		<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgyallow-1 padding-top-30 padding-bottom-30"><!-- section title -->
			<h4 class="dark">Contacto</h4>
		</div><!-- section title end -->
	<div class="py-5 bg-image-full" style="background-image: url('https://www.unir.net/empresa/desarrollo-directivo/wp-content/uploads/2020/08/equipo-trabajo.jpg');">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 350px;"></div>
  </div>
		<!--================================CONTACT===========================================-->
		<section id="contact-form" class="margin-top-70 margin-bottom-40">
			<div class="container">
				<div class="row info-box-wrap clearfix">
					<?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- infobox -->
						<div class="info-box bgwhite shadow-1 clearfix">
							<div class="info-icon">
								<i class="fa fa-phone bgblue-1 white"></i>
							</div>
							<div class="info-content">
								<div class="info-title">
									
									<h6>Número de Contacto</h6>
								</div>
								<div class="info-disc">
									<p>+<?php  echo htmlentities($row->MobileNumber);?></p>
								</div>
							</div>
						</div>
					</div><!-- infobox end -->
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- infobox -->
						<div class="info-box bgwhite shadow-1 clearfix">
							<div class="info-icon">
								<i class="fa fa-envelope bggreen-1 white"></i>
							</div>
							<div class="info-content">
								<div class="info-title">
									
									<h6>Dirección de Correo</h6>
								</div>
								<div class="info-disc">
									<p><?php  echo htmlentities($row->Email);?></p>
								</div>
							</div>
						</div>
					</div><!-- infobox end -->
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><!-- infobox -->
						<div class="info-box bgwhite shadow-1 clearfix">
							<div class="info-icon">
								<i class="fa fa-map-marker bgyallow-1 white"></i>
							</div>
							<div class="info-content">
								<div class="info-title">
									
									<h6>Dirección</h6>
								</div>
								<div class="info-disc">
									<p><?php  echo htmlentities($row->PageDescription);?></p>
								</div>
							</div>
						</div>
					</div><!-- infobox end -->
					<?php $cnt=$cnt+1;}} ?>
				</div><!-- .row .info-box-wrap end -->
		
			
			</div><!-- container end -->
		</section>
		
		
		<?php include_once('includes/footer.php');?>
	</div>

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