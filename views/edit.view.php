<?php 
  require 'header.view.php';
  function codAleatorio($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
?>
<div class="container">
  <div class="row">
    <div class="offset-2 col-md-8">
       <h1 class="mt-4 text-center p-3 bg-secondary text-white">Editando..</h1>
       <!-- NEW -->
       <?php if($encuesta['tipoPregunta'] == 'PREGUNTA_MULTIPLE'): ?>
          <form class="mt-4" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <input type="hidden" value="<?php echo $encuesta['idEncuesta']?>" name='id' class='form-control'> 
            <!-- ENVIO EL TIPO DE PREGUNTA PARA VALIDARLO EN EL ARCHIVO edit_controller.php -->
            <!-- <input type="hidden" value="<php echo $encuesta['tipoPregunta']?>" name='tipoQ' class='form-control'> -->
            <!-- </ENVIO EL TIPO DE PREGUNTA PARA VALIDARLO EN EL ARCHIVO edit_controller.php -->
            <div class="form-group">
              <label for="Titulo Encuesta" class="font-weight-bold">TITULO ENCUESTA</label>
              <input type="text" name="titulo_encuesta" value="<?php echo $encuesta['tituloEncuesta']?>" class="mt-2 form-control"/>
            </div>
            <div class="form-group">
              <label for="Titulo Pregunta" class="font-weight-bold">TITULO PREGUNTA</label>
              <input type="text" name="titulo_pregunta" value="<?php echo $encuesta['tituloPregunta']?>" class="mt-2 form-control"/>
            </div>       
            <!-- <div class="form-group">
            <label for="Respuesta Pregunta" class="font-weight-bold">RESPUESTA PREGUNTA</label>
              <textarea name="respuesta_pregunta" rows="5" class="form-control" ><php echo $encuesta['respuestaPregunta']?></textarea>
            </div>   -->
            <hr>
            <!--  -->
            <div class="form-check">
              <!-- <input type="radio" class='form-check-input' name='r1' value="SI" -->
              <input type="radio" class='form-check-input' name='input_radio' value="SI"
               <?php if($encuesta['respuestaPregunta'] === 'SI'){echo 'checked';}?> 
              >
              <label for="Respuesta Pregunta" class='font-weight-bold'>SI</label>
              <br>
              <input type="radio" class='form-check-input' name='input_radio' value="NO"
              <?php if($encuesta['respuestaPregunta'] === 'NO'){echo 'checked';}?> 
              >
              <label for="Respuesta Pregunta" class='font-weight-bold'>NO</label> 
              <br>
              <input type="radio" class='form-check-input' name='input_radio' value="UNPOCO"
              <?php if($encuesta['respuestaPregunta'] === 'UNPOCO'){echo 'checked';}?> 
              >
              <label for="Respuesta Pregunta" class='font-weight-bold'>UN POCO</label>
            </div>
            <!--  -->
            <input type="submit" class="btn btn-outline-secondary" value="Aceptar"> 
            <a href="/encuesta/views/answer.view.php" type='submit' class="btn btn-outline-secondary">Cancelar</a>
          </form>
        <?php else:?>
          <form class="mt-4" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <input type="hidden" value="<?php echo $encuesta['idEncuesta']?>" name='id' class='form-control'> 
            <!-- <input type="hidden" value="<php echo $encuesta['tipoPregunta']?>" name='tipoQuestionOpen' class='form-control'> -->
            <div class="form-group">
              <label for="Titulo Encuesta" class="font-weight-bold">TITULO ENCUESTA</label>
              <input type="text" name="titulo_encuesta" value="<?php echo $encuesta['tituloEncuesta']?>" class="mt-2 form-control"/>
            </div>
            <div class="form-group">
              <label for="Titulo Pregunta" class="font-weight-bold">TITULO PREGUNTA</label>
              <input type="text" name="titulo_pregunta" value="<?php echo $encuesta['tituloPregunta']?>" class="mt-2 form-control"/>
            </div>       
            <div class="form-group">
            <label for="Respuesta Pregunta" class="font-weight-bold">RESPUESTA PREGUNTA</label>
              <textarea name="respuesta_pregunta" rows="5" class="form-control" ><?php echo $encuesta['respuestaPregunta']?></textarea>
            </div>  
            <input type="submit" class="btn btn-outline-secondary" value="Aceptar"> 
            <a href="/encuesta/views/answer.view.php" type='submit' class="btn btn-outline-secondary">Cancelar</a>
          </form>
       <?php endif;?>
       <!-- <NEW -->
    </div>
  </div>
</div>