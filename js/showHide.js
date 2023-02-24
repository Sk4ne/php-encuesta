
function mostrarTextArea(){
  console.log('SOY UN JS FUNCIONAL');
  let selectNone = document.getElementById('answer_option').value;
  let textArea = document.getElementById('answer_question');

  if(selectNone == 'PREGUNTA_MULTIPLE'){
    textArea.style.display='none';
  }else{
    textArea.style.display='block';
  }
}

