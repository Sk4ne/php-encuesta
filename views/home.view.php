<?php 
  // error_reporting(0);
  require_once __DIR__.'/../helpers/config.php';
  require_once __DIR__.'/../database/db.php';
  require_once 'navbar.view.php';
  require_once 'header.view.php';

  $conexion = conexion();
   if(!$conexion){
      header('Location: views/error.php');
   }

  $paintElement='';
  $error='';
  if(isset($_POST['submit'])){
    $title_survey = $_POST['title'];
    $description = $_POST['description'];
    $title_question = $_POST['title_question'];
    $type_question = $_POST['type_question'];
    // $answer_question = "0" || $_POST['answer_question'];  SE CAMBIO POR LA LINEA QUE ESTA a continuacion.
    $answer_question = isset($_POST['answer_question']) ? $_POST['answer_question']: "";

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
    // echo "<script>
    //   alert('HOLA MUNDO DESDE PHP JS' + $answerQuestion);
    // </script>";

    if(empty($error)){
     
    /* codigo original */
    //   $sql = $conexion->prepare('INSERT INTO encuesta VALUES(NULL,:title_survey,:description,:title_question,:type_question,:answer_question,CURRENT_TIMESTAMP)');
    //   $sql->execute(array(
    //     ':title_survey'=> $title_survey,
    //     ':description'=> $description,
    //     ':title_question'=> $title_question,
    //     ':type_question'=> $type_question,
    //     ':answer_question'=> $answer_question
    //   ));
    //   header('Location: answer.view.php');
    // }
  /* </codigooriginal> */
       
    function codAleatorio($length = 5) {
      return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    $codigo_referencia  = codAleatorio();

      for ($i=0; $i <count($type_question); $i++) { 
        $sql = $conexion->prepare('INSERT INTO encuesta VALUES(NULL,:title_survey,:description,:title_question,:type_question,:answer_question,:codigo_referencia,CURRENT_TIMESTAMP)');
          $sql->execute(array(
            ':title_survey'=> $title_survey,
            ':description'=> $description,
            ':title_question'=> $title_question[$i],
            ':type_question'=> $type_question[$i],
            ':codigo_referencia'=>$codigo_referencia,
            ':answer_question'=> $answer_question[$i]
          ));
          header('Location: answer.view.php');
      }
    }
  }
  $type_answer = array('PREGUNTA_MULTIPLE','PREGUNTA_ABIERTA');
  
?>

  <div class="container">
    <div class="mt-4 row">
      <div class="col-md-3"></div>
      <!-- <div class="offset-3 col-md-6" style='background-color:#aaa '> -->
      <div class="col-md-6">
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
              <input type="text" name="title_question[]" placeholder="Titulo Pregunta" class="form-control">
            </div>
            <div class="col">
              <select name="type_question[]" class="form-control"  id='answer_option' onchange='mostrarTextArea()'>
                <option value="Choose">Choose ...</option>
                <option value="PREGUNTA_MULTIPLE">PREGUNTA_MULTIPLE</option>
                <option value="PREGUNTA_ABIERTA">PREGUNTA_ABIERTA</option> 
              </select>
            </div>
          </div>
          <!-- </SUB - FORM> -->
          <div class="mt-4 form-group">
            <textarea name="answer_question[]" id='answer_question' placeholder="Escribe Tu Respuesta" rows="5" class='form-control'></textarea>
          </div>  
          <!-- </PINTAR LOS INPUTS OBLIGATORIOS -->
          <!-- MENSAJES: CREACION DE LA PREGUNTA EXITOSA O FALLO... -->
          <?php if (!empty($error)): ?>
            <div class='text-center p-3 mb-2 bg-danger text-white'>
              <?php echo $error;?>
            </div>
          <?php endif ?>
          <!-- </MENSAJES: CREACION DE LA PREGUNTA EXITOSA O FALLO... -->

          <!-- ESTE DIV CONTIENE LOS ELEMENTOS HTML CREADOS DINAMICAMENTE -->
          <div class="form-group" id='fatherContainer'></div>
          <!-- </ESTE DIV CONTIENE LOS ELEMENTOS HTML CREADOS DINAMICAMENTE -->
          <!-- submit - button -->
          <button type='submit' class='mt-4 btn btn-outline-secondary' name='submit' id='button_submit'>Guardar</button>
          <br><br><br><br>
        </form>


      </div>
      <!-- BUTTON ADD -->
      
      <div class="col-md-3">
      <br><br><br><br><br><br><br><br><br><br><br><br>
        <button class="btn btn-outline-secondary" onclick='createElements()'>+</button>
      </div>
      <!-- </BUTTON ADD -->

    </div> <!-- </PRIMER FILA -->
  </div>

  <script>
    const createElements = () =>{
      let padre = document.querySelector('#fatherContainer');
      let inp1 = document.createElement('div');
      inp1.innerHTML = /* html */`
      <div class="row">
        <div class="col">
          <input type="text" name="title_question[]" class='form-control' placeholder='TITULO PREGUNTA'>
        </div>
        <div class="col">
          <select name="type_question[]" class='form-control' id='answer_option' onchange='mostrarTextArea()'>
            <option value="Choose">Choose ...</option>
            <option value="PREGUNTA_MULTIPLE">PREGUNTA_MULTIPLE</option>
            <option value="PREGUNTA_ABIERTA">PREGUNTA_ABIERTA</option>
          </select>
        </div>
      </div>
      <div class="mt-4 form-group">
        <textarea name="answer_question[]" id='answer_question' placeholder="Escribe Tu Respuesta" rows="5" class='form-control'></textarea>
      </div>
      <!--<button class='btn btn-outline-secondary' onclick='eliminar(this)'>ELIMINAR</button>-->
      <button class='btn btn-outline-secondary' onclick='eliminar(this)'>
        <span class="material-icons">
          delete_forever
        </span>
      </button>
      <hr/>
      `;
      /* AGREGAMOS LOS ELEMENTOS AL DIV CONTENEDOR */
      padre.appendChild(inp1);
    }

    const eliminar = (e) =>{
      let contenedor = document.querySelector('#fatherContainer');
      let divPadre = e.parentNode;
      // console.log(e.parentNode.nodeName);
      contenedor.removeChild(divPadre);
    }
    const ocultarMostrarTextArea = () => {
      let typeQuestion = document.getElementById('answer_option').value;
      let textArea = document.getElementById('answer_question');
      if(typeQuestion == 'Choose' || typeQuestion == 'PREGUNTA_ABIERTA'){
        // textArea.setAttribute('name','xt');
        textArea.setAttribute('disabled','');
      }
    }
    ocultarMostrarTextArea();


    // function mostrarTextArea(){
    //   let selectNone = document.getElementById('answer_option').value;
    //   console.log(selectNone);
    //   let textArea = document.getElementById('answer_question');

    //   if(selectNone == 'PREGUNTA_MULTIPLE'){
    //     textArea.style.display='none';
    //   }else{
    //     textArea.style.display='block';
    //   }
    // }

  </script>

  <!-- SCRIPT -->
  <script src='<?php echo URL.'/js/showHide.js'?>'></script>
  <!-- /SCRIPT -->
  
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>