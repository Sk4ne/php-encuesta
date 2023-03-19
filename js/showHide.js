
/* OCULTO TODAS LAS OPCIONES DE RESPUESTA POR DEFAULT */
let ra = document.querySelector('#radios');
let ta = document.querySelector('#answer_question');
ra.style.display = 'none';
ta.style.display = 'none';
  
/* ESTA FUNCION SE EJECUTA CUANDO DOY CLICK EN EL BOTON CREAR NUEVA PREGUNTA */
$(function(){
  $('#createElements').click(function(){
    let allRadios = document.querySelectorAll('#radios');
    let allTextAreas = document.querySelectorAll('#answer_question');
  
    let r = [].map.call(allTextAreas,(data)=>{
       if (data.hasAttribute('disabled')) {
        $(data).show();
      }else{
          $(data).hide();
       }
    })
    let t = [].map.call(allRadios,(data)=>{
      console.log(data)
    //  $(data).hide();
      $(data).show();
    })
  })
});

let botonCrear = document.getElementById('createElements');
    botonCrear.addEventListener('click', e =>{
      let idAleatorio = Math.random().toString(36).substr(2, 18);
      e.preventDefault();
      
      let padre = document.querySelector('#fatherContainer');
      let inp1 = document.createElement('div');
      /* AGREGAR LA CLASE ROW AL DIV PARA EVITAR CREAR UNA FILA (ROW) */
      inp1.innerHTML = /* html */`
      <div class="row">
        <div class="col">
          <input type="text" name="title_question[]" class='form-control' placeholder='TITULO PREGUNTA' autocomplete="off" id='titleQuestion'>
        </div>
        <div class="col">
          <select name="type_question[]" class='select_option form-control' id='answer_option' onchange='showHide()'>
            <option value="Choose">Choose ...</option>
            <option value="PREGUNTA_MULTIPLE">PREGUNTA_MULTIPLE</option>
            <option value="PREGUNTA_ABIERTA">PREGUNTA_ABIERTA</option>
          </select>
        </div>
      </div>
      <div class="mt-4 form-group">
        <textarea name="answer_question[]" id='answer_question' placeholder="Escribe Tu Respuesta" rows="5" class='answer_question form-control' value='hello'></textarea>
      </div>

      <!-- EN ESTA SECCION VA LAS PREGUNTAS OPCION MULTIPLE -->
      <div id='radios'>
      <div class="form-check">
        <input type="radio" class="form-check-input" name="input_radio[]${idAleatorio}" id='radioButton' value="SI">
        <label for="" class="form-check-label" contenteditable='true'>SI</label>
       </div> 
       <div class="form-check">
        <input type="radio" class="form-check-input" name='input_radio[]${idAleatorio}' id='radioButton' value="NO" >
        <label for="" class="form-check-label" contenteditable='true'>NO</label>
       </div>
       <div class="form-check">
        <input type="radio" class="form-check-input" name='input_radio[]${idAleatorio}' id='radioButton' value="UNPOCO" >
        <label for="" class="form-check-label" contenteditable='true'>UN POCO</label>
       </div>       
    </div>
    <!-- </EN ESTA SECCION VA LAS PREGUNTAS OPCION MULTIPLE -->

      <button class='mt-3 btn btn-outline-secondary' onclick='eliminar(this)'>
        <span class="material-icons">
          delete_forever
        </span>
      </button>
      <hr/>
      `;
      /* AGREGAMOS LOS ELEMENTOS AL DIV CONTENEDOR */
      padre.appendChild(inp1);
    });


    // let data  = document.querySelector('#answer_question');
    
    const showHide = () => {
      let selectOptions=  [];
      let textAreas = [];
      let allRadios = [];
      let allRadiosCheck = [];

      let selectOption = document.querySelectorAll('#answer_option');
      let textArea = document.querySelectorAll('#answer_question');
      // let radios = document.querySelectorAll('#radioButton');
      let radios = document.querySelectorAll('#radios');
      let radiosChecks = document.querySelectorAll('#radioButton');

      let nameValues3 = [].map.call(radios,(data)=>{
        allRadios.push(data);
      })
      let nameValues4 = [].map.call(radiosChecks,(data)=>{
        allRadiosCheck.push(data);
      })
      
      let nameValues = [].map.call(selectOption,(data)=>{
        selectOptions.push(data.value)
      }) 
      let nameValues2 = [].map.call(textArea,(data)=>{
        textAreas.push(data)
      })

      // selectOptions.forEach((typeQuestion,index) => {
      //   if (typeQuestion == 'PREGUNTA_ABIERTA') {
      //     textAreas[index].style.display = 'block';
      //     textAreas[index].setAttribute('disabled','');
      //   } else if(typeQuestion == 'PREGUNTA_MULTIPLE'){
      //     textAreas[index].style.display = 'none';
      //   }else{
      //     textAreas[index].style.display = 'block';
      //     textAreas[index].removeAttribute('disabled');
      //   }
      // }); ORIGINAL 
     
      selectOptions.forEach((typeQuestion,index) => {
        if (typeQuestion == 'PREGUNTA_ABIERTA') {
          textAreas[index].style.display = 'block';
          textAreas[index].setAttribute('disabled','');
          allRadios[index].style.display = 'none';
        } else if(typeQuestion == 'PREGUNTA_MULTIPLE'){
          textAreas[index].style.display = 'none';
          allRadios[index].style.display = 'block';

          /* DESABILITAR TODAS LAS PRUEBAS MULTIPLES  */
          // allRadiosCheck.forEach(radio=>{
          //   radio.setAttribute('disabled','');
          // })
          /* DESABILITAR TODAS LAS PRUEBAS MULTIPLES  */
        }else{
          textAreas[index].style.display = 'none';
          textAreas[index].removeAttribute('disabled');
          allRadios[index].style.display = 'none';
        }
      });
    }
    const eliminar = (e) =>{
      let contenedor = document.querySelector('#fatherContainer');
      let divPadre = e.parentNode;
      contenedor.removeChild(divPadre);
    }


      