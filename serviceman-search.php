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
	<div class="preloader"><span class="preloader-gif"></span></div>
	<div class="theme-wrap clearfix">
		<!--================================responsive log and menu==========================================-->
		<div class="wsmenucontent overlapblackbg"></div>
		<div class="wsmenuexpandermain slideRight">
			<a id="navToggle" class="animated-arrow slideLeft"><span></span></a>
			<a href="#" class="smallogo"><img src="images/logo.png" width="120" alt="" /></a>
		</div>

		
		<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgorange-1 padding-top-30 padding-bottom-30"><!-- section title -->
			<h4 class="white">Resultados de Búsqueda</h4>
		</div><!-- section title end -->
		
		
		
		<section class="aside-layout-section padding-top-20 padding-bottom-40">
			<div class="container"><!-- section container -->
				<div class="row"><!-- row -->
					<div class="col-md-12 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
						<div class="listing-section padding-bottom-40">
							<div class=""><!-- section container -->
								<div class="add-listing-wrapper">
									<div class="listing-main gridview tab-content">
											<div id="latest-listing" class="tab-pane active">
												<div class="listing-wrapper three-column row">
<?php

if($_GET['viewid']!='')
{
$_SESSION['vid']=$_GET['viewid'];
}
$vid=$_SESSION['vid'];
//Getting default page number
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }

// Formula for pagination
$categories=$_POST['categories'];
$location=$_POST['location'];

        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
$total_pages_sql = "SELECT COUNT(*) FROM tblperson where (Category=:cat and City=:loc)";
$ret= $dbh -> prepare($total_pages_sql);
$query->bindParam(':loc',$location,PDO::PARAM_STR);
$query->bindParam(':cat',$categories,PDO::PARAM_STR);
$ret->execute();
$total_rows = $ret->fetchColumn();
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql="SELECT * from  tblperson where (Category=:cat and City=:loc) LIMIT $offset, $no_of_records_per_page";
$query = $dbh -> prepare($sql);
$query->bindParam(':loc',$location,PDO::PARAM_STR);
$query->bindParam(':cat',$categories,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
													<div class="item col-md-4 col-sm-6 col-xs-12">
														<!-- .ITEM -->
														<div class="listing-item clearfix">
	
															<div class="figure">
																<img src="admin/images/<?php echo $row->Picture;?>" alt="listing item" height="200" width="200"/>
																
															</div>
															<div class="listing-content clearfix">
																
																<div class="listing-title">
																	<h6><a href="single-person-detail.php?viewid=<?php echo htmlentities ($row->ID);?>"><?php  echo $row->Name;?></a></h6>
																</div>
																
																<div class="listing-location pull-left"><!-- location-->
																	<i class="fa fa-mobile"></i> : 
																	<?php  echo $row->MobileNumber;?>
																</div><!-- location end-->
																
															</div>
														
														</div>
														<div class="listing-border-bottom bgyallow-1"></div>
													</div>
	<?php $cnt=$cnt+1;}} ?>
												</div>
											</div>
									</div>
								</div>
							</div><!-- section container end -->
						</div>
						<div style="margin-left:30%" >

    <ul class="body pagination pagination-primary">
<li class="page-item"><a class="page-link" href="?pageno=1">Previo</a></li>

      <li class="page-item active <?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>  

  <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Próximo</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link"> Último</a></li>
   
                            </ul>
</div>
						
					
					</div>
							
				</div>
			</div><!-- section container end -->
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
	
	<!--================================MAP===========================================-->
		
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBueyERw9S41n4lblw5fVPAc9UqpAiMgvM&amp;sensor=false"></script>
	<script type="text/javascript" src="js/map.js"></script>
	<!-- map with geo locations -->
	
	<script type="text/javascript" src="js/jquery.mapit.js"></script>
	<script src="js/initializers.js"></script>
	
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
	
	<!--================================custom script===========================================-->
		
	<script type="text/javascript" src="js/custom.js"></script>
    
</body>
</html>