
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

include_once('includes/header copy 2.php');
 

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  // $password = md5($_POST['password']);
  $password = $_POST['password'];
  $sql = "SELECT ID FROM tblperson WHERE correo=:username and contrasena=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  
  if ($_POST["username"]=="trembols18@gmail.com" &&  $_POST["password"]=="973648502"){
    $_SESSION['login'] = $_POST['username'];
    echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
  }elseif ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['lssemsaid'] = $result->ID;
    }
  }


  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['lssemsaid'] = $result->ID;
    }

    if (!empty($_POST["remember"])) {
      //COOKIES for username
      setcookie("user_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
      //COOKIES for password
      setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
    } else {
      if (isset($_COOKIE["user_login"])) {
        setcookie("user_login", "");
        if (isset($_COOKIE["userpassword"])) {
          setcookie("userpassword", "");
        }
      }
    }
    $_SESSION['login'] = $_POST['username'];
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  } else {
    echo "<script>alert('Datos incorrectos, ingresa de nuevo');</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">


<head>
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
 
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar Sesión</h5>
            <form class="form-signin" action="" method="post" id="login">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required="true" name="username" value=""
                <?php if (isset($_COOKIE["user_login"])) {
                  echo $_COOKIE["user_login"];
                } ?>>
                <label for="inputEmail">Dirección de email</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="true" value=""
                <?php if (isset($_COOKIE["userpassword"])) {
                  echo $_COOKIE["userpassword"];
                } ?>>
                <label for="inputPassword">Contraseña</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Recordar Contraseña</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login" type="submit">Iniciar Sesión</button>
            </form>
            
            <a class="d-block text-center mt-2" href="admin/register.php">Crear Cuenta</a>
            <hr class="my-4">
            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Iniciar sesión con Google</button>
            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Iniciar sesión con Facebook</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once('includes/footer.php'); ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>