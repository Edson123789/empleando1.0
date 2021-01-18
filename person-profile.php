<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_SESSION['lssemsaid'])) {
	
	} 
  else{
	  
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets2/img/favicon.png" rel="icon">
  <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets2/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets2/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets2/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets2/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.5.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php
$vid=$_GET['viewid'];
$sql="SELECT * from  tblperson where ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="admin/images/<?php echo $row->Picture;?>" height="200" width="200" alt="listing item"class="img-fluid rounded-circle"/>
        <h1 class="text-light"><a><?php  echo $row->Name;?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="index.php"><i class="bx bx-home"></i> <span>Inicio</span></a></li>
          <li><a href="#about"><i class="bx bx-user"></i> <span>A cerca de</span></a></li>
          <li><a href="#contact"><i class="bx bx-envelope"></i> Contacto</a></li>
          <li><a href="#services"><a href="category.php"><i class="bx bx-server"></i> Regresar</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero"   class="d-flex flex-column justify-content-center align-items-center">
    <div class="" data-aos="fade-in">
      <h1 style="color:black"><?php  echo $row->Name;?></h1>
      <p  style="color:black">Yo soy <span  style="color:black" class="typed" data-typed-items=<?php  echo $row->Category;?>></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section =======  -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="admin/images/<?php echo $row->Picture;?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">

            <h3>Descripcion </h3>
            <br>
            <p><span><?php  echo $row->descripcion;?></span></p>
            </br>
<!-- Colocar descripcion en la base de datos -->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contacto</h2>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p><?php  echo $row->Address;?></p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p><?php  echo $row->correo;?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p><?php  echo $row->MobileNumber;?></p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="post" role="form" class="">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">E-mail</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Asunto</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Mensaje</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
        
              <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <?php $cnt=$cnt+1;}} ?>	
  <!-- ======= Footer ======= -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets2/vendor/jquery/jquery.min.js"></script>
  <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets2/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets2/vendor/php-email-form/validate.js"></script>
  <script src="assets2/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets2/vendor/counterup/counterup.min.js"></script>
  <script src="assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets2/vendor/venobox/venobox.min.js"></script>
  <script src="assets2/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets2/vendor/typed.js/typed.min.js"></script>
  <script src="assets2/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets2/js/main.js"></script>

</body>
</html>
