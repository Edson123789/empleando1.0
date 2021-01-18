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
if (strlen($_SESSION['lssemsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    $propic = $_FILES["newpic"]["name"];
    $extension = substr($propic, strlen($propic) - 4, strlen($propic));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {

      $propic = md5($propic) . time() . $extension;
      move_uploaded_file($_FILES["newpic"]["tmp_name"], "images/" . $propic);

      $sql = "update tblperson set Picture=:pic where ID=:eid";

      $query = $dbh->prepare($sql);
      $query->bindParam(':pic', $propic, PDO::PARAM_STR);
      $query->bindParam(':eid', $eid, PDO::PARAM_STR);
      $query->execute();

      echo '<script>alert("Imagen ha sido actualizada satisfactoriamente")</script>';
    }
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
    <!-- <link rel="stylesheet" type="text/css" href="static/css/css/login.css"> -->
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
              <section class="content" >
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
                              <label for="exampleInputEmail1">Nombre</label>
                              <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlentities($row->Name); ?>" readonly='true'>
                            </div>
                            <div class="form-group ">
                              <label for="exampleInputEmail1" class="pr-3">Foto de Perfil</label>
                              <img style="border: 2px solid; color: black;" src="images/<?php echo $row->Picture; ?>" width="100" height="100" value="<?php echo $row->Picture; ?>">

                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nueva Foto de Perfil</label>
                              <input style="background: transparent;border: none; justify-content: center;" type="file" name="newpic" value="" class="form-control" id="newpic" required='true'>
                            </div>
                          </div>
                      <?php $cnt = $cnt + 1;
                        }
                      } ?>
                      <div style="display: flex; justify-content: center; ">
                        <button type="submit" class="btn btn-primary btn-md pr-5 pl-5" name="submit"> Actualizar </button>
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

    </script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
  </body>

  </html>
<?php }  ?>