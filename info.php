<?php 
  // empieza captura de salida
  ob_start();
?>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="check"
     name="check" onchange="javascript:mostrarInput()" />
  <label class="form-check-label" for="gridCheck"></label>
</div>
<div class="form-group col-md-6" id="content" style="display: none;">
  <input class="form-control" value="Contenido">
</div>
<script>
function mostrarInput() {
  elemento = document.getElementById("content");
  check = document.getElementById("check");

  if (check.checked) {
    elemento.style.display='block';
  }
  else {
    elemento.style.display='none';
  }
}
</script>
<?php // finalizar captura asignarlo a un var
$output = ob_get_clean();

// si convence y no hace falta mas movida, darle al echo

echo $output;