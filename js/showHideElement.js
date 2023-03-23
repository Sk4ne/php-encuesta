const showHideElement = () =>{
  let abiertas = [];
   let multiples = [];
   let textArea =  document.querySelectorAll('#answer_question');
   let radios =    document.querySelectorAll('#radios');
   let arregloArea = [].slice.call(textArea);
   let arregloRadios = [].slice.call(radios)
   for (let index = 0; index < arregloArea.length; index++) {
     abiertas.push(arregloArea[index]);
   }

   for (let index = 0; index < arregloRadios.length; index++) {
    multiples.push(arregloRadios[index]);
   }
   const open = abiertas.length;
   const multiple = multiples.length;

   abiertas[open - 1].style.display = 'none';
   multiples[multiple - 1].style.display = 'none';
}