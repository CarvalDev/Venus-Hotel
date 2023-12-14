const openModalButton = document.querySelector("#openModal");
const closeModalButton = document.querySelector("#closeModal"); 

const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");

const toggleModal =() => {
    //os 3 são a MESMA COISA    
    [modal, fade].forEach((elemento) => elemento.classList.toggle("hide")); //se tiver a classe ele desativa, se nao tiver ele ativa
    //modal.classList.toggle("hide"); //se tiver a classe ele desativa, se nao tiver ele ativa
   // fade.classList.toggle("hide"); //se tiver a classe ele desativa, se nao tiver ele ativa
}

//evento padrao com varios elementos, todos vao ter evento de clique, quando cliente clicar no fade fecha o modal
// [openModalButton, closeModalButton].forEach((elemento) => { //chamo cada item do array de elemento e adiciono evento de clique
//     elemento.addEventListener("click", () => toggleModal());
// })

closeModalButton.addEventListener("click", () => toggleModal());