<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$aid=$_SESSION['lssemsaid'];
$sql="SELECT correo from  tblperson where ID=:aid";
$sql1="SELECT Picture from  tblperson where ID=:aid";
$sql2="SELECT ID from  tblperson where ID=:aid";

$query = $dbh -> prepare($sql);
$query1 = $dbh -> prepare($sql1);
$query2 = $dbh -> prepare($sql2);

$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query1->bindParam(':aid',$aid,PDO::PARAM_STR);
$query2->bindParam(':aid',$aid,PDO::PARAM_STR);

$query->execute();
$query1->execute();
$query2->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$results2=$query2->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$cnt1=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{    
}   

if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{   } 

if($query2->rowCount() > 0)
{
foreach($results2 as $row2)
{   } 
    
?>


<link href="img/e.png" rel="icon">                  
<header id="header" class="fixed-top ">
    
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo"><img src="../assets/img/empleandoLogo.png" alt="empleandoLogo"
          class="img-fluid"></a>

      <!-- d - display es reponsive nav menu, iconmenu (navigation-menu) -->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="../index.php">Inicio</a></li>
          <li><a href="../category.php">Categorias</a></li>
          <li><a href="../about.php">Nosotros</a></li>
          <li><a href="../contact.php">Contacto</a></li>
          
        </ul>
      </nav>
      <!-- <a class="get-started-btn ml-auto" href="admin/login.php"><i class="fa fa-plus-circle"></i> Admin</a>  -->
      <!-- <a href="loginn.php" class="get-started-btn ml-auto">Inicia Sesión</a> -->


   <!-- User -->
   <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">


                    <span class="avatar avatar-sm rounded-circle">
                        <!-- <ul><img alt="Image placeholder"  height="38" width="50"> </ul> -->
                        <ul><ul><ul><ul><ul><img src="images/<?php echo $row1->Picture;?>" height="38" width="50" alt="listing item" class="rounded-circle"/></ul></ul></ul></ul></ul>
                        
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold"> Bienvenido : <?php  echo $row->correo;?></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Hola!</h6>
                </div>
                <a href="admin/edit-person-detail2.php?editid=<?php echo  ($row2->ID);?>" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>Modificar Perfil</span>
                <a href="admin/changeimage2.php?editid=<?php echo  ($row2->ID);?>" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>Cambiar Foto</span>
                <div class="dropdown-divider"></div>
                <a href="logout1.php" class="dropdown-item">
                    <i class="ni ni-user-run"></i>
                    <span>Salir</span>
                </a>
                <?php $cnt=$cnt+1;}}} ?>
            </div>
        </li>
    </ul>




							
   
					
				
				
	

		</div>
					
    </div>
  </header>
