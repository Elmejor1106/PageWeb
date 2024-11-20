let carrito = [];

document.addEventListener("DOMContentLoaded", () => {
  // Cargar el carrito guardado en el localStorage
  const carritoGuardado = localStorage.getItem("carrito");
  if (carritoGuardado) {
    carrito = JSON.parse(carritoGuardado);
    actualizarCarrito();
  }
});

function agregarAlCarrito(nombre, precio) {
  // Agregar un producto al carrito
  carrito.push({ nombre, precio });
  guardarCarrito();
  actualizarCarrito();
}

function actualizarCarrito() {
  // Actualizar la interfaz del carrito
  const itemsCarrito = document.getElementById("items-carrito");
  const totalSpan = document.getElementById("total");
  const cartCount = document.getElementById("cart-count");

  itemsCarrito.innerHTML = "";
  let total = 0;

  carrito.forEach((item, index) => {
    const itemDiv = document.createElement("div");
    itemDiv.className = "cart-item";
    itemDiv.innerHTML = `
      <span>${item.nombre} - $${item.precio}</span>
      <button onclick="eliminarDelCarrito(${index})">×</button>
    `;
    itemsCarrito.appendChild(itemDiv);
    total += item.precio;
  });

  totalSpan.textContent = total.toFixed(2);
  cartCount.textContent = carrito.length;
}

function eliminarDelCarrito(index) {
  // Eliminar un producto del carrito
  carrito.splice(index, 1);
  guardarCarrito();
  actualizarCarrito();
}

function guardarCarrito() {
  // Guardar el carrito en el localStorage
  localStorage.setItem("carrito", JSON.stringify(carrito));
}

function enviarCarritoAPHP() {

  const carritoString = JSON.stringify(carrito);
  const formData = new FormData();
  formData.append("carrito", carritoString);

  fetch("/secciones/procesar_pago.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      
      localStorage.removeItem("carrito"); 

      
      carrito = [];  
      window.location.href = "/secciones/gracias.html";
    });
}

function mostrarSeccion(seccionId) {
  // Mostrar u ocultar secciones en la página
  document.querySelectorAll(".section").forEach((section) => {
    section.classList.remove("active");
  });

  document.getElementById(seccionId).classList.add("active");
}
