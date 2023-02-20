<?php

require_once '../helpers/show_error.php';
show_error();

/* navbar */
require '../views/navbar.view.php';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/helpers/info_db.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/database/db.php');

$conexion = conexion();
if(!$conexion){
  header('Location: ../views/error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  /* En esta seccion se valida si el usuario presiona el boton editar
  Si lo presiona se envia la data que este cargada a la base de datos */

  $id_encuesta = $_POST['id'];
  $title_survey = $_POST['titulo_encuesta'];
  // $description = $_POST['descripcion_encuesta'];
  $title_question = $_POST['titulo_pregunta'];
  // $type_question = $_POST['type_question'];
  $answer_question = $_POST['respuesta_pregunta'];



  $sql = $conexion->prepare(
    'UPDATE encuesta SET tituloEncuesta = :titulo, tituloPregunta = :titulo_pregunta,respuestaPregunta = :respuesta_pregunta WHERE idEncuesta = :id' 
  );

  $sql->execute(array(
    ':id' => $id_encuesta,
    ':titulo' => $title_survey,
    // ':descripcion' => $description,
    ':titulo_pregunta' => $title_question,
    // ':tipo_pregunta' => $type_question,
    ':respuesta_pregunta' => $answer_question
  ));

  header('Location: ../views/answer.view.php');
}else{
  $id_encuesta = $_GET['id'];
  $id_encuesta = (int)$id_encuesta;
  if(empty($id_encuesta)){
    header('Location: ../views/answer.view.php');
  }
  $encuesta = $conexion->query("SELECT * FROM encuesta WHERE idEncuesta = $id_encuesta");
  $encuesta = $encuesta->fetchAll();
  
  if(!$encuesta){
    header('Location: ../views/answer.view.php');
  }
   
  // print_r($encuesta);

  $encuesta = $encuesta[0];

}
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/views/edit.view.php');

?>