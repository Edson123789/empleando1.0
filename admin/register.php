<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_SESSION['lssemsaid'])) {
  include_once('includes/header1.php');
  } 
else{
    include_once('includes/header1.php');
}

$lssemsaid=$_SESSION['lssemsaid'];
$name=$_POST['name'];
$mobnum=$_POST['mobilenumber'];
$address=$_POST['address'];
$city=$_POST['city'];
$category=$_POST['category'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{

}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$sql="insert into tblperson(Category,Name,Picture,MobileNumber,Address,City,correo,contrasena)values(:cat,:name,:pics,:mobilenumber,:address,:city,:correo,:contrasena)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':pics',$propic,PDO::PARAM_STR);
$query->bindParam(':cat',$category,PDO::PARAM_STR);
$query->bindParam(':mobilenumber',$mobnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':correo',$correo,PDO::PARAM_STR);
$query->bindParam(':contrasena',$contrasena,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Se ha agregado el detalle de persona.")</script>';
echo "<script>window.location.href ='../loginn.php'</script>";
  }
  else
    {
         echo '<script>alert("Algo salió mal. Por favor intente nuevamente")</script>';
    }

  
}

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" type="text/css" href="static/css/css/register.css"> -->
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <title>Empleando</title>
 

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">

    <link href="../assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card card-signin flex-row my-5">
            <div class="card-img-left1 d-none d-md-flex">
              <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">Crear una cuenta</h5>
              <form class="form-signin" role="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                    
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombres" required="true">
                  </div>
                <!-- <div class="form-label-group">
                  <input type="email" id="inputApellidos" class="form-control" placeholder="Apellidos" required>
                  <label for="inputApellidos">Apellidos</label>
                </div> -->

                <div class="form-group">
                  <input type="file" class="form-control" id="propic" name="propic" required="true">
                </div>

                <div class="form-group">

                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Número de Celular" maxlength="10" pattern="[0-9]+" required="true">
                  </div> 

                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <textarea type="text" class="form-control" id="address" name="address" placeholder="Dirección" required="true"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" required="true">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" required="true">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required="true">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <select type="text" name="category" id="category" value="" class="form-control" required="true">
                    <option value="">Escoge Categoría</option>
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

                <hr>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Crear cuenta</button>
              </form>
              <a class="d-block text-center mt-2 small" href="../loginn.php">Iniciar sesión</a>
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

    <!-- Vendor JS Files -->
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
    <?php include_once('../admin/includes/footer.php'); ?>
  </body>

  </html>
