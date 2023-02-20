<?php 

  require_once '../helpers/show_error.php'; 
  show_error();


  /* navbar */
  require 'navbar.view.php';
  require 'header.view.php';
  // include_once('../helpers/info_db.php');
  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/encuesta/helpers/info_db.php');
  require RUTA.'/encuesta/database/db.php';

  $conexion = conexion();
   if(!$conexion){
      header('Location: error.php');
   }
  $encuestas = $conexion->query('SELECT * FROM encuesta');
  $encuestas->execute();
?>
 <div class="container">
   <div class="mt-4 row">
     <div class="offset-2 col-md-8">
       <h2 class="text-center">Listado de encuestas</h2>
       <?php foreach ($encuestas as $encuesta): ?>
         <div class="mt-2 card listado-encuestas" >
           <div class="card-body">
            <h2 class="card-title text-center"><?php echo $encuesta['tituloEncuesta']?></h2>
            <p class='card-text'><?php echo $encuesta['descripcionEncuesta']?></p>
            <h4 class="card-title"><?php echo $encuesta['tituloPregunta']?></h4>
            <p class='card-text'><?php echo $encuesta['respuestaPregunta']?></p>

            <!-- BUTTON EDITAR -->
            <a href="../controllers/edit_controller.php?id=<?php echo $encuesta['idEncuesta']?>" class='btn btn-outline-secondary'>Editar</a>
            <!-- /BUTTON EDITAR -->

            <!-- BUTTON ELIMINAR -->
            <a href='../controllers/delete_controller.php?id=<?php echo $encuesta['idEncuesta']?>' class='btn btn-outline-secondary' >Eliminar</a>
            <!-- BUTTON ELIMINAR -->
           </div>
         </div>
       <?php endforeach; ?>
       <hr/>
     </div>
   </div>
 </div>