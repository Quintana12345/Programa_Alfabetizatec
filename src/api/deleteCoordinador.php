<?php
// Incluir archivo de configuración para la base de datos
include '../config/conexionDB.php';

try {
    // Obtener la conexión de la base de datos usando la clase Database
    $conn = Database::getConnection();

    // Verificar si se ha recibido el ID y tipo del coordinador
    if (isset($_POST['id']) && isset($_POST['tipo'])) {
        $coordinadorId = $_POST['id'];
        $tipo = $_POST['tipo'];

        // Validar que el tipo sea 'regional' o 'programa'
        if ($tipo !== 'regional' && $tipo !== 'programa') {
            echo json_encode(['success' => false, 'message' => 'Tipo inválido.']);
            return;
        }

        // Dependiendo del tipo, elegir la tabla o lógica correspondiente
        if ($tipo === 'regional') {
            // Eliminar el coordinador de la tabla correspondiente a "regional"
            $sql = "DELETE FROM coordinadores_regionales WHERE id = ?";
        } else {
            // Eliminar el coordinador de la tabla correspondiente a "programa"
            $sql = "DELETE FROM coordinadores_programa WHERE id = ?";
        }

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Enlazar el parámetro 'id' a la consulta
        $stmt->bind_param("i", $coordinadorId); // Usar 'i' para entero en mysqli

        // Ejecutar la consulta
        $stmt->execute();

        // Comprobar si la eliminación fue exitosa
        if ($stmt->affected_rows > 0) {
            // Si la eliminación es exitosa, devolver una respuesta JSON con éxito
            echo json_encode(['success' => true, 'message' => 'El coordinador ha sido eliminado correctamente.']);
        } else {
            // Si no se eliminó ningún registro, devolver un error
            echo json_encode(['success' => false, 'message' => 'No se encontró el coordinador o no se eliminó.']);
        }

        // Cerrar la conexión
        $stmt->close();
    } else {
        // Si no se reciben los parámetros, devolver un error
        echo json_encode(['success' => false, 'message' => 'ID o tipo no recibido.']);
    }
} catch (mysqli_sql_exception $e) {
    // Si ocurre un error en la conexión o la consulta, devolver el mensaje de error
    echo json_encode(['success' => false, 'message' => 'Error de conexión o consulta: ' . $e->getMessage()]);
}
