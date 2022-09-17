// variables
const URL = '/test';

const formLogin = document.querySelector('#form-login');
const formRegister = document.querySelector('#form-register');
const checkdatos = document.querySelector('#checkdatos');

// evento de incial
window.addEventListener('DOMContentLoaded', function () {
  if (formLogin || checkdatos) {
    getRememberLoginLocalStorage();
    formLogin.addEventListener('submit', login);
    checkdatos.addEventListener('change', rememberLogin);
  }
  if (formRegister) {
    formRegister.addEventListener('submit', registrar);
  }
});

// funciones
async function login(e) {
  e.preventDefault();
  const formData = new FormData();

  const nombre = document.getElementById('nombre').value;
  const apellido = document.getElementById('apellido').value;

  if (nombre.trim() === '' || apellido.trim() === '') {
    alert('debes llenar todos los campos');
    return false;
  }

  formData.append('nombre', nombre);
  formData.append('apellido', apellido);

  const response = await fetch(`${URL}/sign-in`, {
    method: 'POST',
    body: formData,
  });
  const data = await response.json();

  if (data.status == 'success') {
    alert('ingresando');
    setTimeout(() => {
      window.location.href = '/test/admin/home';
    }, 1000);

    return;
  }

  if (data.status == 'error') {
    alert(data.error);
    return false;
  }
}

async function registrar(e) {
  e.preventDefault();
  const formData = new FormData();

  const nombrer = document.getElementById('nombrer').value;
  const apellidor = document.getElementById('apellidor').value;
  const passr = document.getElementById('passr').value;

  if (nombrer.trim() === '' || apellidor.trim() === '' || passr.trim() === '') {
    alert('debes llenar todos los campos');
    return false;
  }
  if (passr.length < 3) {
    alert('debes ingresar una password mayor a tres caracteres');
    return false;
  }

  formData.append('nombre', nombrer);
  formData.append('apellido', apellidor);
  formData.append('password', passr);

  const response = await fetch(`${URL}/sign-up`, {
    method: 'POST',
    body: formData,
  });

  const data = await response.json();

  console.log(data);

  if (data.status == 'success') {
    alert(data.message);
  }
  setTimeout(() => {
    window.location.href = '/test/login';
  }, 1000);
}

function rememberLogin() {
  const storage = localStorage;
  if (checkdatos.checked === true) {
    const data = {
      nombre: document.getElementById('nombre').value,
      apellido: document.getElementById('apellido').value,
      check: document.getElementById('checkdatos').value,
    };
    storage.setItem('login', JSON.stringify(data));
  } else if (!checkdatos.checked) {
    storage.removeItem('login');
  }
}

function getRememberLoginLocalStorage() {
  const storage = localStorage;
  const nombre = document.getElementById('nombre');
  const apellido = document.getElementById('apellido');
  const checkeds = document.getElementById('checkdatos');

  if (storage.getItem('login') != null) {
    const datos = JSON.parse(storage.getItem('login'));
    nombre.value = datos.nombre;
    apellido.value = datos.apellido;

    if (datos.check === 'on') {
      checkeds.checked = true;
    } else {
      checkeds.checked = false;
    }
  }
}
