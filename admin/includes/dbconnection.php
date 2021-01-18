<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','lssemsdb');
// Establish database connection.

function getConnexion()
{
  $mysqli = new Mysqli('localhost', 'root', '', 'lssemsdb');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  return $mysqli;
}
try
{

$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>