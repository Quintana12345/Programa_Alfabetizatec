<?php
header('Content-Type: application/json');
include '../config/conexionDB.php';

try {
    // Verificar si la solicitud es POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido. Usa POST.');
    }

    // Verificar si se recibieron los parámetros necesarios
    if (!isset($_POST['id_solicitud']) || !isset($_POST['estado'])) {
        throw new Exception('Faltan parámetros necesarios.');
    }

    // Sanitizar los datos recibidos
    $id = intval($_POST['id_solicitud']);
    $estado = htmlspecialchars(string: $_POST['estado']);

    // Validar el valor del estado
    $estadosValidos = ['pendiente', 'aprobado', 'desaprobado'];
    if (!in_array($estado, $estadosValidos)) {
        throw new Exception('Estado no válido.');
    }

    // Obtener la conexión a la base de datos
    $conn = Database::getConnection();

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Preparar la consulta para actualizar el estado en la tabla solicitudes
        $stmt = $conn->prepare('UPDATE solicitudes SET status = ? WHERE id = ?');
        $stmt->bind_param('si', $estado, $id);

        if ($stmt->execute()) {
            // Confirmar la transacción
            $conn->commit();
            echo json_encode(['success' => true, 'message' => 'Estado actualizado correctamente.']);
        } else {
            throw new Exception('Error al ejecutar la consulta.');
        }

        $stmt->close();
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conn->rollback();
        throw $e;
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
