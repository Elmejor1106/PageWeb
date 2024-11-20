<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí puedes procesar los datos del formulario (por ejemplo, enviar un correo)
    // Asumiendo que el correo fue enviado con éxito:
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Lógica de envío de correo (esto es solo un ejemplo)
    // mail($correo_destino, "Nuevo mensaje de $nombre", $mensaje);

    // Redirigir al formulario con un mensaje de éxito
    header("Location: contacto.php?status=success");
    exit();
}
?>