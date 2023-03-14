<?php 
  require_once __DIR__.'/../helpers/config.php';
  require_once __DIR__.'/../database/db.php';
  require_once 'navbar.view.php';
  require_once 'header.view.php';

  $conexion = conexion();
   if(!$conexion){
      header('Location: views/error.php');
   }
  $error='';
  if(isset($_POST['submit'])){
    $title_survey = $_POST['title'];
    $description = $_POST['description'];
    $title_question = $_POST['title_question'];
    $type_question = $_POST['type_question'];
    $answer_question = isset($_POST['answer_question']) ? $_POST['answer_question']: "";
    print_r($answer_question);
    if (empty($title_survey)) {
      $error.= ' POR FAVOR INGRESE EL TITULO DE LA ENCUESTA <br/>';
    } 
    if(empty($description)){
     $error.= ' POR FAVOR INGRESE LA DESCRIPCION DE LA ENCUESTA <br/>';
    } 
    if(empty($title_question)){
      $error.= ' POR FAVOR INGRESE EL TITULO DE LA PREGUNTA <br/>';
    }
    if($type_question[0] == 'Choose'){
      $error.= 'POR FAVOR ESCOJA UN TIPO DE PREGUNTA VALIDO <br/>';
    };

    $allTitles = [];

    if(empty($error)){
      function codAleatorio($length = 5) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
      }
      $codigo_referencia  = codAleatorio();
      for ($i=0; $i <count($title_question); $i++) { 
        $sql = $conexion->prepare('INSERT INTO encuestas VALUES(NULL,:title_survey,:description,:title_question,:type_question,:answer_question,:codigo_referencia,CURRENT_TIMESTAMP)');
          $sql->execute(array(
            ':title_survey'=> $title_survey,
            ':description'=> $description,
            ':title_question'=> $title_question[$i],
            ':type_question'=> $type_question[$i],
            ':codigo_referencia'=>$codigo_referencia,
            ':answer_question'=> $answer_question[$i]
          ));
          $ruta = URL;
          header("Location: $ruta/views/answer.view.php");
      }
    }
  }
  $type_answer = array('Choose','PREGUNTA_MULTIPLE','PREGUNTA_ABIERTA');
?>

  <div class="container">
    <div class="mt-4 row">
      <!-- <div class="offset-3 col-md-6"> -->
      <div class="col-sm-12 col-md-3"></div>
      <div class="col-sm-12 col-md-6">
        <h1 class='text-center' id='generador'>Generador de encuestas</h1>
        <hr>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method='POST'>
          <div class="form-group">
             <input type="text" name='title' class='form-control' placeholder='Titulo' id='titleSurvey'>
          </div>
          <div class="form-group">
            <textarea name="description" rows="5" placeholder="Descripcion de la encuesta" class='form-control'></textarea>
          </div>
          <!-- SUB - FORM -->
          <div class="row">
            <div class="col">
              <input type="text" name="title_question[]" placeholder="Titulo Pregunta" class="form-control" autocomplete="off" id='titleQuestion'>
            </div>
            <div class="col">
              <select name="type_question[]" class="select_option form-control"  id='answer_option' onchange='showHide()'>
                <?php foreach ($type_answer as $answer):?>
                  <option value="<?php echo $answer ?>"><?php echo $answer?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <!-- </SUB - FORM> -->
          <div class="mt-4 form-group">
            <textarea name="answer_question[]" id='answer_question' placeholder="Escribe Tu Respuesta" rows="5" class='answer_question form-control'></textarea>
          </div>  

          <!-- EN ESTA SECCION VA LAS PREGUNTAS OPCION MULTIPLE -->
           <div class="form-check">
             <input type="radio" class="form-check-input" name='inputRadio' value="1">
             <label for="" class="form-check-label">RTA A</label>
            </div> 
            <div class="form-check">
             <input type="radio" class="form-check-input" name='inputRadio' value="2">
             <label for="" class="form-check-label">RTA B</label>
            </div>
            <div class="form-check">
             <input type="radio" class="form-check-input" name='inputRadio' value="3">
             <label for="" class="form-check-label">RTA C</label>
            </div>       
          <!-- </EN ESTA SECCION VA LAS PREGUNTAS OPCION MULTIPLE -->
           <!-- ESTE DIV CONTIENE LOS ELEMENTOS HTML CREADOS DINAMICAMENTE -->
           <div class="form-group" id='fatherContainer'></div>
         
          <!-- MENSAJES: CREACION DE LA PREGUNTA EXITOSA O FALLO... -->
          <?php if (!empty($error)): ?>
            <div class='text-center p-3 mb-2 bg-danger text-white'>
              <?php echo $error;?>
            </div>
          <?php endif ?>

          <button type='submit' class='mt-4 btn btn-outline-secondary' name='submit' id='button_submit' >Guardar</button>

          <br><br><br><br>
        </form>
      </div>
      <div class="col-sm-12 col-md-3">
      <!-- <br><br><br><br><br><br><br><br><br><br><br><br> -->
        <button class="btn btn-outline-secondary" id='createElements'>+</button>
      </div>
    </div> <!-- </PRIMER FILA -->
  </div>
  <script src='<?php echo URL.'/js/showHide.js'?>'></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>