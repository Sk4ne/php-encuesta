<?php 

  $titles = [];
  $selectOptions=[];
  // $textArea = isset($_POST['textAreas']) ? $_POST['textAreas']: "";
  
  if(isset($_POST['guardar'])){
    if (isset($_POST['selectOptions'])) {
      $selectOptions = $_POST['selectOptions'];
    }
    
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="#">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
  <div class="row">
    <div class="offset-3 col-md-6">
      <!-- <form> -->
        <div class="form-group">
          <input type="text" name='nombres[]' class='dato-input form-control' placeholder='YOUR NAME'>
        </div>
        <div class="mt-2 form-group">
          <input type="text" name='nombres[]' class='dato-input form-control' placeholder='YOUR NAME'>
        </div>
        <div class="mt-2 form-group">
          <input type="text" name='nombres[]' class='dato-input form-control' placeholder='YOUR NAME'>
        </div>

        <div class="container"></div>
        <button class="mt-4 btn btn-outline-secondary" onclick='viewsArray()'>Guardar</button>
      <!-- </form> -->
    </div>
  </div>
</div>
<script>
  function viewsArray(){
    var arrayInput = [];
    /* REFERENCIA A CADA UNO DE LOS INPUTS */
    var inputsValues = document.getElementsByClassName('dato-input');
    var namesValues = [].map.call(inputsValues,function(dataInput){
      arrayInput.push(dataInput.value);
    
    });
    arrayInput.forEach(inputsValuesData => {
      console.log("EL DATO ES :" + inputsValuesData);
    });
  }
</script>
</body>
</html>