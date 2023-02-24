<?php 

// require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/views/header.view.php';
require_once __DIR__.'/views/answer.view.php'; 


// require_once 'navbar.view.php';
// require_once 'header.view.php';
// require_once '../helpers/config.php';
require_once __DIR__.'/./helpers/config.php';
// require URI.'/database/db.php';
require_once __DIR__.'/./database/db.php';

$conexion = conexion();
 if(!$conexion){
    header('Location: error.php');
 }
$encuestas = $conexion->query('SELECT * FROM encuesta');
$encuestas->execute();
$html = '

<div class="container">
<div class="mt-4 row">
  <div class="offset-2 col-md-8">
    <h2 class="text-center">Listado de encuestas</h2>
    <?php foreach ($encuestas as $encuesta): ?>
      <div class="mt-2 card listado-encuestas" >
        <div class="card-body">
         <h2 class="card-title text-center"><?php echo $encuesta["tituloEncuesta"]?></h2>
         <p class="card-text"><?php echo $encuesta["descripcionEncuesta"]?></p>
         <h4 class="card-title"><?php echo $encuesta["tituloPregunta"]?></h4>
         <p class="card-text"><?php echo $encuesta["respuestaPregunta"]?></p>

         <!-- BUTTON EDITAR -->
         <a href="../controllers/edit_controller.php?id=<?php echo $encuesta["idEncuesta"]?>" class="btn btn-outline-secondary">Editar</a>
         <!-- /BUTTON EDITAR -->

         <!-- BUTTON ELIMINAR -->
         <a href="../controllers/delete_controller.php?id=<?php echo $encuesta["idEncuesta"]?>" class="btn btn-outline-secondary" >Eliminar</a>
         <!-- BUTTON ELIMINAR -->
         <a href="../download.php?id=<?php echo $encuesta["idEncuesta"]?>" class="btn btn-outline-secondary">Descargar</a>
        </div>
      </div>
    <?php endforeach; ?>
    <hr/>
  </div>
</div>
</div>
';



 ?>

