<?php
include('../../config/conexionDB.php');

try {
    // Crear la conexión
    $conn = Database::getConnection(); // Asegúrate de que esta función devuelva una conexión mysqli válida
    
    // Consulta SQL
    $sql = "
        SELECT r.id , r.nombre AS region, 
               SUM(p.meta) AS meta_total
        FROM regiones r
        JOIN estados e ON r.id = e.id_region  -- Relaciona las regiones con los estados
        JOIN tecnologicos t ON e.id = t.estado_id  -- Relaciona los estados con los tecnológicos
        JOIN programas p ON t.id = p.id_tecnologico  -- Relaciona los tecnológicos con los programas
        GROUP BY r.id, r.nombre;
    ";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        throw new Exception('Error en la consulta: ' . $conn->error);
    }

    // Obtener los resultados
    $resultResumenPorRegion = [];
    while ($row = $result->fetch_assoc()) {
        $resultResumenPorRegion[] = $row;
    }

    // Configurar el encabezado para JSON
    header('Content-Type: application/json');

    // Retornar los resultados en formato JSON
    echo json_encode($resultResumenPorRegion);
} catch (Exception $e) {
    // Manejo de errores
    echo 'Error: ' . $e->getMessage();
}
