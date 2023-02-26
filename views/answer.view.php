<?php 

  require_once 'navbar.view.php';
  require_once 'header.view.php';
  // require_once '../helpers/config.php';
  require_once __DIR__.'/../helpers/config.php';
  // require URI.'/database/db.php';
  require __DIR__.'/../database/db.php';

  $conexion = conexion();
   if(!$conexion){
      header('Location: error.php');
   }
  // $encuestas = $conexion->query('SELECT * FROM encuesta'); ORIGINAL
  $encuestas = $conexion->prepare('SELECT * FROM encuesta');
  $encuestas->execute();
  
  $data = [];

  foreach ($encuestas as $enc) {
    $data[] = $enc; 
  }

  // $sonIguales = count(array_unique($data)) === 1;
  // var_dump($sonIguales);
?>

 <div class="container">
   <div class="mt-4 row">
     <div class="offset-2 col-md-8">
       <h2 class="text-center">Listado de encuestas</h2>
       
       <?php foreach ($data as $encuesta): ?>
          <div class="mt-2 card listado-encuestas" >
           <div class="card-body">
            <h2 class="card-title text-center"><?php echo $encuesta['tituloEncuesta']?></h2>
            <p class='card-text'><?php echo $encuesta['descripcionEncuesta']?></p>
            <h4 class="card-title"><?php echo $encuesta['tituloPregunta']?></h4>
            <p class='card-text'><?php echo $encuesta['respuestaPregunta']?></p>

            <a href="../controllers/edit_controller.php?id=<?php echo $encuesta['idEncuesta']?>" class='btn btn-outline-secondary'>Editar</a>
            <a href='../controllers/delete_controller.php?id=<?php echo $encuesta['idEncuesta']?>' class='btn btn-outline-secondary' >Eliminar</a>
            <a href="../download.php?id=<?php echo $encuesta['idEncuesta']?>" class='btn btn-outline-secondary'>Descargar</a>
           </div>
         </div>
       <?php endforeach; ?>
       <hr/>
     </div>
   </div>
 </div>
 <!-- js bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 <!-- /js bootstrap -->