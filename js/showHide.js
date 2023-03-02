
let botonCrear = document.getElementById('createElements');
    botonCrear.addEventListener('click', e =>{

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
      <button class='btn btn-outline-secondary' onclick='eliminar(this)'>
        <span class="material-icons">
          delete_forever
        </span>
      </button>
      <hr/>
      `;
      /* AGREGAMOS LOS ELEMENTOS AL DIV CONTENEDOR */
      padre.appendChild(inp1);
    });

    const showHide = () => {
      let selectOptions=  [];
      let textAreas = [];

      let selectOption = document.querySelectorAll('#answer_option');
      let textArea = document.querySelectorAll('#answer_question');
      
      let nameValues = [].map.call(selectOption,(data)=>{
        selectOptions.push(data.value)
      }) 
      let nameValues2 = [].map.call(textArea,(data)=>{
        textAreas.push(data)
      })

      selectOptions.forEach((typeQuestion,index) => {
        if (typeQuestion == 'PREGUNTA_ABIERTA') {
          textAreas[index].style.display = 'block';
          textAreas[index].setAttribute('disabled','');
        } else if(typeQuestion == 'PREGUNTA_MULTIPLE'){
          textAreas[index].style.display = 'none';
        }else{
          textAreas[index].style.display = 'block';
          textAreas[index].removeAttribute('disabled');
        }
      });
    }
    const eliminar = (e) =>{
      let contenedor = document.querySelector('#fatherContainer');
      let divPadre = e.parentNode;
      contenedor.removeChild(divPadre);
    }