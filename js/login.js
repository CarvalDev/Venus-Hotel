const formCadastro = document.getElementById('cadastro')
const imgCadastro = document.getElementById('cadastroImg')
const formLogin = document.getElementById('login')
const loginImg = document.getElementById('loginImg')
const cadastrar = document.getElementById('cadastrar')
const logar = document.getElementById('logar')



formCadastro.style.display = "none"
imgCadastro.style.display = "none"

cadastrar.addEventListener("click", ()=>{
    formCadastro.style.display = "flex "
    imgCadastro.style.display = "flex"
    formLogin.style.display = "none"
    loginImg.style.display = "none"
})

logar.addEventListener("click", ()=>{
    formCadastro.style.display = "none"
    imgCadastro.style.display = "none"
    formLogin.style.display = "block"
    loginImg.style.display = "block"
})