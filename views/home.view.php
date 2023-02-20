<?php 

  require_once '../helpers/show_error.php';
  show_error();
  // require './database/db.php'; ORIGINAL
  // require_once './helpers/info_db.php'; NO ES NECESARIO
  // require './helpers/info_db.php';  GENERAR UN ERROR NO SE CUAL SEA
  require $_SERVER['DOCUMENT_ROOT']. '/encuesta/helpers/info_db.php';
  // echo require_once __DIR__ . '/helpers/info_db.php';
  // $test = URI . '/helpers/info_db.php';

  // echo $test;

  require RUTA.'/encuesta/database/db.php';
  /* navbar */
  require 'navbar.view.php';
  require 'header.view.php';

  $conexion = conexion();
   if(!$conexion){
      header('Location: views/error.php');
   }
  
  // $info = new Datos();
  $error='';
  if(isset($_POST['submit'])){
    $title_survey = $_POST['title'];
    $description = $_POST['description'];
    $title_question = $_POST['title_question'];
    $type_question = $_POST['type_question'];
    $answer_question = $_POST['answer_question'];


    if (empty($title_survey)) {
      $error.= ' POR FAVOR INGRESE EL TITULO DE LA ENCUESTA <br/>';
    } 
    if(empty($description)){
     $error.= ' POR FAVOR INGRESE LA DESCRIPCION DE LA ENCUESTA <br/>';
    } 
    if(empty($title_question)){
      $error.= ' POR FAVOR INGRESE EL TITULO DE LA PREGUNTA <br/>';
    }

    if(empty($error)){

      $sql = $conexion->prepare('INSERT INTO encuesta VALUES(NULL,:title_survey,:description,:title_question,:type_question,:answer_question,CURRENT_TIMESTAMP)');
      $sql->execute(array(
        ':title_survey'=> $title_survey,
        ':description'=> $description,
        ':title_question'=> $title_question,
        ':type_question'=> $type_question,
        ':answer_question'=> $answer_question
      ));
      header('Location: answer.view.php');
    }
  }
   


    
?>

  <div class="container">
    <div class="mt-4 row">
      <div class="offset-3 col-md-6">
        <h1 class='text-center'>Generador de encuestas</h1>
        <hr>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method='POST'>
          <div class="form-group">
             <input type="text" name='title' class='form-control' placeholder='Titulo'>
          </div>
          <div class="form-group">
            <textarea name="description" rows="5" placeholder="Descripcion de la encuesta" class='form-control'></textarea>
          </div>
          <!-- SUB - FORM -->
          <div class="row">
            <div class="col">
              <input type="text" name="title_question" placeholder="Titulo Pregunta" class="form-control">
            </div>
            <div class="col">
              <select name="type_question" class="form-control">
                <option value="" disabled>Choose..</option>
                <option value="PREGUNTA_ABIERTA">PREGUNTA ABIERTA</option>
                <!-- <option value="">PREGUNTA MULTIPLE</option> -->
              </select>
            </div>
          </div>
          <!-- </SUB - FORM> -->
          <div class="mt-4 form-group">
            <textarea name="answer_question" placeholder="Escribe Tu Respuesta" rows="5" class='form-control'></textarea>
          </div>  
          <!-- MENSAJES: CREACION DE LA PREGUNTA EXITOSA O FALLO... -->
          <?php if (!empty($error)): ?>
            <div class='text-center p-3 mb-2 bg-danger text-white'>
              <?php echo $error;?>
            </div>
          <?php endif ?>
          <!-- </MENSAJES: CREACION DE LA PREGUNTA EXITOSA O FALLO... -->
          <!-- submit - button -->
          <button type='submit' class='mt-4 btn btn-outline-secondary' name='submit'>Guardar</button>
        </form>

        
      </div>
    </div>
  </div>
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>