<?php 
  require 'header.view.php';
  
?>
<div class="container">
  <div class="row">
    <div class="offset-2 col-md-8">
       <h1 class="mt-4 text-center p-3 bg-secondary text-white">Editando..</h1>
       <form class="mt-4" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <input type="hidden" value="<?php echo $encuesta['idEncuesta']?>" name='id' class='form-control'> 
        <div class="form-group">
          <label for="Titulo Encusta" class="font-weight-bold">TITULO ENCUESTA</label>
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
    </div>
  </div>
</div>