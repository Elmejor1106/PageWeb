<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">


</head>

<body>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Mensaje enviado correctamente!</strong> Gracias por contactarnos, nos pondremos en contacto pronto.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <header class="bg-light py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="Logo.jpg" alt="Logo de NotiJuan" class="me-3"
                    style="width: 50px;">
                <a href="#" class="h4 mb-0 text-decoration-none text-dark">Tienda Digital</a>
            </div>
            <nav class="d-flex">
                <a href="index.html" class="nav-link text-dark me-3">Inicio</a>
                <a href="productos.html" class="nav-link text-dark me-3">Productos</a>
                <a href="contacto.php" class="nav-link text-dark">Contacto</a>
                <div class="dropdown">
                    <a href="#" class="nav-link text-dark dropdown-toggle" id="cartDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        🛒 Carrito <span id="cart-count" class="badge bg-primary">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown">
                        <li>
                            <div id="items-carrito" class="dropdown-item"></div>
                        </li>
                        <li>
                            <div class="dropdown-item">
                                Total: $<span id="total">0.00</span>
                            </div>
                        </li>
                        <li><button id="proceder-pago" class="dropdown-item btn btn-primary w-100">Proceder al
                                pago</button></li>

                    </ul>
                </div>
            </nav>

        </div>
    </header>
    <section id="contacto" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Contáctanos</h2>
            <div class="row g-4">
                <!-- Ubicación -->
                <div class="col-md-4">
                    <h4>Ubicación</h4>
                    <p>Carrera 30 ,Girón, Colombia</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.547088467214!2d-73.17576112524164!3d7.0623800929401055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e683e985f04e875%3A0x3f1598b75aff9c09!2sCra.%2030%20%2322-12%2C%20Gir%C3%B3n%2C%20Santander!5e0!3m2!1ses!2sco!4v1731960623650!5m2!1ses!2sco"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Envíanos un mensaje</h4>
                <form id="contactForm" action="sendEmail.php" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Escribe tu nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo"
                            placeholder="Escribe tu correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4"
                            placeholder="Escribe tu mensaje" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
                <script src="contacto.js"></script>

                <script src="carrito.js"></script>
            </div>
            <!-- Redes Sociales -->
            <div class="col-md-4">
                <h4>Síguenos</h4>
                <p>Encuentra más sobre nosotros en nuestras redes sociales:</p>
                <div class="d-flex justify-content-start gap-3">
                    <a href="https://www.facebook.com/UnidadesTecnologicasdeSantanderUTS/?locale=es_LA"
                        class="text-primary" target="_blank"><i class="bi bi-facebook" style="font-size: 2rem;"></i></a>
                    <a href="https://www.instagram.com/unidades_uts/?hl=es" class="text-danger" target="_blank"><i
                            class="bi bi-instagram" style="font-size: 2rem;"></i></a>
                    <a href="https://wa.me/qr/6QQXAAOBGODMP1" class="text-dark" target="_blank"><i
                            class="bi bi-whatsapp" style="font-size: 2rem;"></i></a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <script src="../carrito.js"></script>
    <script>
        document.getElementById('proceder-pago').addEventListener('click', function() {
            // Aquí puedes agregar una validación del carrito o total antes de redirigir
            const total = document.getElementById('total').textContent;
            if (parseFloat(total) > 0) {
                // Vaciar el carrito en memoria
                carrito = [];

                // Eliminar el carrito del localStorage
                localStorage.removeItem("carrito");

                // Redirigir a la página de pago
                window.location.href = 'pago.html';
            } else {
                alert('Tu carrito está vacío. Añade productos antes de proceder al pago.');
            }
        });
    </script>
</body>

</html>