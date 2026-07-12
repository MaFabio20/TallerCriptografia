const mensaje = document.getElementById("mensaje");
const contador = document.getElementById("contador");
const progreso = document.getElementById("progreso");
mensaje.addEventListener("input", () => {
  let cantidad = mensaje.value.length;
  contador.innerHTML = cantidad + " / 500";
  progreso.style.width = (cantidad / 500) * 100 + "%";
});
const ojo = document.getElementById("ver");
const clave = document.getElementById("clave");
ojo.addEventListener("click", () => {
  if (clave.type == "password") {
    clave.type = "text";
    ojo.classList.remove("fa-eye");
    ojo.classList.add("fa-eye-slash");
  } else {
    clave.type = "password";
    ojo.classList.remove("fa-eye-slash");
    ojo.classList.add("fa-eye");
  }
});
