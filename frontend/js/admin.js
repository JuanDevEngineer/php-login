// variables
const url = "/test"
// const url = ""

const formLogin = document.querySelector("#form-login")
const formRegister = document.querySelector("#form-register")
const checkdatos = document.querySelector("#checkdatos")

// evento de incial
window.addEventListener("DOMContentLoaded", function () {
    getRememberLoginLocalStorage()
    if(formLogin || checkdatos) {
        formLogin.addEventListener("submit", login)
        checkdatos.addEventListener("change", rememberLogin)
    }
    if(formRegister) {
        formRegister.addEventListener("submit", registrar)
    }

})

// funciones
function login(e) {
    e.preventDefault();
    const http = new XMLHttpRequest();

    const nombre = document.getElementById('nombre').value
    const apellido = document.getElementById('apellido').value

    if(nombre.trim() === "" || apellido.trim() === "") {
        alert("debes llenar todos los campos")
        return false;
    }

    http.open("POST", "/admin/signIn", true)
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")

    http.onreadystatechange = function() { 
        if (this.readyState === http.DONE && this.status === 200) {
            const resp = JSON.parse(http.responseText)
            if(resp.status == 'success') {
                alert('ingresando')
            }
            setTimeout(() => {
                window.location.href = "/app/home"
            }, 3000)
        }
    }
    http.send(`nombre=${nombre.toLowerCase()}&apellido=${apellido.toLowerCase()}`)

}

function registrar(e) {
    e.preventDefault()
    const http = new XMLHttpRequest()

    const nombrer = document.getElementById('nombrer').value
    const apellidor = document.getElementById('apellidor').value
    const passr = document.getElementById('passr').value

    if(nombrer.trim() === "" || apellidor.trim() === "" || passr.trim() === "") {
        alert("debes llenar todos los campos")
        return false
    } 
    if(passr.length < 3) {
        alert("debes ingresar una password mayor a tres caracteres")
        return false
    }

    http.open("POST", "/admin/signUp", true)
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")

    http.onreadystatechange = function() { 
        if (this.readyState === http.DONE && this.status === 200) {
            const resp = JSON.parse(http.responseText)
            if(resp.status == 'success') {
                alert(resp.message)
            }
            setTimeout(() => {
                window.location.href = "/admin/login"
            }, 3000)
        }
    }
    http.send(`nombre=${nombrer}&apellido=${apellidor}&password=${passr}`)
}

function rememberLogin() {
  const storage = localStorage
  if (checkdatos.checked === true) {
    const data = {
      nombre: document.getElementById("nombre").value,
      apellido: document.getElementById("apellido").value,
      check: document.getElementById("checkdatos").value,
    }
    storage.setItem("login", JSON.stringify(data))
  } else if (!checkdatos.checked) {
    storage.removeItem("login")
  }
}

function getRememberLoginLocalStorage() {
  const storage = localStorage
  const nombre = document.getElementById("nombre")
  const apellido = document.getElementById("apellido")
  const checkeds = document.getElementById("checkdatos")

  if (storage.getItem("login") != null) {
    const datos = JSON.parse(storage.getItem("login"));
    nombre.value = datos.nombre
    apellido.value = datos.apellido

    if (datos.check === "on") {
        checkeds.checked = true
    } else {
        checkeds.checked = false
    }
  }
}
