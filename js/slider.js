var swiper = new Swiper(".sliderQuartos", {
  slidesPerView: 3,
  spaceBetween: 60,
  loop:true,
  centeredSlides: false,
  slidesPerGroupSkip: 1,
  grabCursor: true,
  keyboard: {
    enabled: true
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween:5
    },
    500: {
      slidesPerView: 2
    },
    1000: {
      slidesPerView: 3,
      
    }
  },
  scrollbar: {
    el: ".swiper-scrollbar"
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  }
});

const reservaModal = document.getElementById('reservaModal')


const btnModal = document.getElementById('reservaBtn')
const selectCat = document.getElementById('categoria')
const option = document.getElementsByName('nameCateogoria')
const categoriaTotal = document.getElementById('categoriaPreco')
const total = document.getElementById('total')
const selectHoras = document.getElementById('qtdHoras')
const itens = document.getElementById('itensNoQuarto')
const teste = document.getElementById('teste')
const closeBtn = document.getElementById('closeBtn')
const arrayCategoria = document.getElementById('categoria')
const inputValorTotal = document.getElementById('valorTotal')



  
  arrayCategoria.addEventListener("change", function(){
    if(arrayCategoria.value == "Nenhum"){
      categoriaTotal.innerHTML = "Selecione a categoria"
      itens.innerHTML = ""
      total.innerHTML = ""
    }else{
    let array = arrayCategoria.value
    infos = array.split(",")
    console.log(infos)
    categoriaTotal.innerHTML = infos[1] + " - " + infos[3] + "R$";
   
    itens.innerHTML =  infos[2].replaceAll("#", "-");
  }
  })
const renderTotal = () =>{
  let precoCat = categoriaTotal.innerHTML.replaceAll(" ", "").split("-")
  let preco = precoCat[1].replaceAll("R$", "")
  
  let tlt = (preco*selectHoras.value).toFixed(2) 
  total.innerHTML = tlt + "R$"
  inputValorTotal.value = tlt
}

// btnModal.addEventListener("click", ()=>{
//   reservaModal.showModal()
// })

closeBtn.addEventListener("click", ()=>{
  reservaModal.close()
  
  window.location.replace('home.php')

})

const abreModal = (session)=>{
  console.log(session)
  if(session==false){
    window.location.replace('login.php')
  }else{
  reservaModal.showModal();
}
  
}

