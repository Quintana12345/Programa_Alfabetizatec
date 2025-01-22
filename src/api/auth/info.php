<?php
// Iniciar sesión
session_start();

// Verificar si la sesión tiene datos
if (!empty($_SESSION)) {
    echo "<h3>Datos de la sesión actual:</h3>";
    echo "<pre>";
    print_r($_SESSION); // Muestra todo el contenido de la sesión
    echo "</pre>";
    echo BASE_URL;
} else {
    echo "La sesión no contiene datos.";
}
