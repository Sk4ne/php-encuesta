
function mostrarTextArea(){
  let typeQuestion = document.getElementById('answer_option').value;
  let textArea = document.getElementById('answer_question');
  if (typeQuestion == 'PREGUNTA_MULTIPLE') {
    textArea.style.display = 'none';
  } else if(typeQuestion == 'PREGUNTA_ABIERTA'){
    textArea.style.display = 'block';
    textArea.setAttribute('disabled','');
  }else{
    textArea.style.display = 'none';
  }
}
