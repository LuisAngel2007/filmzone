<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $comentario = htmlspecialchars($_POST['comentario']);

    // Configurar el correo electrónico
    $destinatario = 'delacruz.luis.a.cb37@gmail.com'; // Reemplaza con tu correo electrónico
    $asunto = "Nuevo comentario de $nombre";
    $mensaje = "Has recibido un nuevo comentario.\n\n" .
               "Nombre: $nombre\n" .
               "Correo electrónico: $email\n\n" .
               "Comentario:\n$comentario";

    // Encabezados para el correo
    $encabezados = "From: $email\r\n";
    $encabezados .= "Reply-To: $email\r\n";
    $encabezados .= "Content-Type: text/plain; charset=utf-8\r\n";

        $mail = mail($destinatario, $asunto, $mensaje, $encabezados);
    // Enviar el correo
    if ($mail) {
        echo "Comentario enviado exitosamente. ¡Gracias por tu opinión, $nombre!";
    } else {
        echo "Hubo un error al enviar tu comentario. Por favor, intenta de nuevo.";
    }
} else {
    // Redirigir al formulario si no se accedió mediante POST
    header("Location: index.html");
    exit;
}
?>
