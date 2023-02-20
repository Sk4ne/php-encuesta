<?php 

  require_once '../helpers/show_error.php';
  show_error(); 
  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/helpers/info_db.php');
  function conexion(){
        try {
          $host = HOST;
          $db_name = DB_NAME;
          $user_db = USER_DB;
          $password = PASS;
          $conexion = new PDO("mysql:host=$host;dbname=$db_name", $user_db, $password);
          return $conexion;
        } catch (PDOException $e) {
          return false;
        }

}


?>
