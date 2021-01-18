<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



if (strlen($_SESSION['lssemsaid'] == 0)) {
  header('location:logout.php');
} else {

  if (isset($_POST['submit'])) {

    $eid = $_GET['editid'];
    $name = $_POST['name'];
    $mobnum = $_POST['mobilenumber'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    $city = $_POST['city'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $descripcion = $_POST['descripcion'];

    $sql = "update tblperson set Category=:cat,Name=:name,MobileNumber=:mobilenumber,Address=:address,City=:city,correo=:correo,contrasena=:contrasena,descripcion=:descripcion where ID=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':cat', $category, PDO::PARAM_STR);
    $query->bindParam(':mobilenumber', $mobnum, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);
    $query->bindParam(':city', $city, PDO::PARAM_STR);
    $query->bindParam(':correo', $correo, PDO::PARAM_STR);
    $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

    $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();

    $query->execute();

    echo '<script>alert("Person Detail has been updated")</script>';
  }
?>
  <!DOCTYPE html>
  <html>

  <head>


    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <title>Empleando</title>
    <link href="../assets/img/e.png" rel="icon">

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
          <div class="card-img-left2 d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
            <div class="card-body">
              <h5 class="card-title text-center">Actualizar Detalles del Usuario</h5>
              <section class="content" id="content">
                <div class="row">
                  <div class="col-md-12">
                      <form role="form" method="post" enctype="multipart/form-data">
                        <?php
                        $eid = $_GET['editid'];
                        $sql = "SELECT * from tblperson where ID=$eid";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                          foreach ($results as $row) {               ?>
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Categoría de Servicios</label>
                                <select type="text" name="category" id="category" value="" class="form-control" required="true">
                                  <option value="<?php echo htmlentities($row->Category); ?>"><?php echo htmlentities($row->Category); ?></option>
                                  <?php

                                  $sql2 = "SELECT * from   tblcategory ";
                                  $query2 = $dbh->prepare($sql2);
                                  $query2->execute();
                                  $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                  foreach ($result2 as $row1) {
                                  ?>
                                    <option value="<?php echo htmlentities($row1->Category); ?>"><?php echo htmlentities($row1->Category); ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlentities($row->Name); ?>" required="true">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Número de Celular</label>
                                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo htmlentities($row->MobileNumber); ?>" maxlength="10" pattern="[0-9]+" required="true">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Dirección</label>
                                <textarea type="text" class="form-control" id="address" name="address" placeholder="Dirección" required="true"><?php echo htmlentities($row->Address); ?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Ciudad</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlentities($row->City); ?>" required="true">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Descripción</label>
                                <textarea type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo htmlentities($row->descripcion); ?>" required="true"></textarea>
                              </div>


                              <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="text" class="form-control" id="correo" name="correo" value="<?php echo htmlentities($row->correo); ?>" required="true">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo htmlentities($row->contrasena); ?>" required="true">
                              </div>
                            </div>
                        <?php $cnt = $cnt + 1;
                          }
                        } ?>
                        <div style="display: flex; justify-content: center;">
                          <button type="submit" class="btn btn-primary w3-button w3-teal mr btn-md pr-5 pl-5" name="submit">Actualizar</button>
                        </div>
                      </form>
                      <br>
                      <a style="display: flex; justify-content: center;" href="../index.php"><button class="btn btn-danger btn-md pr-5 pl-5 " name="xD">Cancelar </button></a>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <?php include_once('../includes/footer.php'); ?>

  
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>


    
  </body>

  </html>
<?php }  ?>