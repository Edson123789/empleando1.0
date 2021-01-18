<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_SESSION['lssemsaid'])) {
  include_once('includes/header.php');
} else {
  include_once('includes/header copy.php');
}
?>
<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" type="text/css" href="css/color/color.css">
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
  <div class="preloader"><span class="preloader-gif"></span></div>
  <div class="theme-wrap clearfix">
    <!--================================responsive log and menu==========================================-->
    <div class="wsmenucontent overlapblackbg"></div>
    <div class="wsmenuexpandermain slideRight">
      <a id="navToggle" class="animated-arrow slideLeft"><span></span></a>

    </div>
    <!--================================HEADER==========================================-->

    <!--================================PAGE TITLE==========================================-->
    <!-- <div class="page-title-wrap bggreen-1 padding-top-30 padding-bottom-30"> -->
    <!-- <h4 class="white">Categorías</h4> -->
  </div><!-- section title end -->

  <!--================================CATEGOTY SECTION==========================================-->

  <section class="categories-section padding-top-40 padding-bottom-40">
    <div class="container busqueda">
      <!-- section container -->
      <div class="section-title-wrap margin-bottom-50">
        <!-- section title -->
        <h1 style="font-weight: bold;"class="animate__animated animate__fadeInDown p-2 m-3 white">Categorías de Trabajo Local</h1>
        <div class="title-divider">

        </div>
      </div><!-- section title end -->
      <div>
        <div class="col-md-12 col-sm-6 col-xs-12">
          <!-- category column -->
          <div>


            <div class="cat-list-wrap">
              <ul class="cat-list">
                <?php



                $sql = "SELECT Category, count(ID) as total from tblperson group by Category";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);



                $sth = $dbh->prepare('SELECT count(*) as total1 from tblperson');
                $sth->execute();

                $sql1 = "SELECT ID from tblperson ";
                $query7 = $dbh->prepare($sql1);
                $query7->execute();
                $results7 = $query7->fetchAll(PDO::FETCH_OBJ);
                $totperson1 = $query7->rowCount();


                $cnt = 1;
                if ($query->rowCount() > 0) {
                  foreach ($results as $row) {               ?>
                    <h5 >
                      <li style="list-style:none;"><a class="white ali" style="text-decoration: none;" href="view-category-detail.php?viewid=<?php echo htmlentities($row->Category); ?>"><?php echo htmlentities($row->Category); ?> <span>(<?php echo htmlentities($row->total); ?>)</span></a></li>
                    </h5>
                <?php $cnt = $cnt + 1;
                  }
                } ?>

              </ul>
            </div>
          </div>


        </div>
      </div><!-- section container end -->
  </section>


  <!-- ======= Main ======= -->
  <div id="main">
    <div class="search-cant">
      <div class="search-cant-title">
        <h1 class="search-cant-title-num"><?php echo htmlentities($totperson1); ?> avisos encontrados</h1>
        <!-- <a href="#search-main-filters" class="get-started-btn ml-auto" id="filtrar">Filtrar</a> -->
        <!-- <a class="get-started-btn ml-auto" id="filtrar">Filtrar</a> -->
        <button type="button" class="get-started-btn ml-auto d-lg-none" id="filtrar"> Filtrar </button>
      </div>
    </div>
    <div class="search-main">
      <div class="search-main-filters" id="search-main-filters">
        <div class="sidebar-filters">
          <div class="sidebar-filters-form">
            <h2><span><i class="icofont-filter"></i></span> Filtrar</h2>
            <fieldset class="sidebar-fieldset">
              <legend class="sidebar-fieldset-legend"><span><i class="icofont-ui-calendar"></i></span> Fecha de
                Publicación</legend>
              <div class="filters">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="fechapubli" value="option1" id="fechapubli-1" checked>
                  <label class="form-check-label" for="fechapubli-1">Último momento</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="fechapubli" value="option2" id="fechapubli-2">
                  <label class="form-check-label" for="fechapubli-2">Ayer</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="fechapubli" value="option3" id="fechapubli-3">
                  <label class="form-check-label" for="fechapubli-3">Últimos 3 días</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="fechapubli" value="option4" id="fechapubli-4">
                  <label class="form-check-label" for="fechapubli-4">Última semana</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="fechapubli" value="option5" id="fechapubli-5">
                  <label class="form-check-label" for="fechapubli-5">Últimos 15 días</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="fechapubli" value="option6" id="fechapubli-6">
                  <label class="form-check-label" for="fechapubli-6">Último mes</label>
                </div>
              </div>
            </fieldset>
            <fieldset class="sidebar-fieldset">
              <legend class="sidebar-fieldset-legend"><span><i class="icofont-search-2"></i></span> Palabra Clave
              </legend>



              <form action="" id="form1">
                <input type="text" name="palabClave" id="palabClave1">

              </form>





              <!-- <button type="submit" id="palabClaveBuscar">Buscar</button> -->
            </fieldset>
            <fieldset class="sidebar-fieldset">
              <legend class="sidebar-fieldset-legend"><span><i class="icofont-file-document"></i></span> Experiencia (en
                años)</legend>
              <input type="number" name="anios" id="anios" placeholder="Años" data-validation="number" min="1" max="10">
            </fieldset>
            <fieldset class="sidebar-fieldset">
              <legend class="sidebar-fieldset-legend"><span><i class="icofont-sun-alt"></i></span> Tiempo de Jornada
              </legend>
              <div class="filters">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tiemjorn" value="option1" id="tiemjorn-1" checked>
                  <label class="form-check-label" for="tiemjorn-1">Tiempo Completo</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tiemjorn" value="option2" id="tiemjorn-2">
                  <label class="form-check-label" for="tiemjorn-2">Medio Tiempo</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tiemjorn" value="option3" id="tiemjorn-3">
                  <label class="form-check-label" for="tiemjorn-3">Por horas</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tiemjorn" value="option4" id="tiemjorn-4">
                  <label class="form-check-label" for="tiemjorn-4">Medio tiempo-Mañana</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tiemjorn" value="option5" id="tiemjorn-5">
                  <label class="form-check-label" for="tiemjorn-5">Medio tiempo-Tarde</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="tiemjorn" value="option6" id="tiemjorn-6">
                  <label class="form-check-label" for="tiemjorn-6">Medio tiempo-Noche</label>
                </div>
              </div>
            </fieldset>
            <fieldset class="sidebar-fieldset">
              <legend class="sidebar-fieldset-legend"><span><i class="icofont-file-document"></i></span> Tipo de
                Contrato</legend>
              <div class="filters">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contrato" value="option1" id="contrato-1" checked>
                  <label class="form-check-label" for="contrato-1">Indefinido</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contrato" value="option2" id="contrato-2">
                  <label class="form-check-label" for="contrato-2">Duración determinada</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contrato" value="option3" id="contrato-3">
                  <label class="form-check-label" for="contrato-3">Parcial</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contrato" value="option4" id="contrato-4">
                  <label class="form-check-label" for="contrato-4">Practicante</label>
                </div>
              </div>
            </fieldset>

          </div>

        </div>
      </div>










      <div class="search-main-listas">
        <ul id="listas1"></ul>
      </div>
    </div>
  </div>



  </div>
  <?php include_once('includes/footer.php'); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/main1.js"></script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>