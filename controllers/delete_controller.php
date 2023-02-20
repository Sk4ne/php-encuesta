<?php

require_once '../helpers/show_error.php';
show_error();

/* navbar */
require '../views/navbar.view.php';
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/helpers/info_db.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/database/db.php');

$conexion = conexion();
if(!$conexion){
  header('Location: ../views/error.php');
}

$id_encuesta = $_GET['id'];
if(!$id_encuesta){
  header('Location: ../views/answer.view.php');
}

$sql = $conexion->prepare('DELETE FROM encuesta WHERE idEncuesta =:id');
$sql->execute(array('id' => $id_encuesta));


header('Location: ../views/answer.view.php');



?>