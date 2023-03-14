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
  $encuestas = $conexion->prepare('SELECT idEncuesta,tituloEncuesta,descripcionEncuesta,codigo_referencia, COUNT(*) as total FROM encuestas GROUP BY codigo_referencia');
  $encuestas->execute();
  
  $data = $encuestas->fetchAll();
  /* echo '<pre>';
   print_r($data);
  echo '</pre>';
 */
  
  function x($codigo_referencia){
    $conexion = conexion();
    $info = $conexion->prepare("SELECT idEncuesta,tituloPregunta,codigo_referencia,respuestaPregunta FROM encuestas WHERE codigo_referencia = :codigo_referencia");
    $info->execute(array(
      ':codigo_referencia' => $codigo_referencia
    ));
  
     $info2 = $info->fetchAll();
    return $info2;
  }
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
            <?php foreach (x($encuesta['codigo_referencia']) as $dat):?>
              <div>
                <h4 class="card-title"><strong><?php echo $dat['tituloPregunta']?></strong> 
                  <a href="../controllers/edit_controller.php?id=<?php echo $dat['idEncuesta']?>" class="material-icons btn btn-outline-secondary">
                  edit_note
                  </a>
                  <a href='../controllers/delete_controller.php?id=<?php echo $dat['idEncuesta']?>' class="material-icons btn btn-outline-secondary" >
                    delete_forever
                  </a>
                </h4>
              </div>
              <p class="card-text"><?php echo $dat['respuestaPregunta']?></p>
            <?php endforeach;?>
           </div>
         </div>
       <?php endforeach; ?>
       <!-- MANEJAR LOS ERRORES CUANDO EL USUARIO INGRESA UN TEXTO DEMASIADO LARGO..... -->
       <hr/>
     </div>
   </div>
 </div>
 <!-- js bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 <!-- /js bootstrap -->