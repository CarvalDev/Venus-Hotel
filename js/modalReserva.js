const openModalButton = document.getElementsByName("openModal");
const closeModalButton = document.getElementsByName("closeModal"); 

const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");
const infos = document.getElementsByName('infos')


const categoria = document.getElementById('nomeSele')
const foto = document.getElementById('ftQt')
const quarto = document.getElementById('desc1In')
const valor = document.getElementById('desc2In')
const horas = document.getElementById('horas')
const data = document.getElementById('data')
const valorTotal = document.getElementById('vt')
const codReservaInput = document.getElementById('codReserva')
const btnPagar = document.getElementById('pagar')



function toggleModal (indice) {
    //os 3 são a MESMA COISA    
   [modal, fade].forEach((elemento) => elemento.classList.toggle("hide")); //se tiver a classe ele desativa, se nao tiver ele ativa
   let arrayInfos = infos[indice].value.split(",")
   console.log(arrayInfos)
   categoria.innerHTML = arrayInfos[2]
   foto.src = '../img/quartos/' + arrayInfos[6]
   quarto.innerHTML = 'Quarto: ' + arrayInfos[0]
   valor.innerHTML = 'Valor: R$' + parseFloat(arrayInfos[3]).toFixed(2)
   let hora = arrayInfos[4].split(":")
   horas.innerHTML = 'Horas: ' + hora[0] + "H"
   let dataHora = arrayInfos[5].split(" ")  
  
   let dataSeparada = dataHora[0].split("-")
   let dataCerta = dataSeparada[2] + "/" + dataSeparada[1] + "/" + dataSeparada[0] + " " + dataHora[1]
   data.innerHTML = "Data: " + dataCerta
   valorTotal.innerHTML = "Valor Total: R$" + parseFloat(arrayInfos[1]).toFixed(2) 
   codReservaInput.value = arrayInfos[7]
   if(arrayInfos[8]=='Paga'){
    console.log("cu")
    btnPagar.id = "pagarBtnApaga"
   }else{
    btnPagar.id = "pagar"
   }
}


// for(var i=0;i<openModalButton.length;i++) {
//     openModalButton[i].addEventListener("click", () => toggleModal());
// }
// for(var i=0;i<openModalButton.length;i++) {
//     closeModalButton[i].addEventListener("click", () => toggleModal());
// }
const openModal = ($categoriaNome) =>{
    toggleModal($categoriaNome)
}

// //evento padrao com varios elementos, todos vao ter evento de clique, quando cliente clicar no fade fecha o modal
// [openModalButton, closeModalButton, fade].forEach((elemento) => { //chamo cada item do array de elemento e adiciono evento de clique
//     elemento.addEventListener("click", () => toggleModal());
// })