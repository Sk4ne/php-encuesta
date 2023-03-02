<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="mt-4 row">
      <div class="offset-3 col-md-6">
        <form>
          <div class="form-group">
            <input type="text" name="titulo[]" id='titulo' class='form-control' placeholder='TITULO'>
          </div>
          <div class="form-group">
            <select name="selectOption[]" id="selectOption" class='form-control' onchange='funciona()'>
              <option value="Choose">Choose...</option>
              <option value="ABIERTA">ABIERTA</option>
            </select>
          </div>
          <div class="form-group">
            <textarea name="textArea[]" id="textArea" class='form-control'></textarea>
          </div>
          <!-- COPIA -->
          <div class="form-group">
            <input type="text" name="titulo[]" id='titulo' class='form-control' placeholder='TITULO'>
          </div>
          <div class="form-group">
            <select name="selectOption[]" id="selectOption" class='form-control' onchange='funciona()'>
              <option value="Choose">Choose...</option>
              <option value="ABIERTA">ABIERTA</option>
            </select>
          </div>
          <div class="form-group">
            <textarea name="textArea[]" id="textArea" class='form-control'></textarea>
          </div>
          <!-- COPIA -->
          <!-- div container -->
          <div id='fatherContainer'></div>
          <button type='submit' class='btn btn-outline-secondary' id='guardar'>Save</button>
        </form>
      </div>
      <div class="col-md-3">
        <button class='btn btn-outline-secondary' id='agregar'>+</button>
      </div>
    </div>
  </div>

  <script>
    let titulo = document.querySelectorAll('#titulo');
    // let selectOption = document.querySelectorAll('#selectOption');
    let select = document.querySelector('#selectOption');
    // let textArea = document.querySelector('#textArea');
    let guardar = document.querySelector('#guardar');
    let agregar = document.querySelector('#agregar');
    let divPadre = document.querySelector('#fatherContainer');


    // agregar.addEventListener('click',(event)=>{
    //   let children = document.createElement('div');
    //   children.innerHTML = /* HTML */`
    //   <div class="form-group">
    //     <input type="text" name="titulo[]" id='titulo' class='form-control' placeholder='TITULO'>
    //   </div>
    //   <div class="form-group">
    //     <select name="selectOption[]" id="selectOption" class='form-control'>
    //       <option value="Choose">Choose...</option>
    //       <option value="ABIERTA">ABIERTA</option>
    //     </select>
    //   </div>
    //   <div class="form-group">
    //     <textarea name="textArea[]" id="textArea" class='form-control'></textarea>
    //   </div>
    //   `;
    //   /* AGREGAMOS EL HIJO AL PADRE */
    //   divPadre.appendChild(children);
    // })


    /* ESTA VEZ FUNCIONA */
        let almacen = []
        let selectOption = document.querySelectorAll('#selectOption');
        let textArea = document.querySelectorAll('#textArea');
        // e.preventDefault();
        // console.log(e);
          /* REFERENCIA A CADA UNO DE LOS INPUTS */
        var namesValues = [].map.call(selectOption,function(dataInput){
          almacen.push(dataInput.value);
        });

        almacen.forEach(element => {
          // console.log('ELEMENTO : ' + element);
          console.log(element);
        });
      // guardar.addEventListener('click',(e)=>{
        function funciona(e){
          var selectOptions = [];
          var textAreas = [];
          let selectOption = document.querySelectorAll('#selectOption');
          let textArea = document.querySelectorAll('#textArea');
          // e.preventDefault();
          // console.log(e);
            /* REFERENCIA A CADA UNO DE LOS INPUTS */
          var namesValues = [].map.call(selectOption,function(dataInput){
            selectOptions.push(dataInput.value);
          });
          
          var names2Values = [].map.call(textArea,function(data){
            textAreas.push(data);
          });
  
          selectOptions.forEach((inputsValuesData,index) => {
  
            if (inputsValuesData == 'ABIERTA') {
              textAreas[index].setAttribute('disabled','');
            }else{
              textAreas[index].removeAttribute('disabled');
            }
          });

        }
    //  })
  </script>
</body>
</html>