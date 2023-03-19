<?php

/* navbar */
require '../views/navbar.view.php';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/helpers/config.php');
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
  $radio_question = $_POST['r1'];

  // echo '<pre>';
  //  print_r($_POST['tipoQ']);
  // echo '</pre>';
  // die();
  
  /* VERIFICAMOS EL TIPO DE PREGUNTA SI ES MULTIPLE PASAMOS $radio_question y si es ABIERTA pasamos $answer_question */
  if ($_POST['tipoQ'] === 'PREGUNTA_MULTIPLE') {
    $sql = $conexion->prepare(
      'UPDATE encuestas SET tituloEncuesta = :titulo, tituloPregunta = :titulo_pregunta,respuestaPregunta = :respuesta_pregunta WHERE idEncuesta = :id' 
    );
  
    $sql->execute(array(
      ':id' => $id_encuesta,
      ':titulo' => $title_survey,
      ':titulo_pregunta' => $title_question,
      ':respuesta_pregunta' => $radio_question
    ));
  
    header('Location: ../views/answer.view.php');
    
  } else {
    $sql = $conexion->prepare(
      'UPDATE encuestas SET tituloEncuesta = :titulo, tituloPregunta = :titulo_pregunta,respuestaPregunta = :respuesta_pregunta WHERE idEncuesta = :id' 
    );
  
    $sql->execute(array(
      ':id' => $id_encuesta,
      ':titulo' => $title_survey,
      ':titulo_pregunta' => $title_question,
      ':respuesta_pregunta' => $answer_question
    ));
  
    header('Location: ../views/answer.view.php');
    
  }
  /* </VERIFICAMOS EL TIPO DE PREGUNTA SI ES MULTIPLE PASAMOS $radio_question y si es ABIERTA pasamos $answer_question */


}else{
  $id_encuesta = $_GET['id'];
  $id_encuesta = (int)$id_encuesta;
  if(empty($id_encuesta)){
    header('Location: ../views/answer.view.php');
  }
  $encuesta = $conexion->query("SELECT * FROM encuestas WHERE idEncuesta = $id_encuesta");
  $encuesta = $encuesta->fetchAll();
  
  if(!$encuesta){
    header('Location: ../views/answer.view.php');
  }
   
  // print_r($encuesta);

  $encuesta = $encuesta[0];

}
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/views/edit.view.php');

?>