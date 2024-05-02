document.getElementById("signup").style.display = "none"

function mostrarFormularioAlta(){
    document.getElementById("signin").style.display = "none"
    document.getElementById("signup").style.display = "block"
}
function volverInicio(){
    document.getElementById("signin").style.display = "block"
    document.getElementById("signup").style.display = "none"
}

const signupForm = document.getElementById("signupForm")

 signupForm.addEventListener("submit", (e) =>{
    e.preventDefault();

    const formData = new FormData(signupForm)

    let nombre = formData.get('nombre').trim();
    let apellidos = formData.get('apellidos').trim();
    let password1 = formData.get('password1').trim();
    let password2 = formData.get('password2').trim();
    let nif = formData.get('nif').trim();
    let direccion = formData.get("direccion").trim();
    let ciudad = formData.get("ciudad").trim();

    // Pattern nombre
  const patternNombre = /^['a-zA-ZáéíóúàèìòùüñÑçÇÁÉÍÓÚÀÈÌÒÙÜ\s]+$/;
  if (!validarItems(nombre, patternNombre, "nombre")) {
    return;
  }
  if (!validarItems(apellidos, patternNombre, "apellidos")) {
    return;
  }
  if (password1 !== password2) {
    document.querySelector(".error-password").innerHTML =
      "<p>Las contraseñas no coinciden</p>";
    document.getElementById("password2").value = "";
    return;
  }
    const patternNif = /[0-9A-Z][0-9]{7}[A-Z]/;
    if (nif.length < 9 || !patternNif.test(nif)) {
        document.querySelector(".error-nif").style.display = "block";
        document.querySelector(".error-nif").innerHTML = "<p>NIF incorrecto</p>";
        return;
      } else {
        document.querySelector(".error-nif").style.display = "none";
      }

    const pattenDireccion = /^['a-zA-ZáéíóúàèìòùüñÑçÇÁÉÍÓÚÀÈÌÒÙÜ\s]+$/;

    if(validarItems(direccion, pattenDireccion, "direccion")){
        return;
    }
    const data = {
        "nombre": nombre, // JSON ESTRICTO O CORRECTO, EL SIMPLIFICADO SERIA SOLO PONER: nombre, -> "nombre": nombre, 
        "apellidos": apellidos,
        "password": password1,
        "nif": nif,
        
    }
    // let data2 = JSON.stringify(data);
    // console.log(data2);
    // console.log(data2["nombre"]);
 fetch("php/singup.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers:{
       "Content-Type": "application/json",
    },
 })
 .then(() => location.href = "php/ecommerce.php")
 .then(textRecibido => console.log(textRecibido))
 .catch(error => console.log(error));


})

     //     const password1 = document.getElementById('password1').value;
//     let  password2 = document.getElementById('password2').value;
//     if(password1 !== password2){
//         document.getElementById("errorPassword").innerHTML = "<p>Las constraseñas no coinciden</p>"
//         document.getElementById('password2').value = ""
//         return;
//     }
//     signupForm.reset()

function validarItems(text, pattern, attribute) {
    if (pattern.test(text)) {
      document.querySelector(".error-" + attribute).style.display = "none";
      return true;
    } else {
      console.log(attribute + " is not a valid");
      document.querySelector(".error-" + attribute).style.display = "block";
      document.querySelector(
        ".error-" + attribute
      ).innerHTML = `<p>${text} no es válido</p>`;
      return false;
    }
  }





