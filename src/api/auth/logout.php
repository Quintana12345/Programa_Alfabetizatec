<?php
session_start();

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

try {
    // Verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si hay una sesión activa
        if (!isset($_SESSION['id'])) {
            echo json_encode([
                'success' => false,
                'message' => 'No hay una sesión activa.'
            ]);
            exit();
        }

        // Cerrar la sesión
        session_unset();  // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión actual

        // Responder con éxito
        echo json_encode([
            'success' => true,
            'message' => 'Sesión cerrada correctamente.'
        ]);
        exit();
    } else {
        // Responder si no es una solicitud POST
        echo json_encode([
            'success' => false,
            'message' => 'Método no permitido. Use POST.'
        ]);
        exit();
    }
} catch (Exception $e) {
    // En caso de error, enviar un mensaje con los detalles del error
    echo json_encode([
        'success' => false,
        'message' => 'Hubo un error al procesar la solicitud.',
        'error_details' => $e->getMessage()
    ]);
    exit();
}
?>
