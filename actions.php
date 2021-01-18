<?php
if(!isset($_POST['palabClave1'])) exit('No');

require_once 'admin/includes/dbconnection.php';

function search(){

  $mysqli=getConnexion();

  $palabClave1=$mysqli->real_escape_string ($_POST['palabClave1']);
  
  $query="SELECT * FROM tblperson WHERE Category   LIKE '%$palabClave1%' ";
  // $query .= "OR Name OR MobileNumber LIKE '%$palabClave1%'";
  // $query .= "OR correo LIKE '%$palabClave1%'";
  $query .= "LIMIT 6";
  $res=$mysqli->query($query);
  while ($row=$res->fetch_array(MYSQLI_ASSOC)){
    echo'
    <li class="listas-item">
    <div class="card-listas-item listas-item-link">
      <div class="listas-item-link-media">
        <a href="#">
          <figure class="fig fig-m">
            <div>
              <div class="fig-container fig-container-one">
                <div class="fig-miniatura is-loaded">
                  <figure class="fig-miniatura-detalle">
                    <img class="imge"
                      src="admin/images/'.$row['Picture'].'"
                      alt="empresa">
                  </figure>
                </div>
              </div>
            </div>
          </figure>
        </a>
      </div>
      <div class="listas-item-link-info">
        <div class="listas-item-link-infoDescript">
          <div class="infoDescript-badge"></div>
          
          <div class="badge badge-sma badge-prim">
            <span class="badge-icontext" title="Destacado">Destacado</span>
          </div>
          <h2 class="infoDescript-tittle">
            <a href="person-profile.php?viewid='.$row['ID'].' " class="infoDescript-tittle-link">'.$row['Name'].'</a>
          </h2>
          <h3 class="infoDescript-subtittle">
            <a  class="infoDescript-subtittle-link">'.$row['Address'].'</a>
          </h3>
          <p class="infoDescript-text infoDescript-text-mobil">
          '.$row['Category'].'
          </p>
          <ul class="infoDescript-option">
            <li class="infoDescript-option-item infoDescript-option-item-mobil" ::after>'.$row['MobileNumber'].'</li>
            <li class="infoDescript-option-item infoDescript-option-item-mobil" ::after>'.$row['correo'].'
            </li>
            <li class="infoDescript-option-item infoDescript-option-item-mobil" ::after>Hace 3 horas</li>

          </ul>
        </div>

      </div>
    </div>
  </li>
    ';
   }
}
search();