
function mostrarTextArea(){
  let selectNone = document.getElementById('answer_option').value;
  console.log(selectNone);
  let textArea = document.getElementById('answer_question');

  if(selectNone == 'PREGUNTA_MULTIPLE'){
    textArea.style.display='none';
  }else{
    textArea.style.display='block';
  }
}


let encuestas = [
  {
    idEncuesta:1,
    tituloEncuesta: "titlea",
    descripcionEncuesta: "descripciona",
    tituloPregunta:"tituloPreguntaA",
    tipoPregunta:"PREGUNTA_ABIERTA",
    respuestaPregunta:"",
    codigoReferencia:"XTS",
    fecha:"2023-02-25 14:19:01",
  },{
    idEncuesta:2,
    tituloEncuesta: "titlea",
    descripcionEncuesta: "descripcionb",
    tituloPregunta:"tituloPreguntaA",
    tipoPregunta:"PREGUNTA_ABIERTA",
    respuestaPregunta:"",
    codigoReferencia:"XTS",
    fecha:"2023-02-25 14:19:01",
  },{
    idEncuesta:3,
    tituloEncuesta: "titlea",
    descripcionEncuesta: "descripcionac",
    tituloPregunta:"tituloPreguntaA",
    tipoPregunta:"PREGUNTA_ABIERTA",
    respuestaPregunta:"",
    codigoReferencia:"XTS",
    fecha:"2023-02-25 14:19:01",
  }
]
encuestas.forEach(element => {
  console.log(element.tituloEncuesta)
});