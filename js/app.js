document.getElementById("signup").style.display = "none"

function mostrarFormularioAlta(){
    document.getElementById("signin").style.display = "none"
    document.getElementById("signup").style.display = "block"
}

function volverinicio(){
    document.getElementById("signin").style.display = "block"
    document.getElementById("signup").style.display = "none"
}

const signupForm = document.getElementById("signupForm")

signupForm.addEventListener("submit", (e) =>{
    e.preventDefault();
    const password1 = document.getElementById('password1').value;
    let  password2 = document.getElementById('password2').value;
    if(password1 !== password2){
        document.getElementById("errorPassword").innerHTML = "<p>Las constraseñas no coinciden</p>"
        document.getElementById('password2').value = ""
        return;
    }


    signupForm.reset()
})