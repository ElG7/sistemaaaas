const btnRegister = document.querySelector("#btnRegister");
const btnLogin = document.querySelector("#btnLogin");
const frmLogin = document.querySelector("#frmLogin");
const frmRegister = document.querySelector("#frmRegister");
const registrarse = document.querySelector("#registrarse");
const login = document.querySelector("#login");

const nombreRegistro = document.querySelector("#nombreRegistro");
const nom_usuarioRegistro = document.querySelector("#nom_usuarioRegistro");
const rutRegistro = document.querySelector("#rutRegistro");
const telefonoRegistro = document.querySelector("#telefonoRegistro");
const fdnRegistro = document.querySelector("#fdnRegistro");
const contrasenaRegistro = document.querySelector("#contrasenaRegistro");
const correoRegistro = document.querySelector("#correoRegistro");

const correoLogin = document.querySelector("#correoLogin");
const contrasenaLogin = document.querySelector("#contrasenaLogin");

const btnModalLogin = document.querySelector("#btnModalLogin");

const modalLogin = new bootstrap.Modal(document.getElementById("modalLogin"));

const inputBusqueda = document.querySelector("#search");

document.addEventListener("DOMContentLoaded", function () {
  btnRegister.addEventListener("click", function () {
    frmLogin.classList.add("d-none");
    frmRegister.classList.remove("d-none");
  });
  btnLogin.addEventListener("click", function () {
    frmRegister.classList.add("d-none");
    frmLogin.classList.remove("d-none");
  });

  //registro
  registrarse.addEventListener("click", function () {
    if (
      nombreRegistro.value == "" ||
      nom_usuarioRegistro.value == "" ||
      rutRegistro.value == "" ||
      telefonoRegistro.value == "" ||
      fdnRegistro.value == "" ||
      correoRegistro.value == "" ||
      contrasenaRegistro.value == ""
    ) {
      Swal.fire("Aviso", "Debes rellenar todos los campos", "warning");
    } else {
      let formData = new FormData();
      formData.append("nombre", nombreRegistro.value);
      formData.append("nom_usuario", nom_usuarioRegistro.value);
      formData.append("rut", rutRegistro.value);
      formData.append("telefono", telefonoRegistro.value);
      formData.append("fecha_nacimiento", fdnRegistro.value);
      formData.append("contrasena", contrasenaRegistro.value);
      formData.append("email", correoRegistro.value);
      const url = base_url + "clientes/registrarse";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(formData);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Swal.fire("Aviso", res.msg, res.icono);
          if (res.icono == "success") {
            setTimeout(() => {
              window.location.reload();
            }, 2000);
          }
        }
      };
    }
  });

  //login directo
  login.addEventListener("click", function () {
    if (correoLogin.value == "" || contrasenaLogin.value == "") {
      Swal.fire("Aviso", "Debes rellenar todos los campos", "warning");
    } else {
      let formData = new FormData();
      formData.append("correoLogin", correoLogin.value);
      formData.append("contrasenaLogin", contrasenaLogin.value);
      const url = base_url + "clientes/iniciar_sesion";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(formData);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           const res = JSON.parse(this.responseText);
            Swal.fire("Aviso", res.msg, res.icono);
            if (res.icono == "success") {
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          }
        }
      };
    }
  });
/*
  btnModalLogin.addEventListener("click", function () {
    modalLogin.show();
  }); */
});

/*
function enviarCorreo(correo, token) {
  let formData = new FormData();
  formData.append("token", token);
  formData.append("correo", correo);
  const url = base_url + "clientes/enviarCorreo";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(formData);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      Swal.fire("Aviso?", res.msg, res.icono);
      if (res.icono == "success") {
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  };
} */

function abrirModalLogin() {
  myModal.hide();
  modalLogin.show();
}
